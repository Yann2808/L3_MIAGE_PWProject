<?php
class EditLicencieController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;
 
    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }
 
    public function update($licencieId) {
        // Récupérer le licencié à modifier en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);
 
        if (!$licencie) {
            // Le licencié n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencié n'a pas été trouvé.";
            return;
        }
 
        // Récupérer la liste des contacts et catégories pour les menus déroulants
        $contacts = $this->contactDAO->getAll();
        $categories = $this->categorieDAO->getAll();
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numeroLicencie = $_POST['numeroLicencie'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $contactId = $_POST['contact'];
            $categorieId = $_POST['categorie'];
 
            // Valider les données du formulaire (ajoutez des validations si nécessaire)
 
            // Mettre à jour les détails du licencié
            $licencie->setNumeroLicencie($numeroLicencie);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
 
            // Récupérer les objets Contact et Categorie
            $contact = $this->contactDAO->getById($contactId);
            $categorie = $this->categorieDAO->getById($categorieId);
 
            // Définir les objets Contact et Categorie dans le licencié
            $licencie->setContact($contact);
            $licencie->setCategorie($categorie);
 
            // Appeler la méthode du modèle (LicencieDAO) pour mettre à jour le licencié
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails du licencié après la modification
                header('Location:../LicencieController.php ');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du licencié
                echo "Erreur lors de la modification du licencié.";
            }
        }
 
        // Inclure la vue pour afficher le formulaire de modification du licencié avec les menus déroulants
        include('../../Views/licencie/edit_licencie.php');
    }
}
 
require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Licencie.php");
require_once("../../models/dao/LicencieDAO.php");
require_once("../../models/Contact.php");
require_once("../../models/dao/ContactDAO.php");
require_once("../../models/Categorie.php");
require_once("../../models/dao/CategorieDAO.php");
 
$licencieDAO = new LicencieDAO(new Connexion());
$contactDAO = new ContactDAO(new Connexion());
$categorieDAO = new CategorieDAO(new Connexion());
 
$controller = new EditLicencieController($licencieDAO, $contactDAO, $categorieDAO);
$controller->update($_GET['id']);
?>
 