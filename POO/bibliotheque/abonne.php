<?php

require __DIR__ . '/App/init.php';

use Model\Abonne;

$abonnes = Abonne::fetchAll();

include __DIR__ . '/view/abonne.html.php';