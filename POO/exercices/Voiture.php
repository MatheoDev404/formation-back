<?php 

require_once 'Vehicule.php';

class Voiture extends Vehicule {

    const ROUE = 4;

    /**
     * Get the value of roue
    */ 
    public function getRoue(): int
    {
        return self::ROUE;
    }
}