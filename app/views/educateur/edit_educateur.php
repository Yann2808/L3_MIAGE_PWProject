<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Educateur</title>
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
    <h1>Modifier un educateur</h1>
    <a href="../../controllers/educateur/IndexEducateurController.php">Retour à la liste des educateurs</a>
 
 
    <?php if ($educateur): ?>
        <form action="EditEducateurController.php?id=<?php echo $educateur->getId(); ?>" method="post">
            <label for="licencie_id">Numéro du Licencie :</label>
            <input type="text" id="licencie_id" name="licencie_id" value="<?php echo $educateur->getEducateurByLicencieId(); ?>" readonly><br>
            <label for="email">Email  :</label>
            <input type="text" id="email" name="email" value="<?php echo $educateur->getEmail(); ?>" required><br>

            <label for="isAdmin">Administrateur :</label>
            <select id="isAdmin" name="isAdmin" required>
                <option value="1" <?php if ($educateur->isAdmin() == 1) { echo 'selected'; } ?>>Oui</option>
                <option value="0" <?php if ($educateur->isAdmin() == 0) { echo 'selected'; } ?>>Non</option>
            </select><br><br>
            <p>voulez-vous modifier les informations de l'éducateur?</p>
            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>L'educateur n'a pas été trouvé.</p>
    <?php endif; ?>
 
</body>
</html>