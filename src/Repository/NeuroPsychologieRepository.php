<?php

namespace App\Repository;

use App\Entity\NeuroPsychologie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NeuroPsychologie|null find($id, $lockMode = null, $lockVersion = null)
 * @method NeuroPsychologie|null findOneBy(array $criteria, array $orderBy = null)
 * @method NeuroPsychologie[]    findAll()
 * @method NeuroPsychologie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NeuroPsychologieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NeuroPsychologie::class);
    }

    // /**
    //  * @return NeuroPsychologie[] Returns an array of NeuroPsychologie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NeuroPsychologie
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
