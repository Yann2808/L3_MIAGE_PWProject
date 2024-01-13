<?php
class DeleteContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function delete($id) {
        // Récupérer le contact à supprimer en utilisant son ID
        $contact = $this->contactDAO->getById($id);

        if (!$contact) {
            // Le contact n'a pas été trouvé, 
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
                if ($this->contactDAO->delete($id)) {
                    // Rediriger vers la page d'accueil après la suppression
                    echo "Contact supprimé avec succès.";
                    header('Location: ../contact/IndexContactController.php');
                    exit();
                } else {
                    // Gérer les erreurs de suppression du contact
                    echo "Erreur lors de la suppression du contact.";
                }
            } catch (PDOException $e) {
                // Intercepter l'exception PDOException pour les contraintes d'intégrité violées
                $errorMessage = "Impossible de supprimer le contact.";
               
                echo $errorMessage;
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('../../views/contact/delete_contact.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Contact.php");
require_once("../../models/dao/ContactDAO.php");
$contactDAO = new ContactDAO(new Connexion());
$controller = new DeleteContactController($contactDAO);
$id = $_GET['id'];
$controller->delete($id);
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}
?>