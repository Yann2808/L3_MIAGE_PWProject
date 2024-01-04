<?php
    class ViewEducateurController
    {
        private $educateurDAO;
        private $licencieDAO;
        public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
            $this->educateurDAO = $educateurDAO;
            $this->licencieDAO = $licencieDAO;
        }

        public function viewEducateur($id) {
            // Récupérer le educateur à afficher en utilisant son ID
            $educateur = $this->educateurDAO->getById($id);
            $licencie = $this->licencieDAO->getById($educateur->getEducateurByLicencieId());

            // Inclure la vue pour afficher les détails du educateur
            include('../../views/educateur/view_educateur.php');
        }
    }

require_once("../../config/config.php");
require_once("../../config/Connexion.php");
require_once("../../models/Educateur.php");
require_once("../../models/Licencie.php");
require_once("../../models/dao/educateurDAO.php");
require_once("../../models/dao/licencieDAO.php");

    $educateurDAO = new EducateurDAO(new Connexion());
    $licencieDAO = new LicencieDAO(new Connexion());

    $id = $_GET['id'];
    $controller = new ViewEducateurController($educateurDAO, $licencieDAO);
    $controller->viewEducateur($_GET['id']);