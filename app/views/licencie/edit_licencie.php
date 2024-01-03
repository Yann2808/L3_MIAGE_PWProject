<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier un Licencié</h1>
    <a href="../LicencieController.php">Retour à la liste des licenciés</a>
 
    <?php if ($licencie): ?>
        <form action="EditLicencieController.php?id=<?php echo $contact->getId(); ?>" method="post">
            <label for="numero_licence">Numéro du Licencie :</label>
            <input type="text" id="numero_licencie" name="numero_licencie" value="<?php echo $licencie->getNumeroLicence(); ?>" required><br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $licencie->getNom(); ?>" required><br>
 
            <label for="prenom">Prénom :</label>
            <input type="prenom" id="prenom" name="prenom" value="<?php echo $licencie->getPrenom(); ?>"><br>
            <select name="contact_id" required>
        <?php foreach ($contacts as $contact): ?>
            <option value="<?= $contact->getId(); ?>"><?= $contact->getEmail(); ?></option>
        <?php endforeach; ?>
    </select>
    <br>
 
    <label for="categorie_id">Catégorie:</label>
    <select name="categorie_id" required>
        <?php foreach ($categories as $categorie): ?>
            <option value="<?= $categorie->getId(); ?>"><?= $categorie->getCode(); ?></option>
        <?php endforeach; ?>
    </select>
    <br>
            
            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>Le licencié n'a pas été trouvé.</p>
    <?php endif; ?>
 
</body>
</html>