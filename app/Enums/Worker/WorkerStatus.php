<?php declare(strict_types=1);

namespace App\Enums\Worker;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @const  InWorking
 * @const  Quit
 */
final class WorkerStatus extends Enum implements LocalizedEnum
{
    public const InWorking = 'inWorking';
    public const Quit = 'quit';
}
