<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class SettingsDTO
 */
class SettingsDTO extends AbstractJsonSerializable
{
    protected $serverName = 'ACC Server (please change it)';
    protected $adminPassword;
    protected $trackMedalsRequirement = 0;
    protected $safetyRatingRequirement = -1;
    protected $racecraftRatingRequirement = -1;
    protected $password;
    protected $spectatorPassword;
    protected $maxCarSlots = 32;
    protected $dumpLeaderboards = 0;
    protected $isRaceLocked = 1;
    protected $randomizeTrackWhenEmpty = 0;
    protected $centralEntryListPath;
    protected $allowAutoDQ = 1;
    protected $shortFormationLap = 1;
    protected $dumpEntryList = 0;
    protected $formationLapType = 3;

    /**
     * @return mixed
     */
    public function getAdminPassword()
    {
        return $this->adminPassword;
    }

    /**
     * @param mixed $adminPassword
     *
     * @return SettingsDTO
     */
    public function setAdminPassword($adminPassword)
    {
        $this->adminPassword = $adminPassword;

        return $this;
    }

    /**
     * @return int
     */
    public function getTrackMedalsRequirement(): int
    {
        return $this->trackMedalsRequirement;
    }

    /**
     * @param int $trackMedalsRequirement
     *
     * @return SettingsDTO
     */
    public function setTrackMedalsRequirement(int $trackMedalsRequirement): SettingsDTO
    {
        $this->trackMedalsRequirement = $trackMedalsRequirement;

        return $this;
    }

    /**
     * @return int
     */
    public function getSafetyRatingRequirement(): int
    {
        return $this->safetyRatingRequirement;
    }

    /**
     * @param int $safetyRatingRequirement
     *
     * @return SettingsDTO
     */
    public function setSafetyRatingRequirement(int $safetyRatingRequirement): SettingsDTO
    {
        $this->safetyRatingRequirement = $safetyRatingRequirement;

        return $this;
    }

    /**
     * @return int
     */
    public function getRacecraftRatingRequirement(): int
    {
        return $this->racecraftRatingRequirement;
    }

    /**
     * @param int $racecraftRatingRequirement
     *
     * @return SettingsDTO
     */
    public function setRacecraftRatingRequirement(int $racecraftRatingRequirement): SettingsDTO
    {
        $this->racecraftRatingRequirement = $racecraftRatingRequirement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return SettingsDTO
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpectatorPassword()
    {
        return $this->spectatorPassword;
    }

    /**
     * @param mixed $spectatorPassword
     *
     * @return SettingsDTO
     */
    public function setSpectatorPassword($spectatorPassword)
    {
        $this->spectatorPassword = $spectatorPassword;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxCarSlots(): int
    {
        return $this->maxCarSlots;
    }

    /**
     * @param int $maxCarSlots
     *
     * @return SettingsDTO
     */
    public function setMaxCarSlots(int $maxCarSlots): SettingsDTO
    {
        $this->maxCarSlots = $maxCarSlots;

        return $this;
    }

    /**
     * @return int
     */
    public function getDumpLeaderboards(): int
    {
        return $this->dumpLeaderboards;
    }

    /**
     * @param int $dumpLeaderboards
     *
     * @return SettingsDTO
     */
    public function setDumpLeaderboards(int $dumpLeaderboards): SettingsDTO
    {
        $this->dumpLeaderboards = $dumpLeaderboards;

        return $this;
    }

    /**
     * @return int
     */
    public function getIsRaceLocked(): int
    {
        return $this->isRaceLocked;
    }

    /**
     * @param int $isRaceLocked
     *
     * @return SettingsDTO
     */
    public function setIsRaceLocked(int $isRaceLocked): SettingsDTO
    {
        $this->isRaceLocked = $isRaceLocked;

        return $this;
    }

    /**
     * @return int
     */
    public function getRandomizeTrackWhenEmpty(): int
    {
        return $this->randomizeTrackWhenEmpty;
    }

    /**
     * @param int $randomizeTrackWhenEmpty
     *
     * @return SettingsDTO
     */
    public function setRandomizeTrackWhenEmpty(int $randomizeTrackWhenEmpty): SettingsDTO
    {
        $this->randomizeTrackWhenEmpty = $randomizeTrackWhenEmpty;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCentralEntryListPath()
    {
        return $this->centralEntryListPath;
    }

    /**
     * @param mixed $centralEntryListPath
     *
     * @return SettingsDTO
     */
    public function setCentralEntryListPath($centralEntryListPath)
    {
        $this->centralEntryListPath = $centralEntryListPath;

        return $this;
    }

    /**
     * @return int
     */
    public function getAllowAutoDQ(): int
    {
        return $this->allowAutoDQ;
    }

    /**
     * @param int $allowAutoDQ
     *
     * @return SettingsDTO
     */
    public function setAllowAutoDQ(int $allowAutoDQ): SettingsDTO
    {
        $this->allowAutoDQ = $allowAutoDQ;

        return $this;
    }

    /**
     * @return int
     */
    public function getShortFormationLap(): int
    {
        return $this->shortFormationLap;
    }

    /**
     * @param int $shortFormationLap
     *
     * @return SettingsDTO
     */
    public function setShortFormationLap(int $shortFormationLap): SettingsDTO
    {
        $this->shortFormationLap = $shortFormationLap;

        return $this;
    }

    /**
     * @return int
     */
    public function getDumpEntryList(): int
    {
        return $this->dumpEntryList;
    }

    /**
     * @param int $dumpEntryList
     *
     * @return SettingsDTO
     */
    public function setDumpEntryList(int $dumpEntryList): SettingsDTO
    {
        $this->dumpEntryList = $dumpEntryList;

        return $this;
    }

    /**
     * @return int
     */
    public function getFormationLapType(): int
    {
        return $this->formationLapType;
    }

    /**
     * @param int $formationLapType
     *
     * @return SettingsDTO
     */
    public function setFormationLapType(int $formationLapType): SettingsDTO
    {
        $this->formationLapType = $formationLapType;

        return $this;
    }

    /**
     * @return string
     */
    public function getServerName(): string
    {
        return $this->serverName;
    }

    /**
     * @param string $serverName
     *
     * @return SettingsDTO
     */
    public function setServerName(string $serverName): SettingsDTO
    {
        $this->serverName = $serverName;

        return $this;
    }
}
