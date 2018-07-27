<?php

 require 'Config.php'
 require 'Commande.php'

 // operateur de résolution de portée :: pour accéder 
 // à la constante à partir du nom de la class qui la contient
echo Config::RACINE_WEB;

$config = new Config();

echo '<br>' . $config::RACINE_WEB;

// Même operateur  :: pour accéder a un attribut statique
echo '<br>' . Commande::$defaultStatut;

$commande1 = new Commande();
echo '<br>' . Commande::getNbCommandes();
$commande2 = new Commande();
echo '<br>' . Commande::getNbCommandes();
$commande3 = new Commande();
echo '<br>' . Commande::getNbCommandes();

// echo '<br>' . Commande::dummy();