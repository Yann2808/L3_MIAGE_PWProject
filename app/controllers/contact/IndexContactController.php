<?php
class IndexContactController {
    private $contactDAO;
 
    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }
 
    public function index() {
        // Récupérer la liste de tous les contacts depuis le modÃ¨le
        $contacts = $this->contactDAO->getAll();
 
        // Inclure la vue pour afficher la liste des contacts
        include('../../views/contact/index_contact.php');
    }
}
 
require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Contact.php");
require_once("../../models/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new IndexContactController($contactDAO);
$controller->index();
 
?>