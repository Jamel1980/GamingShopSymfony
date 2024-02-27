<?php

namespace App\Repository;

use App\Entity\JeuxCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JeuxCategories>
 *
 * @method JeuxCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method JeuxCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method JeuxCategories[]    findAll()
 * @method JeuxCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuxCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JeuxCategories::class);
    }

//    /**
//     * @return JeuxCategories[] Returns an array of JeuxCategories objects
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

//    public function findOneBySomeField($value): ?JeuxCategories
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
