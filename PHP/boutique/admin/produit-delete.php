<?php 

require_once __DIR__  . '/../include/init.php';

adminSecurity();

$query = 'SELECT photo FROM produit ' . (int)$_GET['id'];
$stmt = $pdo->prepare($query);
$stmt->execute();
$photo = $stmt->fetchColumn();

// On supprime le produits, et on éfface la photo si il y en a une dans le dossier.
if(!empty($photo)){
    unlink(PHOTO_DIR . $photo);
}


$query = 'DELETE FROM produit WHERE id = ' . (int)$_GET['id'];

$pdo->exec($query);


// enregistrement du message dans $_SESSION.
setFlashMessage('Le produit a bien été supprimée.');

// Redirection
header("location: produits.php");
