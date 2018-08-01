<?php
namespace Animal\Continent\Afrique;

// require_once __DIR__ . '/../../Elephant.php';

use Animal\Elephant as ElephantGenerique;

class Elephant implements ElephantGenerique
{
    public function getTailleOreilles(): string
    {
        return 'grandes';
    }
    
    public function etreVu()
    {
        // l'antislash initiale renvoie à la racine des namespaces
        // ici : la classe Touriste qui n'a pas de namespace
        // sans l'antislash, PHP chercherais à charger
        // une classe Animal\Continent\Afrique\Touriste
        $touriste = new \Touriste();
        
        $touriste->voirElephant('afrique');
    }
}
