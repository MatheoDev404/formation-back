<?php

require_once __DIR__ . '/autoload.php';

$foo = new Foo();
$foo->setBaz('exemple');
$foo->dumpBaz();
echo '<br>';
$foo->displayBaz('red');

// on peut aussi appeler les méthodes du trait
// en dehors, dès lors qu'elles sont publiques
$foo->display('texte à afficher', 'green');