<?php

class Commande
{
    /**
     * Attribut static 
     * Appartient à la class et non a l'objet
     *
     * @var string
     */
    public static $defaultStatut = 'en cours';
    
    private static $nbCommandes = 0;


    public function __construct()
    {
        self::$nbCommandes++;
    }
    
    /**
     * Get the value of nbCommandes
     */ 
    public function getNbCommandes()
    {
        return self::$nbCommandes;
    }


    public static function dummy()
    {
        // Fatal error : $this n'a pas de sens dans une fonction static, car il fait reference à un objet instancié
        return $this;
    }
}