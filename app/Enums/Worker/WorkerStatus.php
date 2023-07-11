<?php declare(strict_types=1);

namespace App\Enums\Worker;

use BenSampo\Enum\Enum;

/**
 * @method static static InWorking()
 * @method static static Quit()
 */
final class WorkerStatus extends Enum
{
    public const InWorking = 'inWorking';
    public const Quit = 'quit';
}
