<?php
class ViewCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function viewCategorie($id) {
        // Récupérer le contact à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        // Inclure la vue pour afficher les détails du contact
        include('../../views/categorie/view_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../models/Categorie.php");
require_once("../../models/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new ViewCategorieController($categorieDAO);
$controller->viewCategorie($_GET['id']);
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}

?>

