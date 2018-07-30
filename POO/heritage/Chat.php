<?php

require_once 'Animal.php';

/**
 * Description of Chat
 *
 * @author Etudiant
 */

class Chat extends Animal {

    protected $longueurPoil = 'court';

    public function identifier(): string {
        // parent fait référence à la classe mère Animal
        return parent::identifier() . ' et je suis un chat.';
    }

    public function crier() {
        echo 'Miaou';
    }

    final public function ronronner()
    {
        echo 'Ronron';
    }
}