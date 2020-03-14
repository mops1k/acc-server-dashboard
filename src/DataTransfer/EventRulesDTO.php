<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class EventRulesDTO
 */
class EventRulesDTO extends AbstractJsonSerializable
{
    protected $qualifyStandingType = 1;
    protected $pitWindowLengthSec = -1;
    protected $driverStintTimeSec = -1;
    protected $mandatoryPitstopCount = 0;
    protected $maxTotalDrivingTime = -1;
    protected $maxDriversCount = 1;
    protected $isRefuellingAllowedInRace = true;
    protected $isRefuellingTimeFixed = true;
    protected $isMandatoryPitstopRefuellingRequired = false;
    protected $isMandatoryPitstopTyreChangeRequired = false;
    protected $isMandatoryPitstopSwapDriverRequired = false;

    /**
     * @return int
     */
    public function getQualifyStandingType(): int
    {
        return $this->qualifyStandingType;
    }

    /**
     * @param int $qualifyStandingType
     *
     * @return EventRulesDTO
     */
    public function setQualifyStandingType(int $qualifyStandingType): EventRulesDTO
    {
        $this->qualifyStandingType = $qualifyStandingType;

        return $this;
    }

    /**
     * @return int
     */
    public function getPitWindowLengthSec(): int
    {
        return $this->pitWindowLengthSec;
    }

    /**
     * @param int $pitWindowLengthSec
     *
     * @return EventRulesDTO
     */
    public function setPitWindowLengthSec(int $pitWindowLengthSec): EventRulesDTO
    {
        $this->pitWindowLengthSec = $pitWindowLengthSec;

        return $this;
    }

    /**
     * @return int
     */
    public function getDriverStintTimeSec(): int
    {
        return $this->driverStintTimeSec;
    }

    /**
     * @param int $driverStintTimeSec
     *
     * @return EventRulesDTO
     */
    public function setDriverStintTimeSec(int $driverStintTimeSec): EventRulesDTO
    {
        $this->driverStintTimeSec = $driverStintTimeSec;

        return $this;
    }

    /**
     * @return int
     */
    public function getMandatoryPitstopCount(): int
    {
        return $this->mandatoryPitstopCount;
    }

    /**
     * @param int $mandatoryPitstopCount
     *
     * @return EventRulesDTO
     */
    public function setMandatoryPitstopCount(int $mandatoryPitstopCount): EventRulesDTO
    {
        $this->mandatoryPitstopCount = $mandatoryPitstopCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxTotalDrivingTime(): int
    {
        return $this->maxTotalDrivingTime;
    }

    /**
     * @param int $maxTotalDrivingTime
     *
     * @return EventRulesDTO
     */
    public function setMaxTotalDrivingTime(int $maxTotalDrivingTime): EventRulesDTO
    {
        $this->maxTotalDrivingTime = $maxTotalDrivingTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxDriversCount(): int
    {
        return $this->maxDriversCount;
    }

    /**
     * @param int $maxDriversCount
     *
     * @return EventRulesDTO
     */
    public function setMaxDriversCount(int $maxDriversCount): EventRulesDTO
    {
        $this->maxDriversCount = $maxDriversCount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRefuellingAllowedInRace(): bool
    {
        return $this->isRefuellingAllowedInRace;
    }

    /**
     * @param bool $isRefuellingAllowedInRace
     *
     * @return EventRulesDTO
     */
    public function setIsRefuellingAllowedInRace(bool $isRefuellingAllowedInRace): EventRulesDTO
    {
        $this->isRefuellingAllowedInRace = $isRefuellingAllowedInRace;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRefuellingTimeFixed(): bool
    {
        return $this->isRefuellingTimeFixed;
    }

    /**
     * @param bool $isRefuellingTimeFixed
     *
     * @return EventRulesDTO
     */
    public function setIsRefuellingTimeFixed(bool $isRefuellingTimeFixed): EventRulesDTO
    {
        $this->isRefuellingTimeFixed = $isRefuellingTimeFixed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMandatoryPitstopRefuellingRequired(): bool
    {
        return $this->isMandatoryPitstopRefuellingRequired;
    }

    /**
     * @param bool $isMandatoryPitstopRefuellingRequired
     *
     * @return EventRulesDTO
     */
    public function setIsMandatoryPitstopRefuellingRequired(bool $isMandatoryPitstopRefuellingRequired): EventRulesDTO
    {
        $this->isMandatoryPitstopRefuellingRequired = $isMandatoryPitstopRefuellingRequired;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMandatoryPitstopTyreChangeRequired(): bool
    {
        return $this->isMandatoryPitstopTyreChangeRequired;
    }

    /**
     * @param bool $isMandatoryPitstopTyreChangeRequired
     *
     * @return EventRulesDTO
     */
    public function setIsMandatoryPitstopTyreChangeRequired(bool $isMandatoryPitstopTyreChangeRequired): EventRulesDTO
    {
        $this->isMandatoryPitstopTyreChangeRequired = $isMandatoryPitstopTyreChangeRequired;

        return $this;
    }

    /**
     * @return bool
     */
    public function isMandatoryPitstopSwapDriverRequired(): bool
    {
        return $this->isMandatoryPitstopSwapDriverRequired;
    }

    /**
     * @param bool $isMandatoryPitstopSwapDriverRequired
     *
     * @return EventRulesDTO
     */
    public function setIsMandatoryPitstopSwapDriverRequired(bool $isMandatoryPitstopSwapDriverRequired): EventRulesDTO
    {
        $this->isMandatoryPitstopSwapDriverRequired = $isMandatoryPitstopSwapDriverRequired;

        return $this;
    }
}
