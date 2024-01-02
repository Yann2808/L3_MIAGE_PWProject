<?php

class AddEducateurController
{
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index(){
        $licence = $this->licencieDAO->getAll();
        include('../../views/educateur/add_educateur.php');
    }

    public function add_educator(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $numero_licence = $_POST['numero_licence'];
                $email = $_POST['email'];
                $mot_de_passe = $_POST['mot_de_passe'];
                $est_administrateur = $_POST['est_administrateur'];

                // Valider les données du formulaire
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'Email invalid';
                    return;
                }

                if($this->educateurDAO->getByEmail($email)){
                    echo 'Cet educateur existe déjà !';
                    return;
                }

                // Hasher le mot de passe
                $hmot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $educateur = new Educateur("", $numero_licence, $email, $hmot_de_passe, $est_administrateur  == "oui" ? 1 : 0);
                if ($this->educateurDAO->create($educateur)) {
                    // Rediriger vers la page d'accueil après l'ajout
                    header('Location:ListEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs d'ajout de l'educateur
                    echo "Erreur lors de l'ajout de l'educateur.";
                }
            }
        } catch (Exception $e){
            die("Erreur  : " . $e->getMessage());
        }


    }
}

require_once("../../config/config.php");
require_once("../../classes/dao/Connexion.php");
require_once("../../models/Educateur.php");
require_once("../../models/Licencie.php");
require_once("../../models/dao/educateurDAO.php");
require_once("../../models/dao/licencieDAO.php");

$educateurDAO = new EducateurDAO(new Connexion());
$licencieDAO = new LicencieDAO(new Connexion());
$controller = new AddEducateurController($educateurDAO, $licencieDAO);

if(!isset($_POST['action'])){
    $controller->index();
} else{
   $controller->add_educator();
}