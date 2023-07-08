<?php

use App\Enums\Language;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

if (!function_exists('checkPermission')) {
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
}

if (!function_exists('hasPermission')) {
    function hasPermission($role, $codePermission)
    {
        $idPermission = Permission::where('code', $codePermission)->first();
        if ($idPermission)
            return $role->permissions->contains($idPermission->id);
        return false;
    }
}


if (!function_exists('deleteValue')) {
    function deleteValue($array, $value): array
    {
        if (($key = array_search($value, $array)) !== false) {
            unset($array[$key]);
        }

        return array_values($array);
    }
}

if (!function_exists('abbreviateNumber')) {
    function abbreviateNumber($num)
    {
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
}

if (!function_exists('getIconFlag')) {
    function getIconFlag($locale): string
    {
        return match ($locale) {
            Language::Vietnamese => asset('assets/admin/images/flags/vietnam-flag-icon.svg'),
            Language::English => asset('assets/admin/images/flags/united-kingdom-flag-icon.svg'),
            Language::Chinese => asset('assets/admin/images/flags/china-flag-icon.svg'),
        };
    }
}


if (!function_exists('rememberAsync')) {
    function rememberAsync($key, $ttl, $callback, $queue = "default")
    {
        $currentValue = Cache::get($key);
        if (!is_null($currentValue)) {
            return $currentValue;
        }
        $fallbackKey = "{$key}/fallback";

        dispatch(function () use ($key, $callback, $ttl, $fallbackKey) {
            Cache::put($key, $callback(), $ttl);
            Cache::forever($fallbackKey, $callback());
        })->onQueue($queue);

        if ($fallbackValue = Cache::get($fallbackKey)) {
            return $fallbackValue;
        }
        return null;
    }
}

if (!function_exists('removeCaches')) {
    function removeCaches(array $arrayKey): void
    {
        foreach ($arrayKey as $value) {
            Cache::forget($value);
        }
    }
}

if (!function_exists('getValueKeySetting')) {
    function getValueKeySetting($key): string
    {
        $record = DB::table('settings')->where('key', $key)->first();
        return $record ? $record->value : config('seo.'.$key, '');
    }
}


