<?php

namespace App\Repository;

use App\Entity\SmallCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SmallCategories>
 *
 * @method SmallCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method SmallCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method SmallCategories[]    findAll()
 * @method SmallCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmallCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SmallCategories::class);
    }

//    /**
//     * @return SmallCategories[] Returns an array of SmallCategories objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SmallCategories
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
