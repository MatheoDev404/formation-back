<?php 

require_once __DIR__  . '/../include/init.php';

adminSecurity();

$query = 'DELETE FROM categorie WHERE id = ' . (int)$_GET['id'];

$pdo->exec($query);


// enregistrement du message dans $_SESSION.
setFlashMessage('la catégorie a bien été supprimée.');

// Redirection
header("location: categories.php");
