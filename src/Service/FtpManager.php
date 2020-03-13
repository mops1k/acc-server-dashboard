<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\FtpServer;
use Doctrine\ORM\EntityManagerInterface;
use Gaufrette\Adapter\Cache;
use Gaufrette\Adapter\Ftp;
use Gaufrette\Adapter\Local;
use Gaufrette\Filesystem;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class FtpManager
 */
class FtpManager
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var string
     */
    private $cacheDir;

    /**
     * FtpManager constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param KernelInterface        $kernel
     */
    public function __construct(EntityManagerInterface $entityManager, KernelInterface $kernel)
    {
        $this->entityManager = $entityManager;
        $this->cacheDir      = $kernel->getCacheDir();
    }

    public function get(int $id): Filesystem
    {
        /** @var FtpServer $ftpServer */
        $ftpServer = $this->entityManager->getRepository(FtpServer::class)->find($id);

        if (!$ftpServer) {
            throw new NotFoundHttpException('Selected server not found');
        }

        $adapter = new Ftp(
            $ftpServer->getPath(),
            $ftpServer->getIp(),
            [
                'port'     => $ftpServer->getPort(),
                'username' => $ftpServer->getUsername(),
                'password' => $ftpServer->getPassword(),
                'passive'  => false,
                'create'   => false, // Whether to create the remote directory if it does not exist
                'mode'     => FTP_TEXT, // Or FTP_TEXT
                'ssl'      => $ftpServer->getUseSsl(),
            ]
        );

        $ftpCacheDir  = $this->cacheDir.DIRECTORY_SEPARATOR.'filesystem'.DIRECTORY_SEPARATOR.$ftpServer->getId();
        $local        = new Local($ftpCacheDir, true);
        $cacheAdapter = new Cache($adapter, $local, 3600);

        return new Filesystem($cacheAdapter);
    }
}
