<?php

require 'Chien.php';
require 'Chat.php';
require 'Siamois.php';
require 'MaitreChien.php';
// require 'SiamoisAngora.php';
require 'Maitre.php';

$chien = new Chien();
echo $chien->identifier();
echo '<br>';
$chat = new Chat();
echo $chat->identifier();
echo '<br>';
// Fatal error : la classe Animal est declarée abstraite
//$animal = new Animal();
//echo $animal->identifier();
echo '<br>' . $chien->getPrive();
echo '<br>' . $chien->cherchePrive();
echo '<br>' . $chien->ditEspece();
//longuerPOils est protected donc son accesible par objet 
//echo '<br>' . $chat->longeurPoils;
echo '<br>';
$chat->crier();
echo '<br>';

$siamois = new Siamois();
$siamois->ronronner();
echo '<br>';

$higgins = new MaitreChien();
$zeus = new Chien()

$higgins ->setChien($zeus);
//$higgins-> getChien() retounre un objet instance de la classe chien donc on 
//peut appeler dessus la methode crier de la classe chien
$higgins ->getChien()->crier();
echo '<br>';
echo get_class($higgins->getChien()); //Chien

//instanceof permet de savoir si une variable est un objet instance d'une classe donnée
echo '<br>';
var_dump($higgins instanceof MaitreChien);//true
echo '<br>';
var_dump($higgins instanceof Chien);//false
echo '<br>';
var_dump($zeus instanceof Chien);//true
echo '<br>';
// un objet instance de Chien est aussi instance d'Animal parce que Chien hérite d'Animal
var_dump($zeus instanceof Animal);//true

$maitre = new Maitre();
$minou = new Chat();
$maitre->setAnimal($minou);
echo'<br>';

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