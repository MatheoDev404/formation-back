<?php 
session_start(); // initialisation de la session, obligatoirement en debut de page.

// On ajoute des elements dans le tableau comme pour un tableau.
$_SESSION['prenom'] = "Mathéo";
$_SESSION['nom'] = "stunault";

echo '<pre>';
var_dump($_COOKIE);
echo '</pre><br/>';
echo '<pre>';
var_dump($_SESSION);
echo '</pre><br/>';

?>