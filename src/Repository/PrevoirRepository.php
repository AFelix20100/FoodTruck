<?php

namespace App\Repository;

use App\Entity\Prevoir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Prevoir>
 *
 * @method Prevoir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prevoir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prevoir[]    findAll()
 * @method Prevoir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrevoirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prevoir::class);
    }

    //    /**
    //     * @return Prevoir[] Returns an array of Prevoir objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Prevoir
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
