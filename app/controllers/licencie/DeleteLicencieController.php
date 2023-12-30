<?php
class DeleteLicencieController {
    private $licencieDAO;
    

    public function __construct(licencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
        
    }

    public function delete($id) {
        // Récupérer le contact à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);
        
        if (!$licencie) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->licencieDAO->delete($id) ) {
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

$licencieDAO=new LicencieDAO(new Connexion());

$controller=new DeleteLicencieController($licencieDAO);
$id = isset($_GET['id']) ? $_GET['id'] : null;
$controller->delete($id);

if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}

?>

