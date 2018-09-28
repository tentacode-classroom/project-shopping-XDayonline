<?php

namespace App\Repository;

use App\Entity\Chicken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chicken|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chicken|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chicken[]    findAll()
 * @method Chicken[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChickenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chicken::class);
    }

//    /**
//     * @return Chicken[] Returns an array of Chicken objects
//     */

    public function findAllProducts()
    {
        return $this->createQueryBuilder('c')
//            ->andWhere('c.name = :val')
//            ->setParameter('val', 'Original')
            ->orderBy('c.price', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Chicken
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
