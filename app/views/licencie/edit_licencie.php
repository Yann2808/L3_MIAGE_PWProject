<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Contact</title>
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
    
    <h1>Modifier un Licencié</h1>
    <a href="../../controllers/licencie/IndexLicencieController.php">Retour à la liste des licenciés</a>
    <hr>
    
    <?php if ($licencie): ?>
        <form action="EditLicencieController.php?id=<?php echo $contact->getId(); ?>" method="post">
            <label for="numero_licencie">Numéro du Licencie :</label>
            <input type="text" id="numero_licencie" name="numero_licencie" value="<?php echo $licencie->getNumeroLicence(); ?>" required><br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $licencie->getNom(); ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input type="prenom" id="prenom" name="prenom" value="<?php echo $licencie->getPrenom(); ?>"><br>
            <select name="contact_id" required>
        <?php foreach ($contacts as $contact): ?>
            <option value="<?= $contact->getId(); ?>"><?= $contact->getEmail(); ?></option>
        <?php endforeach; ?>
    </select>
    <br>
 
    <label for="categorie_id">Catégorie:</label>
    <select name="categorie_id" required>
        <?php foreach ($categories as $categorie): ?>
            <option value="<?= $categorie->getId(); ?>"><?= $categorie->getCode(); ?></option>
        <?php endforeach; ?>
    </select>
    <br>
            
            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>Le licencié n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>

