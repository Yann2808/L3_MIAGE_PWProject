<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 *
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }
    public function getCategorieContact(int $categoryId):array{
        return $this->createQueryBuilder('c')
        
        ->leftjoin('c.licencie_id', 'l')
        ->addSelect('l')
        ->leftjoin('l.contact_id', 'contact')
        ->addSelect('contact')
        ->where('c.id = :id')
        ->setParameter('id', $categoryId)
        ->getQuery()
        ->getOneOrNullResult();
    }
 /**
     * Récupère une catégorie avec ses licenciés
     *
     * @param int $categorieId L'ID de la catégorie
     * @return Categorie|null La catégorie avec ses licenciés ou null si non trouvée
     */
  

     /**
     * Récupère une catégorie avec ses contacts
     *
     * @param int $categorieId L'ID de la catégorie
     * @return Categories|null La catégorie avec ses contacts ou null si non trouvée
     */
    
//    /**
//     * @return Categorie[] Returns an array of Categorie objects
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

//    public function findOneBySomeField($value): ?Categorie
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
