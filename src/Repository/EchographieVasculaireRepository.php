<?php

namespace App\Repository;

use App\Entity\EchographieVasculaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EchographieVasculaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method EchographieVasculaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method EchographieVasculaire[]    findAll()
 * @method EchographieVasculaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EchographieVasculaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EchographieVasculaire::class);
    }

    // /**
    //  * @return EchographieVasculaire[] Returns an array of EchographieVasculaire objects
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
    public function findOneBySomeField($value): ?EchographieVasculaire
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
