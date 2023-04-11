<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginReqest;
use App\Http\Requests\Auth\RecoverPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Jobs\SendMailRecoverPassword;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function getLoginForm(): Factory|View|Application
    {
        return view('admin.pages.auth.login');
    }

    public function login(AuthLoginReqest $request): RedirectResponse
    {
        $request->merge([$this->username() => request()->input('username')]);
        $credentials = request([$this->username(), 'password']);
        if (!auth()->attempt($credentials)) {
            return redirect()->back()
                ->withErrors(['username' => ['Vui lòng kiểm tra lại tài khoản hoặc mật khẩu!']])
                ->withInput();
        }

        if (auth()->user()->status === 0) {
            auth()->logout();

            return redirect()->back()
                ->withErrors(['username' => ['Tài khoản của bạn đã bị khoá, Vui lòng liên hệ quản trị viên!']])
                ->withInput();
        }

        return redirect()->route('admin.dashboard');
    }

    private function username(): string
    {
        return filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

    public function getRecoverPasswordForm(): Factory|View|Application
    {
        return view('admin.pages.auth.recover-password');
    }

    public function handleRecoverPasswordForm(RecoverPasswordRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->findWhere(['email' => $request->get('email')])->first();
            if (!$user) {
                throw new ModelNotFoundException('Email không tồn tại');
            }

            $token = Str::random(64);

            DB::table('password_resets')->updateOrInsert(['email' => $user->email],[
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            $actionLink = route('admin.getResetPasswordForm', ['token' => $token]);

            SendMailRecoverPassword::dispatch($user->email, $user->fullname, $actionLink)->onQueue('default');

            DB::commit();
            session()->flash('success', 'Gửi yêu cầu thành công! Vui lòng kiểm tra email của bạn.');

            return  redirect()->back();

        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            Log::error('Error recover password',[
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['email' => [$exception->getMessage()]])
                ->withInput();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Error recover password', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Có lỗi xảy ra! Vui lòng thử lại sau.']])
                ->withInput();
        }

    }

    public function getResetPasswordForm(Request $request): Factory|View|Application
    {
        $token = $request->get('token');

        if(!$token) {
            abort(404);
        }

        $passwordReset = DB::table('password_resets')->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subMinutes(30)->toDateTimeString())
            ->first();

        if (!$passwordReset) {
            abort(404);
        }

        return view('admin.pages.auth.reset-password')->with(['token' => $token]);
    }

    public function handleResetPassword(ResetPasswordRequest $request)
    {
        try {
            $token = $request->get('token');

            if(!$token) {
                abort(404);
            }

            $passwordReset = DB::table('password_resets')->where('token', $token)
                ->where('created_at', '>', Carbon::now()->subMinutes(30)->toDateTimeString())
                ->first();

            if (!$passwordReset) {
                abort(404);
            }

            $user = $this->userRepository->findWhere(['email' => $passwordReset->email])->first();

            $user->fill([
                'password' => $request->get('password')
            ]);

            $user->save();

            session()->flash('success', 'Đặt lại mật khẩu thành công!');

            return redirect()->route('admin.getLoginForm');
        }catch (Exception $exception) {
            DB::rollBack();
            Log::error('Error reset password user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Có lỗi xảy ra! Vui lòng thử lại sau.']])
                ->withInput();
        }

    }
}
