<?php

namespace App\Repository;

use App\Entity\CompositionCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompositionCommande>
 *
 * @method CompositionCommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompositionCommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompositionCommande[]    findAll()
 * @method CompositionCommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompositionCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompositionCommande::class);
    }

//    /**
//     * @return CompositionCommande[] Returns an array of CompositionCommande objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CompositionCommande
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
