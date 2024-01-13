<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un licencié</title>
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

        hr {
            width: 80%;
            margin: 20px 0;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 16px;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: #1ABC9C;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            display: block;
        }
    </style>
</head>
<body>
   
    <hr>

    <h1>Ajout d'un nouveau licencié</h1>
    <a href="../../controllers/licencie/IndexLicencieController.php">Retour à la liste des licenciés</a>

    <form action="AddLicencieController.php" method="post">
        <label for="numero_licencie">Numero Licencié :</label>
        <input type="text" id="numero_licencie" name="numero_licencie" required>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="contact_id">Contact:</label>
        <select name="contact_id" required>
            <option value="">Sélectionner un contact</option>
            <?php foreach ($contacts as $contact): ?>
                <option value="<?= $contact->getId(); ?>"><?= $contact->getNom().' '.$contact->getPrenom(); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="categorie_id">Catégorie:</label>
        <select name="categorie_id" required>
            <option value="">Sélectionner une catégorie</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie->getId(); ?>"><?= $categorie->getNom(); ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" name="action" value="Ajouter">
    </form>
</body>
</html>