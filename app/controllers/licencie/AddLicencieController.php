<?php

// Inclure la classe CategorieDAO
require_once '../../models/dao/CategorieDAO.php';
// Inclure la classe Categorie
require_once '../../models/Categorie.php';
class AddLicencieController {
    private $licencieDAO;

    public function __construct(licencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
        $contactDAO = new ContactDAO(new Connexion());
        $contacts = $contactDAO->getAll();

        $categorieDAO = new CategorieDAO(new Connexion());
        $categories = $categorieDAO->getAll();
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/licencie/create_licencie.php'); 
    }
    
    // public function addLicencie() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Récupérer les données du formulaire
    //         $numeroLicence = $_POST['numeroLicence'];
    //         $nom = $_POST['nom'];
    //         $prenom = $_POST['prenom'];
    //         $contact = $_POST['contact'];

    //         // Valider les données du formulaire (ajoutez des validations si nécessaire)

    //         // Récupérer l'objet Contact correspondant à partir de l'ID
    //         $contactDAO = new ContactDAO(new Connexion());
    //         $contact = $contactDAO->getById($contact);

    //         if (!$contact) {
    //             // Gérer le cas où le contact n'est pas trouvé
    //             echo "Erreur : Le contact n'a pas été trouvé.";
    //             return;
    //         }

    //         // Créer un nouvel objet Licencie avec les données du formulaire
    //         $nouveauLicencie = new Licencie($numeroLicence, $nom, $prenom, $contact);

    //         // Appeler la méthode du modèle (LicencieDAO) pour ajouter le contact
    //         if ($this->licencieDAO->create($nouveauLicencie)) {
    //             // Rediriger vers la page d'accueil après l'ajout
    //            echo"Licencié ajouté";
    //            header('Location: ../licencie/IndexLicencieController.php');
    //             exit();
    //         } else {
    //             // Gérer les erreurs d'ajout de contact
    //             echo "Erreur lors de l'ajout du licencié.";
    //             header('Location: ../licencie/IndexLicencieController.php');
    //             exit();
    //         }
    //     }

    //     // Inclure la vue pour afficher le formulaire d'ajout de contact
    //     include('../../views/licencie/create_licencie.php');
    // }

    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numeroLicence = $_POST['numeroLicence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $contact = $_POST['contact'];
            $categorie = $_POST['categorie'];
    
            // Valider les données du formulaire (ajoutez des validations si nécessaire)
    
            // Récupérer l'objet Contact correspondant à partir de l'ID
            $contactDAO = new ContactDAO(new Connexion());
            $contact = $contactDAO->getById($contact);

            // Récupérer l'objet Catégorie correspondant à partir de l'ID
            $categorieDAO = new CategorieDAO(new Connexion());
            $categorie = $categorieDAO->getById($categorie);
    
            if (!$contact) {
                // Gérer le cas où le contact n'est pas trouvé
                echo "Erreur : Le contact n'a pas été trouvé.";
                return;
            }
    
            // Vérifier si le contact est défini avant de créer le nouvel objet Licencie
            if ($contact) {
                // Créer un nouvel objet Licencie avec les données du formulaire
                $nouveauLicencie = new Licencie(0, $numeroLicence, $nom, $prenom, $contact, $categorie);
    
                // Appeler la méthode du modèle (LicencieDAO) pour ajouter le contact
                if ($this->licencieDAO->create($nouveauLicencie)) {
                    // Rediriger vers la page d'accueil après l'ajout
                    echo "Licencié ajouté";
                    header('Location: ../licencie/IndexLicencieController.php');
                    exit();
                } else {
                    // Gérer les erreurs d'ajout de contact
                    echo "Erreur lors de l'ajout du licencié.";
                    header('Location: ../licencie/IndexLicencieController.php');
                    exit();
                }
            }
        }
    
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/licencie/create_licencie.php');
    }
    
}


require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Licencie.php");
require_once("../../models/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new AddLicencieController($licencieDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
$controller->addLicencie();
}


?>

