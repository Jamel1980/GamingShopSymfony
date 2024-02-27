<?php

namespace App\Repository;

use App\Entity\JeuxPromotions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JeuxPromotions>
 *
 * @method JeuxPromotions|null find($id, $lockMode = null, $lockVersion = null)
 * @method JeuxPromotions|null findOneBy(array $criteria, array $orderBy = null)
 * @method JeuxPromotions[]    findAll()
 * @method JeuxPromotions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuxPromotionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JeuxPromotions::class);
    }

//    /**
//     * @return JeuxPromotions[] Returns an array of JeuxPromotions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JeuxPromotions
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
