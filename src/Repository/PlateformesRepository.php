<?php

namespace App\Repository;

use App\Entity\Plateformes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Plateformes>
 *
 * @method Plateformes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plateformes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plateformes[]    findAll()
 * @method Plateformes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlateformesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plateformes::class);
    }

//    /**
//     * @return Plateformes[] Returns an array of Plateformes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Plateformes
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
