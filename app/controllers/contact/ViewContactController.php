<?php
class ViewContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($id) {
        // Récupérer le contact à afficher en utilisant son ID
        $contact = $this->contactDAO->getById($id);

        // Inclure la vue pour afficher les détails du contact
        include('../../views/contact/view_contact.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Contact.php");
require_once("../../models/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new ViewContactController($contactDAO);
$controller->viewContact($_GET['id']);
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}

?>

