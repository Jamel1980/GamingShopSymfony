<?php

namespace App\Repository;

use App\Entity\JeuxEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JeuxEvenement>
 *
 * @method JeuxEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method JeuxEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method JeuxEvenement[]    findAll()
 * @method JeuxEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuxEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JeuxEvenement::class);
    }

//    /**
//     * @return JeuxEvenement[] Returns an array of JeuxEvenement objects
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

//    public function findOneBySomeField($value): ?JeuxEvenement
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
