<?php
require 'Member.php';

$member = new Member();

echo '<br/>';
var_dump($member->getFirstname());

$member->setFirstname('Mathéo');
$member->setLastname('Stunault');
$member->setAge(22);

echo '<br/>';
var_dump($member->getFirstname());

$member2 = new Member();


// le "return $this" dans les setters permets de châiner les appels aux setters = interface fluide (fluent setters).
$member2
    ->setFirstname('Liam')
    ->setLastname('Tardieu')
    ->setAge(35)
;