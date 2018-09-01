<?php

namespace App\Repository;

use App\Entity\CampaignStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CampaignStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampaignStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampaignStatus[]    findAll()
 * @method CampaignStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaignStatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CampaignStatus::class);
    }

//    /**
//     * @return CampaignStatus[] Returns an array of CampaignStatus objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CampaignStatus
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
