<?php

namespace App\Repository;

use App\Entity\AntecedentCardiovasculaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AntecedentCardiovasculaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method AntecedentCardiovasculaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method AntecedentCardiovasculaire[]    findAll()
 * @method AntecedentCardiovasculaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AntecedentCardiovasculaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AntecedentCardiovasculaire::class);
    }

    // /**
    //  * @return AntecedentCardiovasculaire[] Returns an array of AntecedentCardiovasculaire objects
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
    public function findOneBySomeField($value): ?AntecedentCardiovasculaire
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
