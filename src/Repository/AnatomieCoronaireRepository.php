<?php

namespace App\Repository;

use App\Entity\AnatomieCoronaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnatomieCoronaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnatomieCoronaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnatomieCoronaire[]    findAll()
 * @method AnatomieCoronaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnatomieCoronaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnatomieCoronaire::class);
    }

    // /**
    //  * @return AnatomieCoronaire[] Returns an array of AnatomieCoronaire objects
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
    public function findOneBySomeField($value): ?AnatomieCoronaire
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
