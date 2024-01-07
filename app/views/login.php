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
   
    
    <form action="../controllers/AuthentificationController.php" method="post">
        <label for="email"> Email :</label>
        <input type="text" id="email" name="email" required><br>

        <label for="mot_de_passe">motDePasse :</label>
        <input type="text" id="mot_de_passe" name="mot_de_passe"><br>

        <button type="submit" name="action">Connexion</button>
    </form>

    

</body>
</html>

