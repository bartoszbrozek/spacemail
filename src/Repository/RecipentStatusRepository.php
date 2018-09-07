<?php

namespace App\Repository;

use App\Entity\RecipentStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RecipentStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipentStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipentStatus[]    findAll()
 * @method RecipentStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipentStatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RecipentStatus::class);
    }

//    /**
//     * @return RecipentStatus[] Returns an array of RecipentStatus objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecipentStatus
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
