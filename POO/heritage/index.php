<?php
require 'Chien.php';
require 'Chat.php';

$chien = new Chien();
echo '<br/>' . $chien->identifier();

$chat = new Chat();
echo '<br/>' . $chat->identifier();

// Fatal error
// $animal = new Animal();
// echo '<br/>' . $animal->identifier();


// renvois une erreur, car $prive est en private
echo '<br/>' . $chien->cherchePrive();

echo '<br/>' . $chien->getprive();
