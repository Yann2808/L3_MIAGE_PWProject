<?php
// ViewContactController.php
require_once(__DIR__ . '/../../models/Contact.php'); // Inclure votre modèle Contact
require_once(__DIR__ . '/../../models/dao/ContactDAO.php'); // Inclure votre modèle DAO de Contact
require_once(__DIR__ . '/../../views/contact/view_contact.php'); // Inclure votre vue

class ViewContactController {
    public function index($contactId) {
        // Vous devrez récupérer le contact en fonction de l'ID
        // Utilisez votre logique pour récupérer les données du contact depuis la base de données
        $contact = ContactDAO::getById($contactId);

        // Passer les données du contact à la vue
        include(__DIR__ . '/../../views/contact/view_contact.php');
    }
}

// Utilisation du contrôleur
$viewContactController = new ViewContactController();
$viewContactController->index($_GET['id']); // Vous devrez peut-être ajuster selon la manière dont les données sont passées dans votre application
?>
