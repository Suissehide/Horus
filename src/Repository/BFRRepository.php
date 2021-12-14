<?php

namespace App\Repository;

use App\Entity\BFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method BFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method BFR[]    findAll()
 * @method BFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BFR::class);
    }

    // /**
    //  * @return BFR[] Returns an array of BFR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BFR
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
