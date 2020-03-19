<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class DriverDTO
 */
class DriverDTO extends AbstractJsonSerializable
{
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?string $shortName = null;
    protected int $driverCategory = 0;
    protected string $playerID;
}
