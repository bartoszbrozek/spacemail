<?php

namespace App\Repository;

use App\Entity\Recipent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Recipent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipent[]    findAll()
 * @method Recipent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Recipent::class);
    }

//    /**
//     * @return Recipent[] Returns an array of Recipent objects
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
    public function findOneBySomeField($value): ?Recipent
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
