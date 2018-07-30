<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author Etudiant
 */
abstract class Animal {
    protected $espece = 'indéterminée';

    private $prive= 'attribut propre à Animal';

    public function identifier(){
        return 'Je suis un animal';
    }

    public function getPrive()
    {
        return $this->prive;
    }

    /* méthode abstraite
     * 
     * Toutes les classes qui héritent d'Animal doivent implémenter cette méthode
     * Une classe qui contient au moins une méthode abstraite doit être déclarée abstraite
     */
    abstract public function crier();


}