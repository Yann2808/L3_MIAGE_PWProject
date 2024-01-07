<?php

namespace App\Repository;

use App\Entity\MailEducateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MailEducateur>
 *
 * @method MailEducateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailEducateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailEducateur[]    findAll()
 * @method MailEducateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailEducateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailEducateur::class);
    }

//    /**
//     * @return MailEducateur[] Returns an array of MailEducateur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MailEducateur
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
