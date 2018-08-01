<?php
class Pompe
{
    private $contenance;
    
    private $litresEssence;
    
    public function __construct($contenance, $litresEssence)
    {
        $this->setContenance($contenance);
        $this->setLitresEssence($litresEssence);
    }
    
    public function getContenance()
    {
        return $this->contenance;
    }

    public function getLitresEssence()
    {
        return $this->litresEssence;
    }

    public function setContenance($contenance)
    {
        $this->contenance = $contenance;
        return $this;
    }

    public function setLitresEssence($litresEssence)
    {
        $this->litresEssence = $litresEssence;
        return $this;
    }


}
