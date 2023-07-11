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
    public const Full = 'full';
    public const Half = 'half';
    public const Ro = 'ro';
}
