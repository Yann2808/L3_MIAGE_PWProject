<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">

        <style>
        /* Vos styles pour le menu */
        .menu {
            display: flex;
            padding: 0;
            background-color: #ccc;
            justify-content: center;
            text-align: justify center;
            text-decoration: none;
            text-transform: uppercase;
            display: flex;
        }

        .menu li {
            list-style-type: none;
        }

        .menu a {
            display: block;
            min-width: 120px;
            margin: 0.5rem;
            padding: 0.4rem 0;
            text-align: center;
            background-color: #1ABC9C;
            color: #fff;
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 4px;
            transition: all 1s;
        }

        .menu a:hover {
            background-color: #fff;
            color: #aef;
            border-color: #fae;
        }

        /* Nouveaux styles pour la mise en page des détails du licencié */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Styles pour la section des détails du licencié */
        .details-section {
            max-width: 600px;
            margin: 0 auto;
        }

        .details-section p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <ul class="menu">
        <li><a href="../../controllers/HomeController.php">Accueil</a></li>
        <li><a href="../contact/IndexContactController.php">Contacts</a></li>
        <li><a href="../categorie/IndexCategorieController.php">Catégories</a></li>
        <li><a href="../licencie/IndexLicencieController.php">Licenciés</a></li>
        <li><a href="../educateur/IndexEducateurController.php">Educateurs</a></li>
    </ul>

    <h1>Détails du Contact</h1>
    <a href="../../controllers/contact/IndexContactController.php">Retour à la liste des contacts</a>
    <hr>

    <?php if ($contact): ?>
        <p><strong>Nom :</strong> <?php echo $contact->getNom(); ?></p>
        <p><strong>Prénom :</strong> <?php echo $contact->getPrenom(); ?></p>
        <p><strong>Email :</strong> <?php echo $contact->getEmail(); ?></p>
        <p><strong>Téléphone :</strong> <?php echo $contact->getNumeroTel(); ?></p>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>
</body>
</html>