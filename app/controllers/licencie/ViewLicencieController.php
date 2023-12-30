<?php
class ViewLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function viewLicencie($id) {
        // Récupérer le licencié à afficher en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);

        // Inclure la vue pour afficher les détails du Licencié
        include('../../views/licencie/view_licencie.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Licencie.php");
require_once("../../models/dao/LicencieDAO.php");

// Récupérer l'ID à partir de la variable $id
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}

$licencieDAO=new LicencieDAO(new Connexion());
$controller=new ViewLicencieController($licencieDAO);
$controller->viewLicencie($id);

?>

