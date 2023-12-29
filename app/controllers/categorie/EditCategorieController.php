<?php
class EditContactController {
    private $categorieDAO;
    public $id;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function update($id) {
        // Récupérer le contact à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $categorie->setNom($nom);
            $categorie->setCode($code);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails du contact après la modification
                echo"Catégorie modifiée avec succès";
                header('Location: ../categorie/IndexCategorieController.php');
                exit();
                
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification de la catégorie.";
                header('Location: ../categorie/IndexCategorieController.php');
                exit();
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('../../views/categorie/edit_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Categorie.php");
require_once("../../models/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new EditContactController($categorieDAO);
$controller->update($_GET['id']);
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}
?>

