<?php

use App\Enums\Language;
use App\Models\Permission;
use App\Models\Role;

function checkPermission($codePermission): bool
{
    $user = auth()->user();
    $role = Role::find($user->role_id);
    if ($user->is_super_admin) {
        return true;
    }

    if (@$role->permissions) {
        $isPermission = hasPermission($role, $codePermission);
        if ($isPermission) {
            return true;
        }
    }
    return false;
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

function abbreviateNumber($num) {
    $abbreviations = [
        1e6 => " Tr",
        1e3 => " K"
    ];

    foreach ($abbreviations as $value => $abbreviation) {
        if ($num >= $value) {
            $result = $num / $value;
            if (floor($result) == $result) {
                return rtrim(sprintf("%.0f%s", $result, $abbreviation), ".");
            } else {
                return rtrim(sprintf("%.1f%s", $result, $abbreviation), ".");
            }
        }
    }

    return $num;
}

function getIconFlag($locale): string
{
    return match ($locale) {
        Language::Vietnamese => asset('assets/admin/images/flags/vietnam-flag-icon.svg'),
        Language::English => asset('assets/admin/images/flags/united-kingdom-flag-icon.svg'),
        Language::Chinese => asset('assets/admin/images/flags/china-flag-icon.svg'),
    };
}
