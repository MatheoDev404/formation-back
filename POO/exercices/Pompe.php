<?php 


class Pompe {
    private $contenanceReservoir;

    private $litreEssence;
    
    function __construct($contenanceReservoir = 0, $litreEssence = 0){

        $this->setContenanceReservoir($contenanceReservoir);
        $this->setlitreEssence($litreEssence);
        
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
    public function setLitreEssence($litreEssence)
    {
        $this->litreEssence = $litreEssence;

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
}