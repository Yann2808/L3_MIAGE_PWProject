<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../src/css/styles.css">
   
</head>
<body>
    <h1>Authentification</h1>
    <hr>

    <form action="../controllers/AuthentificationController.php" method="post">
        <label for="email"> Email :</label>
        <input type="text" id="email" name="email" required><br>

        <label for="motDePasse">motDePasse :</label>
        <input type="text" id="motDePasse" name="motDePasse"><br>

        <input type="submit" name="action" value="connecter">
    </form>

    <?php

    ?>

</body>
</html>

