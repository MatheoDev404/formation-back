<?php

require 'Pompe.php';

/**
 * Description of Vehicule
 * 
 * @author Etudiant
 */
abstract class Vehicule {

    protected $carburant;
    
    protected $vitesseMax;

    protected $contenanceReservoir;

    protected $litreEssence;

    private static $typesCarburant = ['essence', 'diesel'];
    
    function __construct($carburant, $vitesseMax, $contenanceReservoir = 0, $litreEssence = 0){
        $this->setCarburant($carburant);
        $this->setVitesseMax($vitesseMax);
        $this->setContenanceReservoir($contenanceReservoir);
        $this->setlitreEssence($litreEssence);
    }

    abstract public function getRoue(): int;

    public function fairePlein(Pompe $pompe){
        $litreAjoute = $this->getContenanceReservoir() - $this->getLitreEssence();
        if(($pompe->getLitreEssence() - $litreAjoute) > 0) {
            $this->setLitreEssence($pompe->getLitreEssence() + $litreAjoute);
            
            $pompe->setLitreEssence($pompe->getLitreEssence() - $litreAjoute);
            return 'le reservoir est plein ' . $this->getLitreEssence() . '/' . $this->getContenanceReservoir()  . 'L';
        }elseif($pompe->getLitreEssence() < $litreAjoute){
            $this->setLitreEssence($this->getLitreEssence() + $pompe->getLitreEssence());
            $pompe->setLitreEssence(0);
            return 'le reservoir est rempli un peux mais pas trop remplis non plus ' . $this->getLitreEssence() . '/' . $this->getContenanceReservoir() . 'L';
        }else{
            return 'La pompe est vide';
        }
    }

    /**
     * Get the value of carburant
     */ 
    public function getCarburant()
    {
        return $this->carburant;
    }

    /**
     * Set the value of carburant
     *
     * @return  self
     */ 
    public function setCarburant($carburant)
    {
        if (in_array($carburant,self::$typesCarburant)) {
            $this->carburant = $carburant;
        }
        return $this;
    }

    /**
     * Get the value of vitesseMax
     */ 
    public function getVitesseMax()
    {
        return $this->vitesseMax;
    }

    /**
     * Set the value of vitesseMax
     *
     * @return  self
     */ 
    public function setVitesseMax($vitesseMax)
    {
        $this->vitesseMax = $vitesseMax;
        return $this;
    }


    /**
     * Get the value of contenanceReservoir
     */ 
    public function getContenanceReservoir()
    {
        return $this->contenanceReservoir;
    }

    /**
     * Set the value of contenanceReservoir
     *
     * @return  self
     */ 
    public function setContenanceReservoir($contenanceReservoir)
    {
        $this->contenanceReservoir = $contenanceReservoir;

        return $this;
    }

    /**
     * Get the value of littreEssence
     */ 
    public function getLitreEssence()
    {
        return $this->litreEssence;
    }

    /**
     * Set the value of littreEssence
     *
     * @return  self
     */ 
    public function setLitreEssence($littreEssence)
    {
        $this->litreEssence = $littreEssence;

        return $this;
    }
}