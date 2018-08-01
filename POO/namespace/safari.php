<?php
/*
require_once 'Animal/Continent/Afrique/Elephant.php';
require_once 'Animal/Continent/Asie/Elephant.php';
*/
require_once __DIR__ . '/autoload.php';

use Animal\Continent\Afrique\Elephant;
use Animal\Continent\Asie\Elephant as ElephantAsie;
use String\Utils;
use Animal\Continent\Afrique\Gazelle;

// instanciation de la classe Animal\Continent\Afrique\Elephant
$elephantAfrique = new Elephant();
// instanciation de la classe Animal\Continent\Asie\Elephant
$elephantAsie = new ElephantAsie();

echo $elephantAfrique->getTailleOreilles();
echo '<br>' . $elephantAsie->getTailleOreilles();

// s'il n'y avait pas de use, il faudrait utiliser
// le nom pleinement qualifié (=nom complet) de la classe
// (c-à-d préfixée par son namespace)
$elephantSansUse = new Animal\Continent\Afrique\Elephant();
echo '<br>';
Utils::yell($elephantAfrique->getTailleOreilles());

$gazelle = new Gazelle();
echo '<br>';
$gazelle->voirElephant();
echo '<br>';
$elephantAsie->etreVu();