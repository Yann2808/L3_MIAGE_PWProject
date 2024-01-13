<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1ABC9C;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: #ccc;
            display: flex;
            justify-content: center;
            padding: 10px;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        hr {
            width: 80%;
            margin: 20px auto;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .actions {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            padding: 8px 16px;
            margin: 0 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #aef;
            color: #333;
        }

        .btn-secondary {
            background-color: #1ABC9C;
            color: #fff;
        }

        .btn-danger {
            background-color: wheat;
            color: #333;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #1ABC9C;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Liste des Contacts</h1>
    </header>

    <nav>
        <a href="../../controllers/HomeController.php">Accueil</a>
        <a href="../contact/IndexContactController.php">Contacts</a>
        <a href="../categorie/IndexCategorieController.php">Catégories</a>
        <a href="../licencie/IndexLicencieController.php">Licenciés</a>
        <a href="../educateur/IndexEducateurController.php">Educateurs</a>
    </nav>

    <hr>
    <div class="actions">
    <a href="../contact/AddContactController.php"class="btn btn-primary">Ajouter un contact</a><br>
    <a href="../../views/logout.php"class="btn btn-secondary">Deconnexion</a>
    </div>
    <?php if ($contacts) : ?>
        <table border="3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $contact->getNom(); ?></td>
                        <td><?php echo $contact->getPrenom(); ?></td>
                        <td><?php echo $contact->getEmail(); ?></td>
                        <td><?php echo $contact->getNumeroTel(); ?></td>
                        <td>
                            <a href="../contact/ViewContactController.php?id=<?php echo $contact->getId(); ?>"><button type="button" class="btn btn-primary">Voir</button></a>
                            <a href="../contact/EditContactController.php?id=<?php echo $contact->getId(); ?>"><button type="button" class="btn btn-success">Modifier</button></a>
                            <a href="../contact/DeleteContactController.php?id=<?php echo $contact->getId(); ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun contact trouvé.</p>
    <?php endif; ?>
</body>
</html>