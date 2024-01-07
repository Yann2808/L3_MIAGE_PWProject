<?php
session_start();
class AddEducateurController
{
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }
    private function checkAuthentication() {
        // Vérifier si l'utilisateur est authentifié en tant qu'administrateur
        if (!isset($_SESSION['email'])) {
            // Rediriger vers la page de connexion si non authentifié
            header('Location: ../../views/login.php');
            exit();
        }
    }
    public function index(){
        $this->checkAuthentication();
        $licencies = $this->licencieDAO->getAll();
        include('../../views/educateur/create_educateur.php');
    }

    public function add_educator(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $licencie_id = $_POST['licencie_id'];
                $email = $_POST['email'];
                $mot_de_passe = $_POST['mot_de_passe'];
                $isAdmin = $_POST['isAdmin'];

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
                $educateur = new Educateur("", $licencie_id, $email, $hmot_de_passe, $isAdmin  == "oui" ? 1 : 0);
                if ($this->educateurDAO->create($educateur)) {
                    // Rediriger vers la page d'accueil après l'ajout
                    header('Location:IndexEducateurController.php');
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
require_once("../../config/Connexion.php");
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