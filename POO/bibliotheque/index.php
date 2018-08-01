<?php
require __DIR__ . '/App/init.php';

use App\Cnx;
use Model\Abonne;

// fatal error : constructeur privé
// $test = new Cnx();

// PDO est instancié
$pdo = Cnx::getInstance();

// PDO a été instancié par le 1er appel à Cnx::getInstance()
// il est juste retourné
// $pdo2 = Cnx::getInstance();

$abonne = new Abonne();

$abonne->setPrenom('Mathéo');

include __DIR__ . '/view/index.php';