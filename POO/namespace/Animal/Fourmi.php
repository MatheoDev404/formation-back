<?php
namespace Animal;

// use sur un namespace comme racine
// pour aller chercher dans ses sous-namespace
use Animal\Continent as Monde;

class Fourmi
{
    public function voirElephantAfrique()
    {
        $elephant = new Continent\Afrique\Elephant();
    }
    
    public function voirElephant($continent)
    {
        if ($continent == 'afrique') {
            $elephant = new Monde\Afrique\Elephant();
        } elseif ($continent == 'asie') {
            $elephant = new Monde\Asie\Elephant();
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
