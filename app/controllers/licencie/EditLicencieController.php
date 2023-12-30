<?php
class EditLicencieController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;
    private $licencie;

    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO)
    {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function update($id)
    {
        // Récupérer le licencié à modifier en utilisant son ID
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

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du licencié
            $licencie->setNumeroLicence($numero_licencie);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);

            // Appeler la méthode du modèle (LicencieDAO) pour mettre à jour le licencié
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails du licencié après la modification
                echo "Licencié modifié";
                header('Location: ../licencie/IndexLicencieController.php');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du licencié
                echo "Erreur lors de la modification du licencié.";
                header('Location: ../licencie/IndexLicencieController.php');
                exit();
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du licencié
        include('../../views/licencie/edit_licencie.php');
    }

    // Ajoutez d'autres méthodes si nécessaire
}



    



require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Licencie.php");
require_once("../../models/dao/LicencieDAO.php");
require_once("../../models/Contact.php");
require_once("../../models/dao/ContactDAO.php");
require_once("../../models/Categorie.php");
require_once("../../models/dao/CategorieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$contactDAO=new ContactDAO(new Connexion());
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new EditLicencieController($licencieDAO,$contactDAO,$categorieDAO);
$id = isset($_GET['id']) ? $_GET['id'] : null;
$controller->update($id);
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}

?>

