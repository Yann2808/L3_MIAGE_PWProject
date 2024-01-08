<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\Categorie;
use App\Entity\Licencie;
use App\Entity\Contact;

use Doctrine\ORM\EntityManagerInterface;

class ViewController extends AbstractController
{
    
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/categories", name="liste_categories")
     */
    public function listByCategory(EntityManagerInterface $entityManager): Response
    {
        // Utilise directement $entityManager pour accéder à l'Entity Manager
        $categories = $entityManager->getRepository(Categorie::class)->findAll();

        return $this->render('categorie.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/categorie/{categorieId}/licencies", name="lister_licencies_par_categorie")
     */
    public function listLicencieByCategory(int $categorieId, EntityManagerInterface $entityManager): Response
    {
        $categorie = $entityManager->getRepository(Categorie::class)->find($categorieId);
        $licencies = $entityManager->getRepository(Licencie::class)->findLicencieByCategory($categorieId);
      
        if (!$categorie) {
            throw $this->createNotFoundException('La catégorie n\'existe pas.');
        }
        

        return $this->render('listLicencieByCat.html.twig', [
            'categorie' => $categorie,
            'licencies' => $licencies,
        ]);
    }

    /**
     * @Route("/categorie/{categorieId}/contacts", name="lister_contacts_par_categorie")
     */
    public function listContactByCategory(int $categorieId): Response
    {
                // Récupère la catégorie spécifique
                $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
                $contacts= $this->entityManager->getRepository(Contact::class)->getContactByCategorie($categorieId);
                // Vérifie si la catégorie existe
                if (!$categorie) {
                    throw $this->createNotFoundException('La catégorie n\'existe pas.');
                }
        
                // Passe les données à la vue
                return $this->render('listContactByCategorie.html.twig', [
                    'categorie' => $categorie,
                    'contacts' => $contacts,
                ]);
    }

    // ...
}
