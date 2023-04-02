<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginReqest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
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
}
