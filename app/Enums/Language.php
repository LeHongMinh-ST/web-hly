<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Language extends Enum
{
    const Vietnamese = 'vi';
    const English = 'en';
    const Chinese = 'cn';

    public static function getDescription($value): string
    {
        if ($value === self::Vietnamese) {
            return 'Tiếng Việt';
        }

        if ($value === self::Chinese) {
            return 'Tiếng Trung';
        }

        if ($value === self::English) {
            return 'Tiếng Anh';
        }

        return parent::getDescription($value);
    }

    public static function getIconFlag($locale): string
    {
        return match ($locale) {
            Language::Vietnamese => asset('assets/admin/images/flags/vietnam-flag-icon.svg'),
            Language::English => asset('assets/admin/images/flags/united-kingdom-flag-icon.svg'),
            Language::Chinese => asset('assets/admin/images/flags/china-flag-icon.svg'),
        };
    }
}
