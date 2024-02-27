<?php

namespace App\Repository;

use App\Entity\EvenementSpeciaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EvenementSpeciaux>
 *
 * @method EvenementSpeciaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvenementSpeciaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvenementSpeciaux[]    findAll()
 * @method EvenementSpeciaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementSpeciauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvenementSpeciaux::class);
    }

//    /**
//     * @return EvenementSpeciaux[] Returns an array of EvenementSpeciaux objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EvenementSpeciaux
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
