<?php
    class EditLicencieController {
        public $id;
        private $licencieDAO;
        private $contactDAO;
        private $categorieDAO;
    
        public function __construct(licencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {
            $this->licencieDAO = $licencieDAO;
            $this->contactDAO = $contactDAO;
            $this->categorieDAO = $categorieDAO;
        }

        public function index() {
            // Récupérer l'ID de la requête GET
            $id = isset($_GET['id']) ? $_GET['id'] : null;

            // Vérifier si l'ID est défini
            if ($id === null) {
                echo "L'ID n'est pas défini dans l'URL.";
                return;
            }

            $licencie =  $this->licencieDAO->getById($id);
            $contacts =$this->contactDAO->getAll();
            $categories =$this->categorieDAO->getAll();

            // Inclure la vue pour afficher le formulaire d'ajout de contact
            include('../../views/licencie/edit_licencie.php');
        }

        public function updateLicencie($id) {
            // Récupérer le contact à modifier en utilisant son ID
            $licencie = $this->licencieDAO->getById($id);

            if (!$licencie) {
                // Le licencié n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
                echo "Le licencié n'a pas été trouvé.";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $numero_licencie = $_POST['numero_licencie'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $contactId = $_POST['contact_id'];
                $categorieId=$_POST['categorie_id'];
    
                // Valider les données du formulaire (ajoutez des validations si nécessaire)
    
                // Récupérer l'objet Contact correspondant à partir de l'ID
                $contact =$this->categorieDAO->getById($contactId);

                // Récupérer l'objet categorie correspondant à partir de l'ID
                $categorie =$this->categorieDAO->getById($categorieId);

                if (!$contact) {
                    // Gérer le cas où le contact n'est pas trouvé
                    echo "Erreur : Le licencié n'a pas été trouvé.";
                    return;
                    header('Location: ../licencie/IndexLicencieController.php');
                    exit();
                }
    
                // Vérifier si le contact est défini avant de créer le nouvel objet Licencie
                if ($contact) {
                    // Créer un nouvel objet Licencie avec les données du formulaire
                    $nouveauLicencie = new Licencie(0, $numero_licencie, $nom, $prenom, $contact,$categorie);
    
                    // Appeler la méthode du modèle (LicencieDAO) pour ajouter le contact
                    if ($this->licencieDAO->update($nouveauLicencie)) {
                        // Rediriger vers la page d'accueil après l'ajout
                        echo "Licencié modifié";
                        header('Location: ../licencie/IndexLicencieController.php');
                        exit();
                    } else {
                        // Gérer les erreurs d'ajout de contact
                        echo "Erreur lors de la modification du licencié.";
                        header('Location: ../licencie/IndexLicencieController.php');
                        exit();
                    }
                }
            }
            // Récupérer la liste des contacts et des catégories
            $contacts = $this->contactDAO->getAll();
            $categories = $this->categorieDAO->getAll();

            // Inclure la vue pour afficher le formulaire de modification du licencié
            include('../../views/licencie/edit_licencie.php');
        }
    }

    require_once("../../config/config.php");
    require_once("../../config/connexion.php");
    require_once("../../models/Licencie.php");
    require_once("../../models/dao/LicencieDAO.php");

    require_once("../../models/Contact.php");
    require_once("../../models/dao/ContactDAO.php");

    require_once("../../models/Categorie.php");
    require_once("../../models/dao/CategorieDAO.php");

    $licencieDAO = new LicencieDAO(new Connexion());
    $contactDAO = new ContactDAO(new Connexion());
    $categorieDAO = new CategorieDAO(new Connexion());
    $controller = new EditLicencieController($licencieDAO,$contactDAO,$categorieDAO);
    if(!isset($_POST['action'])){
        $controller->index();
    } else {
        $controller->updateLicencie($id);
    }
?>

