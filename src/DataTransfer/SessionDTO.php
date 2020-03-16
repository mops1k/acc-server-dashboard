<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class SessionDTO
 */
class SessionDTO extends AbstractJsonSerializable
{
    protected $hourOfDay;
    protected $dayOfWeekend;
    protected $timeMultiplier;
    protected $sessionType;
    protected $sessionDurationMinutes;
}
