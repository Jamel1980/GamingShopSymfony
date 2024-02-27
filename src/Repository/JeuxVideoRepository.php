<?php

namespace App\Repository;

use App\Entity\JeuxVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JeuxVideo>
 *
 * @method JeuxVideo|null find($id, $lockMode = null, $lockVersion = null)
 * @method JeuxVideo|null findOneBy(array $criteria, array $orderBy = null)
 * @method JeuxVideo[]    findAll()
 * @method JeuxVideo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuxVideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JeuxVideo::class);
    }

//    /**
//     * @return JeuxVideo[] Returns an array of JeuxVideo objects
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

//    public function findOneBySomeField($value): ?JeuxVideo
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
