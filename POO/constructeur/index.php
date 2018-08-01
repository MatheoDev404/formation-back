<?php
require 'Person.php';

// Fatal error : le constructeur de la classe
// contient 3 paramètres obligatoires
//$person = new Person();
echo '<pre>';
// Pour pouvoir instancier la classe il faut passer
// des valeurs pour les paramètres obligatoires attendus
// par la méthode __construct()
$person = new Person('Julien', 'Anest', 41);
var_dump($person);
// comme pour toute fonction ou méthode, quand un paramètre
// du constructeur a une valeur par défaut, on peut choisir
// d'y passer une valeur ou pas
$person2 = new Person('Liam', 'Tardieu', 35, ['PHP', 'Laravel']);
var_dump($person2);
echo '</pre>';

// si la classe possède une méthode __toString(), elle est appelée
// sinon Fatal error
echo $person;