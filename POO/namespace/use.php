<?php
require_once 'Foo/A.php';
require_once 'Bar/A.php';

// le 'use' permet d'appeler la classe par son nom court
// (sans le namespace) dans le reste du fichier
use Foo\A;
// comme on utilise 2 classes A dans le fichier, on aliase
// l'une des 2
use Bar\A as BA;

// instanciation de la classe A de Foo
$a = new A();
// instanciation de la classe A de Bar par son alias
$b = new BA();
