<?php

namespace App\Repository;

use App\Entity\TussenTabel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TussenTabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method TussenTabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method TussenTabel[]    findAll()
 * @method TussenTabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TussenTabelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TussenTabel::class);
    }

    // /**
    //  * @return TussenTabel[] Returns an array of TussenTabel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TussenTabel
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
