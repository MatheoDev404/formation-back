<?php
require_once 'Cube.php';
require_once 'Sphere.php';
require_once 'De.php';

function afficheFormeVolume(Volume $volume)
{
    echo 'La forme du volume est : ' . $volume->getForme();
}

$cube = new Cube();
$sphere = new Sphere();

var_dump($cube instanceof Volume); // true

// Cube et Sphere implémentent l'interface Volume
// donc on peut les passer en paramètre à la fonction afficheFormeVolume()
afficheFormeVolume($cube);
echo '<br>';
afficheFormeVolume($sphere);

$de = new De();
var_dump($de instanceof De); // true
// par héritage instance de Cube
var_dump($de instanceof Cube); // true
// par implémentation instance de Texture
var_dump($de instanceof Texture); // true
// parce que Cube implémente Volume, instance de Volume
var_dump($de instanceof Volume); // true
