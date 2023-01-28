<?php

use App\Models\Permission;
use App\Models\Role;

function checkPermission($codePermission): bool
{
    return true;
//    $user = auth()->guard()->user();
//    $role = Role::find($user->role_id);
//    if ($role->permissions) {
//        $isSuperAdmin = hasPermission($role, 'super-admin');
//        $isAdmin = hasPermission($role, 'admin');
//        if ($isSuperAdmin || $isAdmin) {
//            return true;
//        }
//
//        $isPermission = hasPermission($role, $codePermission);
//        if ($isPermission) {
//            return true;
//        }
//    }
//    return false;
}

function hasPermission($role, $codePermission)
{
    $idPermission = Permission::where('code', $codePermission)->first();
    if ($idPermission)
        return $role->permissions->contains($idPermission->id);
    return false;
}

function deleteValue($array, $value): array
{
    if (($key = array_search($value, $array)) !== false) {
        unset($array[$key]);
    }

    return array_values($array);
}
