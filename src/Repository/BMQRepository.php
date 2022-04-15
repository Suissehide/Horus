<?php

namespace App\Repository;

use App\Entity\BMQ;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BMQ|null find($id, $lockMode = null, $lockVersion = null)
 * @method BMQ|null findOneBy(array $criteria, array $orderBy = null)
 * @method BMQ[]    findAll()
 * @method BMQ[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BMQRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BMQ::class);
    }

    // /**
    //  * @return BMQ[] Returns an array of BMQ objects
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
    public function findOneBySomeField($value): ?BMQ
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
