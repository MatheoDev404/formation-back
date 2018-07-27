<?php

abstract class Animal
{
    /**
     * 
     *
     * @var string
     */
    protected $escpace = 'indeterminée';

    /**
     * Un attribut ou une méthode 
     * declaré private n'est 
     * pas accessible dans les classes filles.
     *
     * @var string
     */
    private $prive = 'variable propre à animal';

    public function identifier()
    {
        return 'je suis un animal';
    }

    /**
     * Get the value of prive
     */ 
    public function getPrive()
    {
        return $this->prive;
    }
}