<?php 

require_once __DIR__  . '/../include/init.php';


$query = 'DELETE FROM produit WHERE id = ' . (int)$_GET['id'];

$pdo->exec($query);


// enregistrement du message dans $_SESSION.
setFlashMessage('la catégorie a bien été supprimée.');

// Redirection
header("location: produits.php");
