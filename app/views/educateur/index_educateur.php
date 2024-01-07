<?php
    // require('../../controllers/auth/guard.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Educateurs</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Liste des Educateurs</h1>
<a href="AddEducateurController.php">Ajouter un educateur</a><br>
<a href="../../views/logout.php">Deconnexion</a>

<?php if (count($educateurs) > 0): ?>
    <table border="3">
        <thead>
        <tr>
            <th>Numero de licence</th>
            <th>Email</th>
            <th>Administrateur</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($educateurs as $educateur): ?>
            <tr>
                <td><?php echo $educateur->getEducateurByLicencieId(); ?></td>
                <td><?php echo $educateur->getEmail(); ?></td>
                <td><?php echo $educateur->isAdmin() == 1 ? 'oui' : 'non'; ?></td>
                <td>
                    <a href="ViewEducateurController.php?id=<?php echo $educateur->getId(); ?>"><button type="button" class="btn btn-primary">Voir</button></a>
                    <a href="EditEducateurController.php?id=<?php echo $educateur->getId(); ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
                    <a href="DeleteEducateurController.php?id=<?php echo $educateur->getId(); ?>"><button type="button" class="btn btn-primary">Supprimer</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun educateurs trouvé.</p>
<?php endif; ?>
</body>
</html>