<?php

namespace App\Repository;

use App\Entity\FtpServer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FtpServer|null find($id, $lockMode = null, $lockVersion = null)
 * @method FtpServer|null findOneBy(array $criteria, array $orderBy = null)
 * @method FtpServer[]    findAll()
 * @method FtpServer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FtpServerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FtpServer::class);
    }

    // /**
    //  * @return FtpServer[] Returns an array of FtpServer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FtpServer
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
