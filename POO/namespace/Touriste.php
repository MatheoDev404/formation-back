<?php

use Animal\Continent\Afrique\Elephant;
use Animal\Continent\Asie\Elephant as ElephantAsie;

class Touriste
{
    public function voirElephant($continent)
    {
        if ($continent == 'afrique') {
            $elephant = new Elephant();
        } elseif ($continent == 'asie') {
            $elephant = new ElephantAsie();
        }
        
        if (isset($elephant)) {
            echo 'Je vois un éléphant avec de '
                . $elephant->getTailleOreilles()
                . ' oreilles'
            ;
        } else {
            echo "Il n'y a pas d'éléphants où je suis";
        }
    }
}
