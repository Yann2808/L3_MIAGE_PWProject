<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier une catégorie</h1>
    <a href="../../controllers/categorie/IndexCategorieController.php">Retour à la liste des catégories</a>
    <hr>
    
    <?php if ($categorie): ?>
        <form action="EditCategorieController.php?id=<?php echo $categorie->getId(); ?>" method="post">
            <label for="nom">Nom de la catégorie:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $categorie->getNom(); ?>" required><br>

            <label for="prenom">Code de la catégorie :</label>
            <input type="text" id="code" name="code" value="<?php echo $categorie->getCode(); ?>" required><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>La catégorie n'a pas été trouvée.</p>
    <?php endif; ?>

</body>
</html>

