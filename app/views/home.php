<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Liste des Contacts</h1>
    <a href="../controllers/contact/AddContactController.php">Ajouter un contact</a>

    <?php if ($contacts) : ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $contact->getNom(); ?></td>
                        <td><?php echo $contact->getPrenom(); ?></td>
                        <td><?php echo $contact->getEmail(); ?></td>
                        <td><?php echo $contact->getNumeroTel(); ?></td>
                        <td>
                            <a href="../controllers/contact/ViewContactController.php?id=<?php echo $contact->getId(); ?>">Voir</a>
                            <a href="../controllers/contact/EditContactController.php?id=<?php echo $contact->getId(); ?>">Modifier</a>
                            <a href="../controllers/contact/DeleteContactController.php?id=<?php echo $contact->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun contact trouvé.</p>
    <?php endif; ?>
</body>
</html>

