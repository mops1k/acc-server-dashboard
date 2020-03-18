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

    /**
     * @return mixed
     */
    public function getHourOfDay(): int
    {
        return $this->hourOfDay;
    }

    /**
     * @param mixed $hourOfDay
     *
     * @return SessionDTO
     */
    public function setHourOfDay(int $hourOfDay)
    {
        $this->hourOfDay = $hourOfDay;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDayOfWeekend(): int
    {
        return $this->dayOfWeekend;
    }

    /**
     * @param mixed $dayOfWeekend
     *
     * @return SessionDTO
     */
    public function setDayOfWeekend(int $dayOfWeekend)
    {
        $this->dayOfWeekend = $dayOfWeekend;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeMultiplier(): int
    {
        return $this->timeMultiplier;
    }

    /**
     * @param mixed $timeMultiplier
     *
     * @return SessionDTO
     */
    public function setTimeMultiplier(int $timeMultiplier)
    {
        $this->timeMultiplier = $timeMultiplier;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSessionType()
    {
        return $this->sessionType;
    }

    /**
     * @param mixed $sessionType
     *
     * @return SessionDTO
     */
    public function setSessionType(string $sessionType)
    {
        $this->sessionType = $sessionType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSessionDurationMinutes(): int
    {
        return $this->sessionDurationMinutes;
    }

    /**
     * @param mixed $sessionDurationMinutes
     *
     * @return SessionDTO
     */
    public function setSessionDurationMinutes(int $sessionDurationMinutes)
    {
        $this->sessionDurationMinutes = $sessionDurationMinutes;

        return $this;
    }
}
