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
    const Admin = 'admin';
    const User = 'user';
}
