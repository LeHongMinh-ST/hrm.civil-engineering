<?php declare(strict_types=1);

namespace App\Enums\Attendance;

use BenSampo\Enum\Enum;

/**
 * @method static static Full()
 * @method static static Half()
 * @method static static Ro()
 */
final class AttendanceStatus extends Enum
{
    const Full = 'full';
    const Half = 'half';
    const Ro = 'ro';
}
