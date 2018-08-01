<?php

require_once 'Vehicule.php';

class Moto extends Vehicule {

    const ROUE = 2;

    /**
     * Get the value of roue
     */ 
    public function getRoue(): int
    {
        return self::ROUE;
    }
}