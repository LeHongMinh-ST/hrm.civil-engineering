<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static Admin()
 * @method static static User()
 */
final class UserRole extends Enum implements LocalizedEnum
{
    public const Admin = 'admin';
    public const User = 'user';
}
