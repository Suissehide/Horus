<?php

namespace App\Repository;

use App\Entity\Medicament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Medicament|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicament|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicament[]    findAll()
 * @method Medicament[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medicament::class);
    }

    public function getCount()
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findByFilter($sort, $searchPhrase)
    {
        $qb = $this->createQueryBuilder('m');

        if ($searchPhrase != "") {
            $qb
            ->andWhere('m.name LIKE :search')
            ->setParameter('search', '%' . $searchPhrase . '%');
        }
        if ($sort) {
            foreach ($sort as $key => $value) {
                $qb->orderBy('m.' . $key, $value);
            }
        } else {
            $qb->orderBy('m.id', 'DESC');
        }
        return $qb;
    }

    public function findByRequest($searchPhrase)
    {
        $qb = $this
            ->createQueryBuilder('m')
            ->select('m.id, m.name')
        ;
        if ($searchPhrase != "") {
            $qb
                ->andWhere('m.name LIKE :search')
                ->setParameter('search', '%' . $searchPhrase . '%');
        }
        return $qb->getQuery()->getResult();
    }
}
