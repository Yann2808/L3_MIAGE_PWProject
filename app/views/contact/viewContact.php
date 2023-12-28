<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Détails du Contact</h1>
    <a href="HomeController.php">Retour à la liste des contacts</a>

    <?php if ($contact): ?>
        <table>
            <thead>
                <tr>
         <p><strong>Nom :</strong> <?php echo $contact->getNom(); ?></p>
        <p><strong>Prénom :</strong> <?php echo $contact->getPrenom(); ?></p>
        <p><strong>Email :</strong> <?php echo $contact->getEmail(); ?></p>
        <p><strong>Téléphone :</strong> <?php echo $contact->getnumeroTel(); ?></p> 
                </tr>
            </thead>
        </table>
       
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>
</body>
</html>

