<?php

namespace App\Repository;

use App\Entity\Echocardiographie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Echocardiographie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Echocardiographie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Echocardiographie[]    findAll()
 * @method Echocardiographie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EchocardiographieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Echocardiographie::class);
    }

    // /**
    //  * @return Echocardiographie[] Returns an array of Echocardiographie objects
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
    public function findOneBySomeField($value): ?Echocardiographie
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
