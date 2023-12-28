<?php
class EditContactController {
    private $contactDAO;
    public $id;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function update($id) {
        // Récupérer le contact à modifier en utilisant son ID
        $contact = $this->contactDAO->getId($id);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['numeroTel'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setNumeroTel($telephone);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->contactDAO->update($contact)) {
                // Rediriger vers la page de détails du contact après la modification
                echo"contact modifié";
                header('Location: ../HomeController.php');
                exit();
                
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du contact.";
                header('Location: ../HomeController.php');
                exit();
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('../../views/contact/edit_contact.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Contact.php");
require_once("../../models/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new EditContactController($contactDAO);
$controller->update($_GET['id']);
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}
?>

