<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ACTIVE()
 * @method static static BLOCKED()
 */
final class UserStatus extends Enum
{
    const ACTIVE = 'active';
    const BLOCKED = 'blocked';
}
