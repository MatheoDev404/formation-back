<?php

require_once 'Animal.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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