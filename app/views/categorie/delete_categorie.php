<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une Categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Supprimer une Categorie</h1>
    <a href="HomeController.php">Retour à la liste des categories</a>

    <?php if ($contact): ?>
        <p>Voulez-vous vraiment supprimer la categorie "<?php echo $categorie->getNom(); ?> <?php echo $categorie->getCode(); ?>" ?</p>
        <form action="DeleteCategorieController.php?id=<?php echo $categorie->getId(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>La catégorie n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>

