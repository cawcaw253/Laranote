<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static REQUESTED()
 * @method static static ACTIVATED()
 * @method static static BLOCKED()
 */
final class UserStatus extends Enum
{
    const REQUESTED = 'requested';
    const ACTIVATED = 'activated';
    const BLOCKED = 'blocked';
}
