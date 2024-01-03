<?php
class DeleteLicencieController {
    private $licencieDAO;
 
    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }
 
    public function delete($licencieId) {
        // Récupérer le licencié à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getById($licencieId);
 
        if (!$licencie) {
            // Le licencié n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencié n'a pas été trouvé.";
            return;
        }
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le licencié en appelant la méthode du modèle (LicencieDAO)
            if ($this->licencieDAO->delete($licencieId)) {
                // Rediriger vers la page d'accueil après la suppression
                echo"contact supprimé";
                header('Location: ../contact/IndexLicencieController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression du contact.";
                header('Location: ../contact/IndexLicencieController.php');
                exit();
            }
            
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('../../views/licencie/delete_licencie.php');
    }
}
 
require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Licencie.php");
require_once("../../models/dao/LicencieDAO.php");
 
$licencieDAO = new LicencieDAO(new Connexion());
$controller = new DeleteLicencieController($licencieDAO);
$controller->delete($_GET['id']);
?>
 