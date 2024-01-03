<?php
    // require('../../controllers/auth/guard.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
<h1>Ajouter un Educateur</h1>
<a href="IndexEducateurController.php">Retour à la liste des éducateurs</a>

    <form action="AddEducateurController.php" method="post">
        <label for="p">Mot de passe :</label>
        <input type="text" id="mot_de_passe" name="mot_de_passe" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>

        <label for="isAdmin">Administrateur</label>
        <select name="isAdmin" id="isAdmin">
            <option value="non">Non</option>
            <option value="oui">Oui</option>
        </select>
        <br><br>
        <label for="licencie_id">Licencié :</label>
        <select name="licencie_id" required>
            <option value="">Sélectionner un contact</option>
            <?php foreach ($licencies as $licencie): ?>
                <option value="<?= $licencie->getId(); ?>"><?= $licencie->getNom().' '.$licencie->getPrenom(); ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" name="action" value="Ajouter">
    </form>
</body>
</html>