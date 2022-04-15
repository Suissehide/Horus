<?php

namespace App\Repository;

use App\Entity\Scintigraphie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scintigraphie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scintigraphie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scintigraphie[]    findAll()
 * @method Scintigraphie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScintigraphieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scintigraphie::class);
    }

    // /**
    //  * @return Scintigraphie[] Returns an array of Scintigraphie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scintigraphie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
