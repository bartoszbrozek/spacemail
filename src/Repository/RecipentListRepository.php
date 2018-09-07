<?php

namespace App\Repository;

use App\Entity\RecipentList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RecipentList|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipentList|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipentList[]    findAll()
 * @method RecipentList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipentListRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RecipentList::class);
    }

//    /**
//     * @return RecipentList[] Returns an array of RecipentList objects
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
    public function findOneBySomeField($value): ?RecipentList
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
