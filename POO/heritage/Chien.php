<?php

require_once 'Animal.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chien
 *
 * @author Etudiant
 */

class Chien extends Animal {
    //put your code here
    
    public function cherchePrive()
    {
        // l'attribut n'existe par pour les classes filles car déclaré private dans Animal
        //return $this->prive;
    }

    public function ditEspece()
    {
        // l'attribut espece est accessible pour les classes filles
        // car déclaré protected dans Animal
        echo $this->espece;
    }

    public function crier() {
     echo 'Ouaf';   
    }

}