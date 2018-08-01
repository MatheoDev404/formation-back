<?php
require 'Chien.php';
require 'Chat.php';
require 'Siamois.php';
require 'MaitreChien.php';
require 'Maitre.php';
// require 'SiamoisAngora.php';

$chien = new Chien();

echo $chien->identifier();

$chat = new Chat();

echo '<br>' . $chat->identifier();

/*
 * Fatal error : la classe Animal est déclarée abstraite
$animal = new Animal();
echo '<br>' . $animal->identifier();
 * 
 */
echo  '<br>' . $chien->getPrive();
echo  '<br>' . $chien->cherchePrive();
echo  '<br>' . $chien->ditEspece();
// Fatal error : l'attribut longeurPoils est déclaré protected dans Chat
// echo  '<br>' . $chat->longeurPoils;
echo  '<br>';
$chat->crier();

$siamois = new Siamois();
$siamois->ronronner();

$higgins = new MaitreChien();
$zeus = new Chien();
$higgins->setChien($zeus);
echo '<br>';
// $higgins->getChien() retourne un objet
// instance de la classe Chien
// donc on peut appeler dessus la méthode crier
// de la classe chien
$higgins->getChien()->crier();
echo '<br>';
echo get_class($higgins); // MaitreChien
echo '<br>';
echo get_class($higgins->getChien()); // Chien
echo '<br>';
// instanceof permet de savoir si une variable
// est un objet instance d'une classe donnée
var_dump($higgins instanceof MaitreChien); // true
echo '<br>';
var_dump($higgins instanceof Chien); // false
echo '<br>';
var_dump($zeus instanceof Chien); // true
echo '<br>';
// un objet instance de Chien est aussi instance d'Animal
// parce que Chien hérite d'Animal
var_dump($zeus instanceof Animal); // true

$maitre = new Maitre();
$minou = new Chat();
$maitre->setAnimal($minou);
echo '<br>';
$maitre->getAnimal()->crier();

$maitre2 = new Maitre();
$medor = new Chien();
$maitre2->setAnimal($medor);
echo '<br>';
$maitre2->getAnimal()->crier();

$maitre3 = new Maitre();
$chatSiamois = new Siamois();
$maitre3->setAnimal($chatSiamois);
echo '<br>';
$maitre3->getAnimal()->crier();
echo '<br>';

$maitre->caresserAnimal();