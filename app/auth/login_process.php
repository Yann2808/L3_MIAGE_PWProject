<?php
    // login_process.php
    session_start();

    // Vérifier les informations d'identification
    if ($_POST['email'] == 'email@example.com' && $_POST['password'] == 'motdepasse') {
        // Informations correctes, connectez l'utilisateur
        $_SESSION['user'] = [
            'id' => 1,
            'nom' => 'John',
            'prenom' => 'Doe',
            'email' => 'email@example.com',
            'est_admin' => true
        ];

        //header('Location: dashboard.php'); // Rediriger vers la page du tableau de bord
        exit();
    } else {
        // Informations incorrectes, rediriger vers la page de connexion avec un message d'erreur
        header('Location: login.php?error=1');
        exit();
    }
?>
