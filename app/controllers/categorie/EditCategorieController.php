<?php
class EditcategorieController {
    private $categorieDAO;
    public $id;

    public function __construct(categorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function update($id) {
        // Récupérer le categorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->findById($id);

        if (!$categorie) {
            // La categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];


            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du categorie
            $categorie->setNom($nom);
            $categorie->setCode($code);
            

            // Appeler la méthode du modèle (categorieDAO) pour mettre à jour le categorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails du categorie après la modification
                echo"categorie modifié";
                header('Location: ../HomeController.php');
                exit();
                
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification du categorie.";
                header('Location: ../HomeController.php');
                exit();
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du categorie
        include('../../views/categorie/edit_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Categorie.php");
require_once("../../models/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new EditCategorieController($categorieDAO);
$controller->update($_GET['id']);
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}
?>

