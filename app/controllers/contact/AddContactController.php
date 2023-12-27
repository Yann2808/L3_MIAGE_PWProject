<?php
class AddContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../views/contact/create_contact.php'); 
    }
    
    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouveauContact = new Contact(0,$nom, $prenom, $email, $telephone);

            // Appeler la méthode du modèle (ContactDAO) pour ajouter le contact
            if ($this->contactDAO->create($nouveauContact)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../views/contact/create_contact.php');
    }
}


require_once("../app/config/config.php");
require_once("../app/config/pdo.php");
require_once("../app/models/Contact.php");
require_once("../app/models/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new pdo());
$controller=new AddContactController($contactDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
$controller->addContact();
}


?>

