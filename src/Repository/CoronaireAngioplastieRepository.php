<?php

namespace App\Repository;

use App\Entity\CoronaireAngioplastie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoronaireAngioplastie|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoronaireAngioplastie|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoronaireAngioplastie[]    findAll()
 * @method CoronaireAngioplastie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoronaireAngioplastieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoronaireAngioplastie::class);
    }

    // /**
    //  * @return CoronaireAngioplastie[] Returns an array of CoronaireAngioplastie objects
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
    public function findOneBySomeField($value): ?CoronaireAngioplastie
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
