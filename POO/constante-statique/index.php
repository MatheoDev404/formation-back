<?php
require 'Config.php';
require 'Commande.php';

// opérateur de résolution de portée :: pour accéder
// à la constante à partir du nom de la classe qui la contient
echo Config::RACINE_WEB;

$config = new Config();

echo '<br>' . $config::RACINE_WEB;

// même opérateur :: pour accéder à un attribut statique
echo '<br>' . Commande::$defaultStatut;

echo '<br>' . Commande::getNbCommandes();
$commande1 = new Commande();
echo '<br>' . Commande::getNbCommandes();
$commande2 = new Commande();
echo '<br>' . Commande::getNbCommandes();
$commande3 = new Commande();
echo '<br>' . Commande::getNbCommandes();

//echo '<br>' . Commande::dummy();