<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Catégories</title>
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
        <a href="../../controllers/licencie/IndexLicencieController.php">Licenciés</a>
    </li>

    <li>
        <a href="">Educateurs</a>
    </li>
</ul>
    <hr>

    <h1>Liste des Catégories</h1>
    <a href="../categorie/AddCategorieController.php">Ajouter une catégorie</a><br>
    <a href="../../views/logout.php">Deconnexion</a>

    <?php if ($categories) : ?>
        <table border="3">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom de la catégorie</th>
                    <th>Code raccourci</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo $category->getId(); ?></td>
                        <td><?php echo $category->getNom(); ?></td>
                        <td><?php echo $category->getCode(); ?></td>
                        <td>
                            <a href="../categorie/ViewCategorieController.php?id=<?php echo $category->getId(); ?>"><button type="button" class="btn btn-primary">Voir</button></a>
                            <a href="../categorie/EditCategorieController.php?id=<?php echo $category->getId(); ?>"><button type="button" class="btn btn-success">Modifier</button></a>
                            <a href="../categorie/DeleteCategorieController.php?id=<?php echo $category->getId(); ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune catégorie trouvée.</p>
    <?php endif; ?>
</body>
</html>

