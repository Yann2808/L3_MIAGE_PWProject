<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Educateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">

        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .menu {
            display: flex;
            background-color: #ccc;
            justify-content: center;
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .menu li {
            margin: 0.5rem;
        }

        .menu a {
            display: block;
            min-width: 120px;
            padding: 0.4rem 0;
            text-align: center;
            background-color: #1ABC9C;
            color: #fff;
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 4px;
            transition: all 0.5s;
        }

        .menu a:hover {
            background-color: #fff;
            color: #1ABC9C;
            border-color: #1ABC9C;
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        a {
            color: #1ABC9C;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        form {
            width: 50%;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #1ABC9C;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 10px;
        }

        input[type="submit"]:hover {
            background-color: #148F77;
        }
    </style>
</head>
<body>
   
    <h1>Modifier un educateur</h1>
    <a href="../../controllers/educateur/IndexEducateurController.php">Retour à la liste des educateurs</a>
 
 
    <?php if ($educateur): ?>
        <form action="EditEducateurController.php?id=<?php echo $educateur->getId(); ?>" method="post">
            <label for="licencie_id">Numéro du Licencie :</label>
            <input type="text" id="licencie" name="licencie" value="<?php echo $educateur->getEducateurByLicencieId(); ?>" readonly><br>
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