<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CategoryType extends Enum
{
    const News = 'news';

    const Investment = 'investment';

    const Recruitment = 'recruitment';

    public static function getDescription(mixed $value): string
    {
        return match ($value) {
            self::News => 'Tin tức',
            self::Investment => 'Tin tức đầu tư',
            self::Recruitment => 'Tuyển dụng',
            default => parent::getDescription($value),
        };

    }
}
