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
}
