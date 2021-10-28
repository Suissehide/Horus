<?php

namespace App\Repository;

use App\Entity\Facteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Facteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facteur[]    findAll()
 * @method Facteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facteur::class);
    }

    // /**
    //  * @return Facteur[] Returns an array of Facteur objects
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
    public function findOneBySomeField($value): ?Facteur
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
