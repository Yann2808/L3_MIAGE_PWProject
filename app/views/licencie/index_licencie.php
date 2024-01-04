<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Licenciés</title>
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
    <hr>
 
    <h1>Liste des Liceniés</h1>
    <a href="../licencie/AddLicencieController.php">Ajouter un licencié</a>
 
    <?php if ($licencies) : ?>
        <table>
            <thead>
                <tr>
                    <th>Numéro licencié</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Contact</th>
                    <th>Action</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($licencies as $licencie): ?>
                    <tr>
                        <td><?php echo $licencie->getNumeroLicencie(); ?></td>
                        <td><?php echo $licencie->getNom(); ?></td>
                        <td><?php echo $licencie->getPrenom(); ?></td>
                        <td><?php echo $licencie->getContact()->getId(); ?></td>
                        
                        <td>
                            <a href="../licencie/ViewLicencieController.php?id=<?php echo $licencie->getId(); ?>">Voir</a>
                            <a href="../licencie/EditLicencieController.php?id=<?php echo $licencie->getId(); ?>">Modifier</a>
                            <a href="../licencie/DeleteLicencieController.php?id=<?php echo $licencie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun licencié trouvé.</p>
    <?php endif; ?>
</body>
</html>