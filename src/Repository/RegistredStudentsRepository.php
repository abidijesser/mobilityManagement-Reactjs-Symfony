<?php

namespace App\Repository;

use App\Entity\RegistredStudents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RegistredStudents>
 * @method RegistredStudents|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegistredStudents|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegistredStudents[]    findAll()
 * @method RegistredStudents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistredStudentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegistredStudents::class);
    }

//    /**
//     * @return RegistredStudents[] Returns an array of RegistredStudents objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RegistredStudents
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
