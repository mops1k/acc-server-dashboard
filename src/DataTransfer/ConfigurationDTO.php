<?php
declare(strict_types=1);

namespace App\DataTransfer;

/**
 * Class ConfigurationDTO
 */
class ConfigurationDTO extends AbstractJsonSerializable
{
    protected $tcpPort = 9201;
    protected $udpPort = 9201;
    protected $registerToLobby = 1;
    protected $maxConnections;
    protected $lanDiscovery = 1;

    /**
     * @return int
     */
    public function getTcpPort(): int
    {
        return $this->tcpPort;
    }

    /**
     * @param int $tcpPort
     *
     * @return ConfigurationDTO
     */
    public function setTcpPort(int $tcpPort): ConfigurationDTO
    {
        $this->tcpPort = $tcpPort;

        return $this;
    }

    /**
     * @return int
     */
    public function getUdpPort(): int
    {
        return $this->udpPort;
    }

    /**
     * @param int $udpPort
     *
     * @return ConfigurationDTO
     */
    public function setUdpPort(int $udpPort): ConfigurationDTO
    {
        $this->udpPort = $udpPort;

        return $this;
    }

    /**
     * @return int
     */
    public function getRegisterToLobby(): int
    {
        return $this->registerToLobby;
    }

    /**
     * @param int $registerToLobby
     *
     * @return ConfigurationDTO
     */
    public function setRegisterToLobby(int $registerToLobby): ConfigurationDTO
    {
        $this->registerToLobby = $registerToLobby;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxConnections()
    {
        return $this->maxConnections;
    }

    /**
     * @param mixed $maxConnections
     *
     * @return ConfigurationDTO
     */
    public function setMaxConnections($maxConnections)
    {
        $this->maxConnections = $maxConnections;

        return $this;
    }

    /**
     * @return int
     */
    public function getLanDiscovery(): int
    {
        return $this->lanDiscovery;
    }

    /**
     * @param int $lanDiscovery
     *
     * @return ConfigurationDTO
     */
    public function setLanDiscovery(int $lanDiscovery): ConfigurationDTO
    {
        $this->lanDiscovery = $lanDiscovery;

        return $this;
    }
}
