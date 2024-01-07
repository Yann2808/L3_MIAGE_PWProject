<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
 
    <style>
        .menu{
            display: flex;              /* Transformation en flexbox */
            padding:0;                  /* Suppression des marges internes */
            background-color: #ccc;     /* Ajout de la couleur d'arrière-plan */
            justify-content: center;
            text-align: justify center;
            text-decoration: none;
            text-transform: uppercase;
            display:flex;
 
        }
 
        .menu li {
            list-style-type: none ;       /* Suppression des puces */
        }
 
        .menu a {
            display:block;                /* Transformation en block */
            min-width: 120px;             /* Largeur minimale des liens */
 
            margin: 0.5rem;               /* Marges externes (1 valeurs = 4 directions) */
            padding: 0.4rem 0;            /* Marges internes (2 valeurs = haut/bas et gauche/droite)*/
            text-align: center;           /* Centrage du texte */  
            background-color: #1ABC9C;    /* Couleur d'arrière-plan */
            color: #fff;                  /* Couleur du texte */
            text-decoration: none;        /* Suppression du soulignement */
            border: 1px solid #fff;       /* Ajout d'une bordure */
            border-radius: 4px;           /* Arrondis des bordures */
            transition: all 1s ;          /* Ajout des effets de transition */
        }
 
        .menu a:hover {
            background-color: #fff;
            color: #aef;
            border-color: #fae;
        }
        .btn-primary {
    background-color: #aef; /* Couleur de fond */
    }
    .btn-success {
    background-color: #1ABC9C; /* Couleur de fond */
    }
    .btn-danger {
    background-color: wheat; /* Couleur de fond */
    }
    </style>
</head>
<body>
    <ul class="menu">
        <li>
            <a href="../../controllers/HomeController.php">Accueil</a>
        </li>

        <li>
            <a href="../contact/IndexContactController.php">Contacts</a>
        </li>

        <li>
            <a href="../categorie/IndexCategorieController.php">Catégories</a>
        </li>

        <li>
            <a href="../licencie/IndexLicencieController.php">Licenciés</a>
        </li>

        <li>
            <a href="../educateur/IndexEducateurController.php">Educateurs</a>
        </li>
    </ul>
    <hr>
 
    <h1>Liste des Contacts</h1>
    <a href="../contact/AddContactController.php">Ajouter un contact</a><br>
    <a href="../../views/logout.php">Deconnexion</a>
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