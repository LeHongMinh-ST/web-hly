<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Repositories\GroupPermission\GroupPermissionRepository;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Role\RoleRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function __construct(
        private RoleRepository            $roleRepository,
        private PermissionRepository      $permissionRepository,
        private GroupPermissionRepository $groupPermissionRepository
    )
    {
    }


    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit']);

        $roles = $this->roleRepository->getRolesPaginate($data);

        return view('admin.pages.role.index')->with([
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $permissions = $this->groupPermissionRepository->with('permissions')->all();
        return view('admin.pages.role.create')->with(compact('permissions'));
    }


    /**
     * Store the specified resource from storage.
     *
     * @param StoreRoleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {

            $data = $request->all();
            $role = $this->roleRepository->create(array_merge($data, [
                'create_by' => auth()->id(),
                'update_by' => auth()->id(),
            ]));

            $role?->permissions()->attach($data['permissions']);

            DB::commit();
            $request->session()->flash('success', 'Tạo mới vai trò thành công');
            return redirect()->route('admin.roles.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store role', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới vai trò']])
                ->withInput();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int|string $id
     * @return Application|Factory|View
     */
    public function edit(int|string $id): Factory|View|Application
    {
        $role = $this->roleRepository->find($id);
        $role->load('permissions');
        $groupCheck = [];
        $permissions = $this->groupPermissionRepository->with('permissions')->all();
        foreach ($permissions as $group) {
            $arrayPerId = $group->permissions->pluck('id')->toArray();
            if (count(array_diff($arrayPerId, $role->permissions->pluck('id')->toArray())) === 0) {
                $groupCheck[] = $group->id;
            }
        }
        return view('admin.pages.role.edit')->with(compact('role', 'permissions', 'groupCheck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRoleRequest $request
     * @param int|string $id
     * @return RedirectResponse
     */
    public function update(StoreRoleRequest $request, int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $role = $this->roleRepository->find($id);

            $role?->fill(array_merge($data, [
                'update_by' => auth()->id(),
            ]));

            $role?->save();

            $role?->permissions()->sync($data['permissions']);

            DB::commit();

            $request->session()->flash('success', 'Cập nhật vai trò thành công');

            return redirect()->route('admin.roles.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update role', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật vai trò']])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int | string $id
     * @return RedirectResponse
     */
    public function destroy(int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->roleRepository->delete($id);

            DB::commit();

            session()->flash('success', 'Xóa vai trò thành công');

            return redirect()->route('admin.roles.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error delete role', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa vai trò']])
                ->withInput();
        }
    }
}
