<?php declare(strict_types=1);

namespace App\Enums\Salary;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static Payment()
 * @method static static Advances()
 */
final class SalaryAdvancesType extends Enum implements LocalizedEnum
{
    const Payment = 'payment';
    const Advances = 'Advances';
}