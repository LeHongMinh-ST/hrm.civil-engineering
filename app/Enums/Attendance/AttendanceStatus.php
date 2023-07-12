<?php declare(strict_types=1);

namespace App\Enums\Attendance;

use BenSampo\Enum\Enum;

/**
 * @const Full
 * @const Half
 * @const Ro
 */
final class AttendanceStatus extends Enum
{
    public const Full = 'full';
    public const Half = 'half';
    public const Ro = 'ro';
}
