<?php

namespace App\Repository;

use App\Entity\Catheterisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Catheterisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Catheterisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Catheterisation[]    findAll()
 * @method Catheterisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatheterisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Catheterisation::class);
    }

    // /**
    //  * @return Catheterisation[] Returns an array of Catheterisation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Catheterisation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
