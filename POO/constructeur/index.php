<?php
require 'Person.php';

echo '<pre>';
// il faut placer des parametre, si la methode __construc en attend.
$person = new Person('Mathéo', 'Stunault', 22);
var_dump($person);

$person2 = new Person('Mathéo', 'Stunault', 22, ['niquer des mamans','fromage']);
var_dump($person2);

echo '</pre>';

// Si la class possède une methode __toString(), elle est appelée, 
// sinon fatal error
echo $person;