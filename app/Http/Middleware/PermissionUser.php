<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\Role;
use App\Traits\ResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PermissionUser
{
    public function handle(Request $request, Closure $next, $namePermission)
    {
        try {
            $user = auth()->user();
            $isSuperAdmin = $user->is_super_admin;
            if ($isSuperAdmin) {
                return $next($request);
            }

            $role = Role::find($user->role_id);

            if (!$role) {
                 abort(403);
            }

            if (@$role->permissions) {
                $isPermission = $this->hasPermission($role, $namePermission);
                if ($isPermission) {
                    return $next($request);
                }
            }

            abort(403);

        } catch (\Exception $e) {
            Log::error('Error middleware permission for user', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);
            session()->flash('error', 'Bạn không có quyền truy cập chức năng này');

            return redirect()->back();
        }

    }

    private function hasPermission($role, $codePermission)
    {
        $idPermission = Permission::where('code', $codePermission)->first();

        if ($idPermission)
            return $role->permissions->contains($idPermission->id);
        return false;
    }
}
