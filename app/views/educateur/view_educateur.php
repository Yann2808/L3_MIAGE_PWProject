<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Licencié</title>
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

    <h1>Détails de l'éducateur</h1>
    <a href="../../controllers/educateur/IndexEducateurController.php">Retour à la liste des éducateurs</a>
    <hr>

    <?php if ($educateur): ?>
        <p><strong>Numéro de Licencie :</strong> <?php echo $educateur->getEducateurByLicencieId(); ?></p>
        <p><strong>Email :</strong> <?php echo $educateur->getEmail() ?></p>
        <p><strong>Mot de passe :</strong> <?php echo $educateur->getMotDePasse() ?></p>
        <p><strong>Administrateur :</strong> <?php echo $educateur->isAdmin(); ?></p>
    <?php else: ?>
        <p>L'éducateur  n'a pas été trouvé.</p>
    <?php endif; ?>
</body>
</html>