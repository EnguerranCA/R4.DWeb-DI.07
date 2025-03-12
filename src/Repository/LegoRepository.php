<?php

namespace App\Repository;

use App\Entity\Lego;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lego>
 */
class LegoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lego::class);
    }

    //    /**
    //     * @return Lego[] Returns an array of Lego objects
    //     */
        public function findByCollection($categoryId): array
        {
            return $this->createQueryBuilder('l')
            ->andWhere('l.category = :category')
            ->setParameter('category', $categoryId)
            ->orderBy('l.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
        }

    //    public function findOneBySomeField($value): ?Lego
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
