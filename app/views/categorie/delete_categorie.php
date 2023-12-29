<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Supprimer une catégorie</h1>
    <a href="../../controllers/categorie/IndexCategorieController.php">Retour à la liste des catégories</a>
    <hr>

    <?php if ($category): ?>
        <p>Voulez-vous vraiment supprimer la catégorie "<?php echo $category->getNom(); ?>" ?</p>
        <form action="DeleteCategorieController.php?id=<?php echo $category->getId(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>La catégorie n'a pas été trouvée.</p>
    <?php endif; ?>

</body>
</html>

