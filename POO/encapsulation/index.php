<?php
require 'Member.php';

$member = new Member();

// on appelle les getters pour accéder aux valeurs des attributs
// NULL : pas de valeur par défaut dans la classe
var_dump($member->getFirstname());

// appel aux setters pour modifier la valeur des attributs
$member->setFirstname('Julien');
$member->setLastname('Anest');
$member->setAge(41);

echo '<br>';
var_dump($member->getFirstname());

$member2 = new Member();

// le "return $this;" dans les setters permets de chaîner
// les appels aux setters = interface fuide (fluent setters)
$member2
    ->setFirstname('Liam')
    ->setLastname('Tardieu')
    ->setAge(35)
;
