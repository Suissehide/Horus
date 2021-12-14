<?php

namespace App\Repository;

use App\Entity\TestEffort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TestEffort|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestEffort|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestEffort[]    findAll()
 * @method TestEffort[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestEffortRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestEffort::class);
    }

    // /**
    //  * @return TestEffort[] Returns an array of TestEffort objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestEffort
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
