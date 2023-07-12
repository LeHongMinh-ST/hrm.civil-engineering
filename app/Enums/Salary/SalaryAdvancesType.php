<?php declare(strict_types=1);

namespace App\Enums\Salary;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @const  Payment
 * @const  Advances
 */
final class SalaryAdvancesType extends Enum implements LocalizedEnum
{
    public const Payment = 'payment';
    public const Advances = 'Advances';
}
