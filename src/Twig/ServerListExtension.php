<?php

namespace App\Twig;

use App\Repository\FtpServerRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ServerListExtension extends AbstractExtension
{
    /**
     * @var FtpServerRepository
     */
    protected $ftpServerRepository;

    public function __construct(FtpServerRepository $ftpServerRepository)
    {
        $this->ftpServerRepository = $ftpServerRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_servers', [$this, 'findServers']),
        ];
    }

    public function findServers(): array
    {
        return $this->ftpServerRepository->findAll();
    }
}
