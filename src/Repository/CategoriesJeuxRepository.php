<?php

namespace App\Repository;

use App\Entity\CategoriesJeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoriesJeux>
 *
 * @method CategoriesJeux|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesJeux|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesJeux[]    findAll()
 * @method CategoriesJeux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesJeuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesJeux::class);
    }

//    /**
//     * @return CategoriesJeux[] Returns an array of CategoriesJeux objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategoriesJeux
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
