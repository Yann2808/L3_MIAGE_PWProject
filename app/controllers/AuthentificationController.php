<?php

class AuthentificationController
{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO)
    {
        $this->educateurDAO = $educateurDAO;
    }
    public function login()
    {
        session_start();
        // Si l'utilisateur est déjà connecté, redirigez-le vers la page d'accueil des
        if (isset($_SESSION['email'])) {
            header('Location:../views/home.php');
            exit();
        }

        // Gérer les erreurs de connexion

        // Inclure la vue pour afficher le formulaire de connexion
        include('../views/login.php');
    }

    public function processLogin()
    {
        session_start();
        if (isset($_SESSION['email'])) {
            header('Location: educateur/IndexEducateurController.php');
            exit();
        }

        // Gérer les données du formulaire de connexion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $motDePasse = $_POST['mot_de_passe'];
            try {
                $educateur = $this->educateurDAO->getByEmail($email);
                if ($educateur && password_verify($motDePasse, $educateur->getMotDePasse()) && $educateur->isAdmin()) {
                    // Authentification réussie, enregistrez les informations de l'éducateur dans la session
                    $_SESSION['id'] = $educateur->getId();
                    $_SESSION['email'] = $educateur->getEmail();

                    // Rediriger vers la page d'accueil des éducateurs
                    echo"auth reussi";
                  header('Location: ../views/home.php');
                   // var_dump($educateur);
                    exit();
                } else {
                    // Authentification échouée ou non-administrateur, rediriger vers le formulaire de connexion avec un message d'erreur
                    echo"erreur";

                   // header('Location: ../views/login.php?error=1');
                    var_dump($educateur);

                
                    
                    exit();
                }
            } catch (Exception $e) {
                // Loguer ou afficher l'erreur
                echo $e->getMessage();
                // Gérer l'erreur de manière appropriée, par exemple, rediriger avec un message d'erreur
                header('Location: ../views/login.php?error=1');

                exit();
            }
        }
    }

    public function logout()
    {
        session_start();
        // Vérifier l'authentification avant la déconnexion
        if (!isset($_SESSION['email'])) {
            header('Location:../views/login.php');
            exit();
        }

        // Déconnexion : détruire la session et rediriger vers la page de connexion
        session_destroy();
        header('Location:../views/login.php');
        exit();
    }
}

require_once("../config/config.php");
require_once("../config/Connexion.php");
require_once("../models/Educateur.php");
require_once("../models/Licencie.php");
require_once("../models/dao/EducateurDAO.php");
require_once("../models/dao/licencieDAO.php");


$educateurDAO = new EducateurDAO(new Connexion());
$controller = new AuthentificationController($educateurDAO);

// Gérer les actions du formulaire
if (!isset($_POST['action'])) {
    //$controller->index();
}elseif ($_POST['action'] === 'logout') {
   $controller->logout();
} 
else {
    $controller->processLogin();
}
