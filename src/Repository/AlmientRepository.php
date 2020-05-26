<?php

namespace App\Repository;

use App\Entity\Almient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Almient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Almient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Almient[]    findAll()
 * @method Almient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlmientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Almient::class);
    }

    // /**
    //  * @return Almient[] Returns an array of Almient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Almient
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
