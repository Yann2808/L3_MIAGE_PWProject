<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../src/css/styles.css">
   
</head>
<body>
    <h1>Ajouter une Catégorie</h1>
    <a href="../../controllers/categorie/IndexCategorieController.php">Retour à la liste des catégories</a>
    <hr>

    <form action="AddCategorieController.php" method="post">
        <label for="nom"> Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="code">code :</label>
        <input type="text" id="code" name="code"><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php

    ?>

</body>
</html>

