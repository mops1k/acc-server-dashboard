<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class EntryDTO
 */
class EntryDTO extends AbstractJsonSerializable
{
    /**
     * @var DriverDTO[]
     */
    protected array $drivers = [];
    protected int $raceNumber = -1;
    protected int $forcedCarModel = -1;
    protected int $overrideDriverInfo = 0;
    protected string $customCar = '';
    protected int $overrideCarModelForCustomCar = 0;
    protected int $isServerAdmin = 0;
    protected ?int $defaultGridPosition = null;
    protected int $ballastKg = 0;
    protected int $restrictor = 0;

    /**
     * @return DriverDTO[]
     */
    public function getDrivers(): array
    {
        return $this->drivers;
    }

    /**
     * @param DriverDTO[] $drivers
     *
     * @return EntryDTO
     */
    public function setDrivers(array $drivers): EntryDTO
    {
        $this->drivers = [];
        foreach ($drivers as $driver) {
            $this->drivers[] = new DriverDTO($driver);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getRaceNumber(): int
    {
        return $this->raceNumber;
    }

    /**
     * @param int $raceNumber
     *
     * @return EntryDTO
     */
    public function setRaceNumber(int $raceNumber): EntryDTO
    {
        $this->raceNumber = $raceNumber;

        return $this;
    }

    /**
     * @return int
     */
    public function getForcedCarModel(): int
    {
        return $this->forcedCarModel;
    }

    /**
     * @param int $forcedCarModel
     *
     * @return EntryDTO
     */
    public function setForcedCarModel(int $forcedCarModel): EntryDTO
    {
        $this->forcedCarModel = $forcedCarModel;

        return $this;
    }

    /**
     * @return int
     */
    public function getOverrideDriverInfo(): int
    {
        return $this->overrideDriverInfo;
    }

    /**
     * @param int $overrideDriverInfo
     *
     * @return EntryDTO
     */
    public function setOverrideDriverInfo(int $overrideDriverInfo): EntryDTO
    {
        $this->overrideDriverInfo = $overrideDriverInfo;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomCar(): string
    {
        return $this->customCar;
    }

    /**
     * @param string $customCar
     *
     * @return EntryDTO
     */
    public function setCustomCar(string $customCar): EntryDTO
    {
        $this->customCar = $customCar;

        return $this;
    }

    /**
     * @return int
     */
    public function getOverrideCarModelForCustomCar(): int
    {
        return $this->overrideCarModelForCustomCar;
    }

    /**
     * @param int $overrideCarModelForCustomCar
     *
     * @return EntryDTO
     */
    public function setOverrideCarModelForCustomCar(int $overrideCarModelForCustomCar): EntryDTO
    {
        $this->overrideCarModelForCustomCar = $overrideCarModelForCustomCar;

        return $this;
    }

    /**
     * @return int
     */
    public function getIsServerAdmin(): int
    {
        return $this->isServerAdmin;
    }

    /**
     * @param int $isServerAdmin
     *
     * @return EntryDTO
     */
    public function setIsServerAdmin(int $isServerAdmin): EntryDTO
    {
        $this->isServerAdmin = $isServerAdmin;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDefaultGridPosition(): ?int
    {
        return $this->defaultGridPosition;
    }

    /**
     * @param int|null $defaultGridPosition
     *
     * @return EntryDTO
     */
    public function setDefaultGridPosition(?int $defaultGridPosition): EntryDTO
    {
        $this->defaultGridPosition = $defaultGridPosition;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBallastKg(): ?int
    {
        return $this->ballastKg;
    }

    /**
     * @param int|null $ballastKg
     *
     * @return EntryDTO
     */
    public function setBallastKg(?int $ballastKg): EntryDTO
    {
        $this->ballastKg = $ballastKg;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRestrictor(): ?int
    {
        return $this->restrictor;
    }

    /**
     * @param int|null $restrictor
     *
     * @return EntryDTO
     */
    public function setRestrictor(?int $restrictor): EntryDTO
    {
        $this->restrictor = $restrictor;

        return $this;
    }
}
