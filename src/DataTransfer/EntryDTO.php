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
    protected ?int $ballastKg = null;
    protected ?int $restrictor = null;
}
