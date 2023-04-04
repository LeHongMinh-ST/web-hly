<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ContactStatus extends Enum
{
    const Unread = 'unread';

    const Read = 'read';
    const Reply = 'reply';
}
