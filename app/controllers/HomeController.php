<?php
class HomeController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO ) {
        $this->contactDAO = $contactDAO;
        
    }
   
    public function index() {
        // Récupérer la liste de tous les contacts depuis le modÃ¨le
        $contacts = $this->contactDAO->getAll();
       

        // Inclure la vue pour afficher la liste des contacts
        include('../views/home.php');
    }
}

require_once("../config/config.php");
require_once("../config/connexion.php");
require_once("../models/Contact.php");
require_once("../models/Categorie.php");
require_once("../models/dao/ContactDAO.php");
require_once("../models/dao/CategorieDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new HomeController($contactDAO);

$controller->index();

?>
