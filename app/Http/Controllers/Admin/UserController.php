<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct(
        private UserRepository $userRepository,
        private RoleRepository $roleRepository
    )
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit']);

        $users = $this->userRepository->getUsersPaginate($data);

        return view('admin.pages.user.index')->with([
            'users' => $users
        ]);
    }

    public function create(): Factory|View|Application {
        $roles = $this->roleRepository->all();
        return view('admin.pages.user.create')
            ->with(compact('roles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $authId = auth()->id();
            $user = $this->userRepository->create(array_merge($data, [
                'created_by' => $authId,
                'updated_by' => $authId
            ]));
            DB::commit();
            $request->session()->flash('success', 'Tạo mới tài khoản thành công');
            return redirect()->route('admin.users.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới tài khoản']])
                ->withInput();
        }
    }

    public function show(int|string $id): Factory|View|Application
    {
        $user = $this->userRepository->find($id);
        $roles = $this->roleRepository->all();
        return view('admin.pages.user.update')->with(compact('user', 'roles'));
    }

    public function profile(): Factory|View|Application
    {
        $user = $this->userRepository->find(auth()->id());
        return view('admin.pages.user.profile')->with(compact('user'));
    }

    public function updateProfile(ProfileUserRequest $request, int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $user = $this->userRepository->find($id);

            $user?->fill(array_merge($data, [
                'update_by' => auth()->id(),
            ]));
            $user?->save();
            DB::commit();
            $request->session()->flash('success', 'Cập nhật tài khoản thành công');

            return redirect()->route('admin.users.profile');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật tài khoản']])
                ->withInput();
        }
    }

    public function update(UpdateUserRequest $request, int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $user = $this->userRepository->find($id);

            $user?->fill(array_merge($data, [
                'update_by' => auth()->id(),
            ]));
            $user?->save();
            DB::commit();
            $request->session()->flash('success', 'Cập nhật tài khoản thành công');

            return redirect()->route('admin.users.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật tài khoản']])
                ->withInput();
        }
    }

    public function destroy(int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->userRepository->delete($id);

            DB::commit();

            session()->flash('success', 'Xóa tài khoản thành công');

            return redirect()->route('admin.users.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error delete user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa tài khoản']])
                ->withInput();
        }
    }

    public function existPassword(Request $request)
    {
        try {
            $credentials = [
                'username'=> auth()->user()->username,
                'password'=> $request->input('password')
            ];
            $result = auth()->attempt($credentials);
            return [
                'result' => $result
            ];

        } catch (\Exception $exception) {
            Log::error('Error delete user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return [
                'result' => false
            ];;
        }
    }

    public function changePassword(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $user = $this->userRepository->find(auth()->id());
            $user?->fill(array_merge($data, [
                'password'  => $data['newPassword'],
                'update_by' => auth()->id(),
            ]));
            $user?->save();
            DB::commit();
            $request->session()->flash('success', 'Cập nhật mật khẩu thành công');

            return redirect()->route('admin.users.profile');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update user', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật mật khẩu']])
                ->withInput();
        }
    }
}
