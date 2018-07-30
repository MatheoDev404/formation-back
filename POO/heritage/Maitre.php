<?php

require_once 'Animal.php';

class Maitre {

    /**
     *
     * @var animal
     */
    private $animal;

    public function getAnimal(): animal {
        return $this->animal;
    }

    public function setAnimal(animal $animal) {
        $this->animal = $animal;
        return $this;
    }

    public function caresserAnimal ()
    {
        if (!empty($this->animal)){
            $this->animal->crier();
        }
    }
}