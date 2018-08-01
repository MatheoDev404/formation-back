<?php
namespace Animal\Continent\Asie;

// require_once __DIR__ . '/../../Elephant.php';

use Animal\Elephant as ElephantGenerique;

class Elephant implements ElephantGenerique
{
    public function getTailleOreilles(): string
    {
        return 'petites';
    }
    
    public function etreVu()
    {
        $touriste = new \Touriste();
        
        $touriste->voirElephant('asie');
    }

}
