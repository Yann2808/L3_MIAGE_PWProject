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
    public function getEduById($id)
    {
        return $this->createQueryBuilder('m')
            ->leftJoin('m.expediteur', 's')
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function send(MailEducateur $mailEducateur): void
    {
        try {
            $this->_em->persist($mailEducateur);
            $this->_em->flush();
        } catch (\Exception $e) {
            // Handle the exception
            echo "Erreur lors de l'envoie du message: " . $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        $item = $this->find($id);
        if ($item) {
            $this->_em->remove($item);
            $this->_em->flush();
        }
    }

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

