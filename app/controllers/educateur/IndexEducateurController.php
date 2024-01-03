<?php
    class IndexEducateurController
    {
        private $educateurDAO;

        public function __construct(EducateurDAO $educateurDAO) {
            $this->educateurDAO = $educateurDAO;
        }

        public function index() {
            $educateurs = $this->educateurDAO->getAll();
            include('../../views/educateur/index_educateur.php');
        }
    }

require_once("../../config/config.php");
require_once("../../config/Connexion.php");
require_once("../../models/Educateur.php");
require_once("../../models/dao/educateurDAO.php");
$educateurDAO = new EducateurDAO(new Connexion());
$controller = new IndexEducateurController($educateurDAO);
$controller->index();