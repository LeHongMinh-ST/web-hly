<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CategoryType extends Enum
{
    const News = 'news';
    const Invesment = 'invesment';
    const Recruitment = 'recruitment';
}
