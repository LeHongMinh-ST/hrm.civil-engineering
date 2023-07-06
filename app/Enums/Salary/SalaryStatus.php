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
    const Paid = 'paid';
    const Unpaid = 'unpaid';
    const Owed = 'owed';
}
