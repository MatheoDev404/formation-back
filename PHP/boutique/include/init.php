<?php

// On initialise la session ($_SESSION).
session_start();

define('RACINE_WEB', '/matheo_stunault/formation-back/PHP/boutique/');
define('PHOTO_WEB', RACINE_WEB . 'photo/' );

define('PHOTO_DIR', $_SERVER['DOCUMENT_ROOT'] . '/matheo_stunault/formation-back/PHP/boutique/photo/' );

define('PHOTO_DEFAULT','https://dummyimage.com/600x400/000000/ffffff&text=Pas+d\'image');


require __DIR__ . '/cnx.php';
require __DIR__ . '/fonctions.php';