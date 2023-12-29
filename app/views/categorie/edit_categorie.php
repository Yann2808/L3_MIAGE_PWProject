<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier une categorie</h1>
    <a href="../HomeController.php">Retour à la liste des categories</a>
    <hr>
    
    <?php if ($categorie): ?>
        <form action="EditCategorieController.php?id=<?php echo $categorie->getId(); ?>" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $categorie->getNom(); ?>" required><br>

            <label for="code">Code :</label>
            <input type="text" id="code" name="code" value="<?php echo $categorie->getCode(); ?>" required><br>


            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>La categorie n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>

