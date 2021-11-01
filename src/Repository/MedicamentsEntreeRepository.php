<?php

namespace App\Repository;

use App\Entity\MedicamentsEntree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MedicamentsEntree|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicamentsEntree|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicamentsEntree[]    findAll()
 * @method MedicamentsEntree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicamentsEntreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicamentsEntree::class);
    }
}
