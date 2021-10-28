<?php

namespace App\Repository;

use App\Entity\Erreur;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Erreur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Erreur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Erreur[]    findAll()
 * @method Erreur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErreurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Erreur::class);
    }

    public function countAllErreur($patientId)
    {
        $qb = $this->createQueryBuilder('e');

        $qb
            ->leftJoin('e.patient', 'p')
            ->andWhere('p.id = :patientId')
            ->setParameter('patientId', $patientId)

            ->select('COUNT(e.fieldId) AS erreurs, MAX(e.dateCreation) AS HIDDEN max_date')
            // ->andWhere('e.etat = :etat')
            // ->setParameter('etat', 'error')
            ->groupBy('e.fieldId')
            
            // ->getSingleScalarResult()
            // ->getScalarResult()
            ;

        return $qb->getQuery()->getScalarResult();
    }

    public function getCountAll($patientId)
    {
        return $this->createQueryBuilder('e')
                    ->leftJoin('e.patient', 'p')
                    ->andWhere('p.id = :patientId')
                    ->setParameters(['patientId' => $patientId])
                    ->select('COUNT(e)')
                    ->getQuery()
                    ->getSingleScalarResult();
    }
    
    public function findHistory($sort, $searchPhrase, $patientId)
    {
        $qb = $this->createQueryBuilder('e')
        ->leftJoin('e.patient', 'p')
        ->andWhere('p.id = :patientId')
        ->setParameters(['patientId' => $patientId]);

        if ($searchPhrase != "") {
            $qb->andWhere('
                    e.utilisateur LIKE :search
                    OR e.message LIKE :search
                    OR e.dateCreation LIKE :search
                ')
                ->setParameter('search', '%' . $searchPhrase . '%');
        }
        if ($sort) {
            foreach ($sort as $key => $value) {
                $qb->orderBy('e.' . $key, $value);
            }
        } else {
            $qb->orderBy('e.dateCreation', 'DESC');
        }
        return $qb;
    }

    public function getLastErreur($patientId)
    {
        $qb = $this->createQueryBuilder('e')
            ->leftJoin('e.patient', 'p')
            ->andWhere('p.id = :patientId')
            ->setParameters(['patientId' => $patientId])
            ->groupBy('e.id', 'e.fieldId')
            ->orderBy('e.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
        return $qb;
    }

    public function getCount($patientId, $fieldId)
    {
        return $this->createQueryBuilder('e')
                    ->andWhere('e.fieldId = :fieldId')
                    ->leftJoin('e.patient', 'p')
                    ->andWhere('p.id = :patientId')
                    ->setParameters(['patientId' => $patientId, 'fieldId' => $fieldId])
                    ->select('COUNT(e)')
                    ->getQuery()
                    ->getSingleScalarResult();
    }

    public function findByFilter($sort, $searchPhrase, $patientId, $fieldId)
    {
        $qb = $this->createQueryBuilder('e')
        ->andWhere('e.fieldId = :fieldId')
        ->leftJoin('e.patient', 'p')
        ->andWhere('p.id = :patientId')
        ->setParameters(['patientId' => $patientId, 'fieldId' => $fieldId]);

        if ($searchPhrase != "") {
            $qb->andWhere('
                    e.utilisateur LIKE :search
                    OR e.message LIKE :search
                    OR e.dateCreation LIKE :search
                ')
                ->setParameter('search', '%' . $searchPhrase . '%');
        }
        if ($sort) {
            foreach ($sort as $key => $value) {
                $qb->orderBy('e.' . $key, $value);
            }
        } else {
            $qb->orderBy('e.dateCreation', 'DESC');
        }
        return $qb;
    }

    // /**
    //  * @return Erreur[] Returns an array of Erreur objects
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
    public function findOneBySomeField($value): ?Erreur
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
