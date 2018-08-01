<?php
namespace Animal\Continent\Afrique;

class Gazelle
{
    public function voirElephant()
    {
        // Animal\Continent\Afrique\Elephant
        // car sans préciser de namespace et sans use
        // la classe va être celle qui se trouve dans le namespace
        // dans lequel on est
        $elephant = new Elephant();
        
        echo 'Je vois un éléphant avec de '
            . $elephant->getTailleOreilles()
            . ' oreilles'
        ;
    }
}
