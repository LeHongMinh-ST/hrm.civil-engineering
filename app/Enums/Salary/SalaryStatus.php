<?php declare(strict_types=1);

namespace App\Enums\Salary;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @const  Paid
 * @const  Unpaid
 * @const  Owed
 */
final class SalaryStatus extends Enum implements LocalizedEnum
{
    public const Paid = 'paid';
    public const Unpaid = 'unpaid';
    public const Owed = 'owed';
}
