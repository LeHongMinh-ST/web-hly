<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PostType extends Enum
{
    const News = 0;

    const Investment = 1;
    public static function getDescription(mixed $value): string
    {
        return match ($value) {
            self::News => 0,
            self::Investment => 1,
            default => parent::getDescription($value),
        };

    }
}
