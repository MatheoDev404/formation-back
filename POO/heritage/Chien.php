<?php

require_once 'Animal.php'; 

class Chien extends Animal 
{
    public function cherchePrive()
    {
        // l'attribut prive n'existe pas pour les class fille
        // car déclarer private dans  Animal
        return $this->prive;
    }
}