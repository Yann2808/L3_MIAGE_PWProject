<?php

// Définition de la chaîne de connexion à la base de données
$dsn = 'mysql:host=localhost;
        dbname=pwproject_db';

// Définition du nom d'utilisateur de la base de données
$username = 'root';

// Définition du mot de passe de la base de données
$password = '';

// Création d'une nouvelle instance de la classe PDO
$pdo = new PDO($dsn, $username, $password);

// Activation de l'exception pour les erreurs PDO
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Renvoi de l'instance de PDO
return $pdo;