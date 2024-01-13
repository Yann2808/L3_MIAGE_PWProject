<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Licencié</title>
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
    

    <h1>Modifier un Licencié</h1>
    <a href="../../controllers/licencie/IndexLicencieController.php">Retour à la liste des licenciés</a>

    <?php if ($licencie): ?>
        <form action="EditLicencieController.php?id=<?php echo $licencie->getId(); ?>" method="post">
            <label for="numero_licencie">Numéro du Licencié :</label>
            <input type="text" id="numero_licencie" name="numero_licencie" value="<?php echo $licencie->getNumeroLicencie(); ?>" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $licencie->getNom(); ?>" required>

            <label for="prenom">Prénom :</label>
            <input type="prenom" id="prenom" name="prenom" value="<?php echo $licencie->getPrenom(); ?>">

            <label for="contact_id">Contact:</label>
            <select name="contact_id" required>
                <?php foreach ($contacts as $contact): ?>
                    <option value="<?= $contact->getId(); ?>"><?= $contact->getEmail(); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="categorie_id">Catégorie:</label>
            <select name="categorie_id" required>
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?= $categorie->getId(); ?>"><?= $categorie->getCode(); ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>Le licencié n'a pas été trouvé.</p>
    <?php endif; ?>
</body>
</html>