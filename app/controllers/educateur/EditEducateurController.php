<?php
class EditEducateurController {
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index($id){
        $licence = $this->licencieDAO->getAll();
        $educateur = $this->educateurDAO->getById($id);
        include('../../views/educateur/edit_educateur.php');
    }

    public function editEducateur($id) {
        try {
            // Récupérer le contact à modifier en utilisant son ID
            print_r($id);
            $educateur = $this->educateurDAO->getById($id);

            if (!$educateur) {
                echo "L'educateur n'a pas été trouvé.";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $licencie_id = $_POST['licencie_id'];
                $email = $_POST['email'];
                // $mot_de_passe = $_POST['mot_de_passe'];
                // $hmot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $isAdmin = $_POST['isAdmin'];

                // Valider les données du formulaire (ajoutez des validations si nécessaire)

                // Mettre à jour les détails du contact
                $educateur->setEducateurByLicencieId($licencie_id);
                $educateur->setEmail($email);
                // $educateur->setMotDePasse($hmot_de_passe);
                $educateur->setAdministrateur($isAdmin  == 'oui' ? 1 : 0);

                if ($this->educateurDAO->update($educateur)) {
                    // Rediriger vers la page de détails après la modification
                    header('Location:ListEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs de mise à jour
                    echo "Erreur lors de la modification";
                }
            }
        } catch (Exception $e) {
            echo "Une erreur est survenue: " . $e->getMessage();
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
$controller = new EditEducateurController($educateurDAO, $licencieDAO);
if(!isset($_POST['action'])){
    $controller->index($_GET["id"]);
} else{
    $id = $_POST['id'];
    $controller->editEducateur($id);
}