<?php
class EditEducateurController {
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

   

    public function editEducateur($id) {
        try {
            // Récupérer le contact à modifier en utilisant son ID
           // print_r($id);
            $educateur = $this->educateurDAO->getById($id);

            if (!$educateur) {
                echo "L'educateur n'a pas été trouvé.";
                return;
            }
            $licencie = $this->licencieDAO->getAll();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $licencie_id = $_POST['licencie_id'];
                $email = $_POST['email'];
                $isAdmin = $_POST['isAdmin'];

                // Valider les données du formulaire (ajoutez des validations si nécessaire)

                // Mettre à jour les détails du contact
                $educateur->setEducateurByLicencieId($licencie_id);
                $educateur->setEmail($email);
                // $educateur->setMotDePasse($hmot_de_passe);
                $educateur->setAdministrateur($isAdmin  == 'oui' ? 1 : 0);
                 // Récupérer les objets Contact et Categorie
            $licencie = $this->licencieDAO->getById($licencie_id);
                if ($this->educateurDAO->update($educateur)) {
                    // Rediriger vers la page de détails après la modification
                    echo "educateur modifié";
                    //var_dump($educateur);
                    header('Location: ../educateur/IndexEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs de mise à jour
                    echo "Erreur lors de la modification";
                    header('Location: ../educateur/IndexEducateurController.php');
                }
            }
        } catch (Exception $e) {
            echo "Une erreur est survenue: " . $e->getMessage();
        }
         // Inclure la vue pour afficher le formulaire de modification du licencié avec les menus déroulants
         include('../../Views/educateur/edit_educateur.php');
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
$controller = new EditEducateurController($educateurDAO, $licencieDAO);
$controller->editEducateur($_GET['id']);
?>