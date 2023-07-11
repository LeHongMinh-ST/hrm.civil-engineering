<?php declare(strict_types=1);

namespace App\Enums\Salary;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static Paid()
 * @method static static Unpaid()
 * @method static static Owed()
 */
final class SalaryStatus extends Enum implements LocalizedEnum
{
    public const Paid = 'paid';
    public const Unpaid = 'unpaid';
    public const Owed = 'owed';
}
