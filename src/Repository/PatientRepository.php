<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patient[]    findAll()
 * @method Patient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    public function getCount()
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findByFilter($sort, $searchPhrase, $protocoles)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->leftJoin('p.general', 'g');

        if ($searchPhrase != "") {
            $qb 
                ->andWhere('
                    g.civilite LIKE :search
                    OR g.nom LIKE :search
                    OR g.prenom LIKE :search
                    OR g.dateNaissance LIKE :search
                ')
                ->setParameter('search', '%' . $searchPhrase . '%');
        }

        if ($protocoles) {
            $qb
                ->innerJoin('p.visites', 'v')
                ->andWhere('v.protocoleNom IN(:protocoleNom)')
                ->setParameter('protocoleNom', $protocoles);
        }

        if ($sort) {
            foreach ($sort as $key => $value) {
                if ($key == 'civilite')
                    $qb->orderBy('g.civilite', $value);
                else if ($key == 'nom')
                    $qb->orderBy('g.nom', $value);
                else if ($key == 'prenom')
                    $qb->orderBy('g.prenom', $value);
                else if ($key == 'dateNaissance')
                    $qb->orderBy('g.dateNaissance', $value);
                else
                    $qb->orderBy('g.' . $key, $value);
            }
        } else {
            $qb->orderBy('g.nom', 'DESC');
        }
        return $qb;
    }

    // /**
    //  * @return Patient[] Returns an array of Patient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
