<?php

require_once 'Animal.php'; 

class Chat extends Animal 
{
    
    /**
     * Surcharge(=redefinition) de la methode identifier() de la class Animal
     *
     * @return string
     */
    public function identifier()
    {
        // parent fait reference à la class mère (Animal)
        return parent::identifier() . ' et je suis un chat.';
    }

}