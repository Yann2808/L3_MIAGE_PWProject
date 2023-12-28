<?php
class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('../../views/categorie/create_categorie.php'); 
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];
            
            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelleCategorie = new Categorie(0,$nom, $code);

            // Appeler la méthode du modèle (CategorieDAO) pour ajouter le contact
            if ($this->categorieDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
               echo"categorie ajouté";
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/categorie/create_categorie.php');
    }
}


require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Categorie.php");
require_once("../../models/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new AddCategorieController($categorieDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
$controller->addCategorie();
}


?>

