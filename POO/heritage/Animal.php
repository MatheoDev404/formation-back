<?php
/*
 * Une classe abstraite ne peut pas être instanciée
 * Elle ne sert que dans le cadre de l'héritage
 */
abstract class Animal
{
    /**
     * Un attribut ou une méthode protected est accessible
     * depuis les classes filles, mais reste inaccessible en dehors
     * 
     * @var string
     */
    protected $espece = 'indéterminée';

    /**
     * Un attribut ou une méthode déclaré private
     * n'est pas accessible
     * dans les classes filles
     * 
     * @var string 
     */
    private $prive = 'attribut propre à Animal';

    public function identifier()
    {
        return 'Je suis un animal';
    }
    
    public function getPrive()
    {
        return $this->prive;
    }
    
    /*
     * Méthode abstraite
     * 
     * Toutes les classes qui héritent d'Animal
     * doivent implémenter cette méthode
     * 
     * Une classe qui contient au moins une méthode abstraite
     * doit être déclarée abstraite
     */
    abstract public function crier();
}
