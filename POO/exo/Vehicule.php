<?php

abstract class Vehicule
{
    protected $carburant;
    
    protected $vitesseMax;
    
    protected $contenanceReservoir;
    
    protected $litresEssence;


    private static $typesCarburant = ['essence', 'diesel'];

    public function __construct(
        $carburant,
        $vitesseMax,
        $contenanceReservoir,
        $litresEssence
    ){
        $this->setCarburant($carburant);
        $this->setVitesseMax($vitesseMax);
        $this->setContenanceReservoir($contenanceReservoir);
        $this->setLitresEssence($litresEssence);
    }
    
    public function getCarburant()
    {
        return $this->carburant;
    }

    public function getVitesseMax()
    {
        return $this->vitesseMax;
    }

    public function setCarburant($carburant)
    {
        if (in_array($carburant, self::$typesCarburant)) {
            $this->carburant = $carburant;
        }
        return $this;
    }

    public function setVitesseMax($vitesseMax)
    {
        $this->vitesseMax = $vitesseMax;
        return $this;
    }
    
    public function getContenanceReservoir()
    {
        return $this->contenanceReservoir;
    }

    public function getLitresEssence()
    {
        return $this->litresEssence;
    }

    public function setContenanceReservoir($contenanceReservoir)
    {
        $this->contenanceReservoir = $contenanceReservoir;
        return $this;
    }

    public function setLitresEssence($litresEssence)
    {
        $this->litresEssence = $litresEssence;
        return $this;
    }

    public function fairePlein(Pompe $pompe)
    {
        // calcul du besoin d'essence pour faire le plein
        $besoinEssence = $this->contenanceReservoir - $this->litresEssence;
        
        // vérification que la pompe contient assez d'essence
        if ($pompe->getLitresEssence() < $besoinEssence) {
            $besoinEssence = $pompe->getLitresEssence();
        }
        
        // ajout de la quantité d'essence necessaire au véhicule
        $this->setLitresEssence($this->litresEssence + $besoinEssence);
        
        // enlever la quantité ajoutée au véhicule de la pompe
        $pompe->setLitresEssence($pompe->getLitresEssence() - $besoinEssence);
    }
    
    abstract public function getNbRoues(): int;
}
