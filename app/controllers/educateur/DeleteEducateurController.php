<?php
    class DeleteEducateurController
    {
        private $educateurDAO;
        public function __construct(EducateurDAO $educateurDAO) {
            $this->educateurDAO =  $educateurDAO;;
        }

        public function deleteEducateur($eudcateurId) {
            // Récupérer le contact à supprimer en utilisant son ID
            $educateur = $this->educateurDAO->getById($eudcateurId);

            if (!$educateur) {
                // L'educateur n'a pas été trouvé !
                echo "L'educateur  n'a pas été trouvé.";
                return;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($this->educateurDAO->deleteById($eudcateurId)) {
                    header('Location: ../educateur/IndexEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs de suppression du contact
                    echo "Erreur lors de la suppression";
                }
            }
        }
    }
    require_once("../../config/config.php");
    require_once("../../config/Connexion.php");
    require_once("../../models/Educateur.php");
    require_once("../../models/Licencie.php");
    require_once("../../models/dao/educateurDAO.php");
    require_once("../../models/dao/licencieDAO.php");
$contactDAO = new EducateurDAO(new Connexion());
$controller = new DeleteEducateurController($contactDAO);
$controller->deleteEducateur($_GET['id']);