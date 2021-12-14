<?php

namespace App\Repository;

use App\Entity\AngioplastiePontage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AngioplastiePontage|null find($id, $lockMode = null, $lockVersion = null)
 * @method AngioplastiePontage|null findOneBy(array $criteria, array $orderBy = null)
 * @method AngioplastiePontage[]    findAll()
 * @method AngioplastiePontage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AngioplastiePontageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AngioplastiePontage::class);
    }

    // /**
    //  * @return AngioplastiePontage[] Returns an array of AngioplastiePontage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AngioplastiePontage
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
