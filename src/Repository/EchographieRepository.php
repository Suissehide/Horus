<?php

namespace App\Repository;

use App\Entity\Echographie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Echographie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Echographie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Echographie[]    findAll()
 * @method Echographie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EchographieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Echographie::class);
    }

    // /**
    //  * @return Echographie[] Returns an array of Echographie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Echographie
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
