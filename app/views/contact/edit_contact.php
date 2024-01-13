<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Contact</title>
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
   
    <h1>Modifier un Contact</h1>
    <a href="../../controllers/contact/IndexContactController.php">Retour à la liste des contacts</a>
    <hr>
    
    <?php if ($contact): ?>
        <form action="EditContactController.php?id=<?php echo $contact->getId(); ?>" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $contact->getNom(); ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $contact->getPrenom(); ?>" required><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo $contact->getEmail(); ?>"><br>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo $contact->getNumeroTel(); ?>"><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>

