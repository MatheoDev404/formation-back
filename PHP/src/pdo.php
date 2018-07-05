<h2>Connexion</h2>

<?php 

$pdo = new PDO(
    'mysql:host=localhost;dbname:entreprise', // Chaîne de connection
    'root',  // Utilisateur 
    '', //mot de passe
    // tableau d'option
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => ' SET NAMES utf8',
         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
     ]
);