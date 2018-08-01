<?php


class Foo
{
    // use permet d'intégrer un ou plusieurs Traits
    // à la classe 
    use Dumper, Displayer;

    private $baz;
    

    /**
     * Get the value of baz
     */ 
    public function getBaz()
    {
        return $this->baz;
    }

    /**
     * Set the value of baz
     *
     * @return  self
     */ 
    public function setBaz($baz)
    {
        $this->baz = $baz;

        return $this;
    }

    public function dumpBaz()
    {
        // on utilise $this comme si la méthode faisait partie
        // de la classe
        $this->dump($this->baz); // méthode venant du trait Dumper
    }

    public function displayBaz($color = null)
    {
        $this->display($this->baz, $color); // méthode venant du trait Displayer
    }
}