<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class AssistRulesDTO
 */
class AssistRulesDTO extends AbstractJsonSerializable
{
    protected $stabilityControlLevelMax = 0;
    protected $disableAutosteer         = 0;
    protected $disableAutoLights        = 0;
    protected $disableAutoWiper         = 0;
    protected $disableAutoEngineStart   = 0;
    protected $disableAutoPitLimiter    = 0;
    protected $disableAutoGear          = 0;
    protected $disableAutoClutch        = 0;
    protected $disableIdealLine         = 0;

    /**
     * @return int
     */
    public function getStabilityControlLevelMax(): int
    {
        return $this->stabilityControlLevelMax;
    }

    /**
     * @param int $stabilityControlLevelMax
     *
     * @return AssistRulesDTO
     */
    public function setStabilityControlLevelMax(int $stabilityControlLevelMax): AssistRulesDTO
    {
        $this->stabilityControlLevelMax = $stabilityControlLevelMax;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableAutosteer(): int
    {
        return $this->disableAutosteer;
    }

    /**
     * @param int $disableAutosteer
     *
     * @return AssistRulesDTO
     */
    public function setDisableAutosteer(int $disableAutosteer): AssistRulesDTO
    {
        $this->disableAutosteer = $disableAutosteer;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableAutoLights(): int
    {
        return $this->disableAutoLights;
    }

    /**
     * @param int $disableAutoLights
     *
     * @return AssistRulesDTO
     */
    public function setDisableAutoLights(int $disableAutoLights): AssistRulesDTO
    {
        $this->disableAutoLights = $disableAutoLights;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableAutoWiper(): int
    {
        return $this->disableAutoWiper;
    }

    /**
     * @param int $disableAutoWiper
     *
     * @return AssistRulesDTO
     */
    public function setDisableAutoWiper(int $disableAutoWiper): AssistRulesDTO
    {
        $this->disableAutoWiper = $disableAutoWiper;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableAutoEngineStart(): int
    {
        return $this->disableAutoEngineStart;
    }

    /**
     * @param int $disableAutoEngineStart
     *
     * @return AssistRulesDTO
     */
    public function setDisableAutoEngineStart(int $disableAutoEngineStart): AssistRulesDTO
    {
        $this->disableAutoEngineStart = $disableAutoEngineStart;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableAutoPitLimiter(): int
    {
        return $this->disableAutoPitLimiter;
    }

    /**
     * @param int $disableAutoPitLimiter
     *
     * @return AssistRulesDTO
     */
    public function setDisableAutoPitLimiter(int $disableAutoPitLimiter): AssistRulesDTO
    {
        $this->disableAutoPitLimiter = $disableAutoPitLimiter;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableAutoGear(): int
    {
        return $this->disableAutoGear;
    }

    /**
     * @param int $disableAutoGear
     *
     * @return AssistRulesDTO
     */
    public function setDisableAutoGear(int $disableAutoGear): AssistRulesDTO
    {
        $this->disableAutoGear = $disableAutoGear;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableAutoClutch(): int
    {
        return $this->disableAutoClutch;
    }

    /**
     * @param int $disableAutoClutch
     *
     * @return AssistRulesDTO
     */
    public function setDisableAutoClutch(int $disableAutoClutch): AssistRulesDTO
    {
        $this->disableAutoClutch = $disableAutoClutch;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisableIdealLine(): int
    {
        return $this->disableIdealLine;
    }

    /**
     * @param int $disableIdealLine
     *
     * @return AssistRulesDTO
     */
    public function setDisableIdealLine(int $disableIdealLine): AssistRulesDTO
    {
        $this->disableIdealLine = $disableIdealLine;

        return $this;
    }
}
