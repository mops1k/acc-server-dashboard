<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class EventDTO
 */
class EventDTO extends AbstractJsonSerializable
{
    /**
     * @var string
     */
    protected $track;
    protected $preRaceWaitingTimeSeconds;
    protected $sessionOverTimeSeconds;
    protected $ambientTemp;
    protected $trackTemp;
    protected $cloudLevel;
    protected $rain;
    protected $weatherRandomness;
    protected $postQualySeconds;
    protected $postRaceSeconds;
    protected $metaData;

    /**
     * @var SessionDTO[]
     */
    protected $sessions;

    /**
     * @return string
     */
    public function getTrack(): string
    {
        return $this->track;
    }

    /**
     * @param string $track
     *
     * @return EventDTO
     */
    public function setTrack(string $track): EventDTO
    {
        $this->track = $track;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPreRaceWaitingTimeSeconds(): int
    {
        return $this->preRaceWaitingTimeSeconds;
    }

    /**
     * @param mixed $preRaceWaitingTimeSeconds
     *
     * @return EventDTO
     */
    public function setPreRaceWaitingTimeSeconds(int $preRaceWaitingTimeSeconds)
    {
        $this->preRaceWaitingTimeSeconds = $preRaceWaitingTimeSeconds;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSessionOverTimeSeconds(): int
    {
        return $this->sessionOverTimeSeconds;
    }

    /**
     * @param mixed $sessionOverTimeSeconds
     *
     * @return EventDTO
     */
    public function setSessionOverTimeSeconds(int $sessionOverTimeSeconds)
    {
        $this->sessionOverTimeSeconds = $sessionOverTimeSeconds;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmbientTemp(): int
    {
        return $this->ambientTemp;
    }

    /**
     * @param mixed $ambientTemp
     *
     * @return EventDTO
     */
    public function setAmbientTemp(int $ambientTemp)
    {
        $this->ambientTemp = $ambientTemp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrackTemp(): int
    {
        return $this->trackTemp;
    }

    /**
     * @param mixed $trackTemp
     *
     * @return EventDTO
     */
    public function setTrackTemp(int $trackTemp)
    {
        $this->trackTemp = $trackTemp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCloudLevel(): float
    {
        return $this->cloudLevel;
    }

    /**
     * @param mixed $cloudLevel
     *
     * @return EventDTO
     */
    public function setCloudLevel(float $cloudLevel)
    {
        $this->cloudLevel = $cloudLevel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRain(): float
    {
        return $this->rain;
    }

    /**
     * @param mixed $rain
     *
     * @return EventDTO
     */
    public function setRain(float $rain)
    {
        $this->rain = $rain;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeatherRandomness(): int
    {
        return $this->weatherRandomness;
    }

    /**
     * @param mixed $weatherRandomness
     *
     * @return EventDTO
     */
    public function setWeatherRandomness(int $weatherRandomness)
    {
        $this->weatherRandomness = $weatherRandomness;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostQualySeconds(): ?int
    {
        return $this->postQualySeconds;
    }

    /**
     * @param mixed $postQualySeconds
     *
     * @return EventDTO
     */
    public function setPostQualySeconds(?int $postQualySeconds)
    {
        $this->postQualySeconds = $postQualySeconds;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostRaceSeconds(): ?int
    {
        return $this->postRaceSeconds;
    }

    /**
     * @param mixed $postRaceSeconds
     *
     * @return EventDTO
     */
    public function setPostRaceSeconds(?int $postRaceSeconds)
    {
        $this->postRaceSeconds = $postRaceSeconds;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaData(): ?string
    {
        return $this->metaData;
    }

    /**
     * @param mixed $metaData
     *
     * @return EventDTO
     */
    public function setMetaData(?string $metaData)
    {
        $this->metaData = $metaData;

        return $this;
    }

    /**
     * @return SessionDTO[]
     */
    public function getSessions(): array
    {
        return $this->sessions;
    }

    /**
     * @param SessionDTO[] $sessions
     *
     * @return EventDTO
     */
    public function setSessions(array $sessions): EventDTO
    {
        $this->sessions = [];
        foreach ($sessions as $session) {
            $this->sessions[] = new SessionDTO($session);
        }

        return $this;
    }
}
