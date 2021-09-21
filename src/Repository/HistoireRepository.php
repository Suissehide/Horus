<?php

namespace App\Repository;

use App\Entity\Histoire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Histoire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Histoire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Histoire[]    findAll()
 * @method Histoire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Histoire::class);
    }

    // /**
    //  * @return Histoire[] Returns an array of Histoire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Histoire
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
