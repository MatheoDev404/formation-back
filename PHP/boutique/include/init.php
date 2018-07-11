<?php

// On initialise la session ($_SESSION).
session_start();

define('RACINE_WEB', '/matheo_stunault/formation-back/PHP/boutique/');
define('PHOTO_WEB', RACINE_WEB . 'photo/' );

define('PHOTO_DIR', $_SERVER['DOCUMENT_ROOT'] . '/matheo_stunault/formation-back/PHP/boutique/photo/' );


require __DIR__ . '/cnx.php';
require __DIR__ . '/fonctions.php';