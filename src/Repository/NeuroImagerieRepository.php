<?php

namespace App\Repository;

use App\Entity\NeuroImagerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NeuroImagerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method NeuroImagerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method NeuroImagerie[]    findAll()
 * @method NeuroImagerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NeuroImagerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NeuroImagerie::class);
    }

    // /**
    //  * @return NeuroImagerie[] Returns an array of NeuroImagerie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NeuroImagerie
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
