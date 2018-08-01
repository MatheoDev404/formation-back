<?php
require_once 'Animal.php';

class Chat extends Animal
{
    protected $longeurPoils = 'court';

    /**
     * Surcharge (= redéfinition) de la méthode identifier()
     * de la classe Animal
     * 
     * @return string
     */
    public function identifier()
    {
        // parent fait référence à la classe mère Animal
        return parent::identifier() . ' et je suis un chat';
    }

    public function crier()
    {
        echo 'Miaou';
    }

    /*
     * Une méthode déclarée final ne peut pas être surchargée
     */
    final public function ronronner()
    {
        echo 'Ronron';
    }
}
