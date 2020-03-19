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

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @return DriverDTO
     */
    public function setFirstName(?string $firstName): DriverDTO
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return DriverDTO
     */
    public function setLastName(?string $lastName): DriverDTO
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    /**
     * @param string|null $shortName
     *
     * @return DriverDTO
     */
    public function setShortName(?string $shortName): DriverDTO
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * @return int
     */
    public function getDriverCategory(): int
    {
        return $this->driverCategory;
    }

    /**
     * @param int $driverCategory
     *
     * @return DriverDTO
     */
    public function setDriverCategory(int $driverCategory): DriverDTO
    {
        $this->driverCategory = $driverCategory;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlayerID(): string
    {
        return $this->playerID;
    }

    /**
     * @param string $playerID
     *
     * @return DriverDTO
     */
    public function setPlayerID(string $playerID): DriverDTO
    {
        $this->playerID = $playerID;

        return $this;
    }
}
