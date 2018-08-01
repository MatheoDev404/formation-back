<?php
class User
{
    /**
     * attribut de classe avec une valeur par défaut
     * 
     * @var string
     */
    public $firstname = 'Julien';
    
    /**
     * attribut de classe sans valeur par défaut (=null)
     * 
     * @var string
     */
    public $lastname;
    
    /**
     * Un attribut privé n'est accessible
     * qu'à l'intérieur de la classe
     *
     * @var int
     */
    private $age = 41;


    /**
     * Une méthode est une fonction interne à la classe
     * 
     * @return string
     * @
     */
    public function getFullname()
    {
        // $this fait référence à l'objet qui appelle la méthode
        return $this->firstname . ' ' . $this->lastname;
    }
    
    public function getInfo()
    {
        return $this->getFullname() . ', ' . $this->age . ' ans';
    }
    
    // écrire une méthode qui fait vieillir l'utilisateur d'un an
    public function birthday()
    {
        $this->age++;
    }
}

// instanciation de la classe
// $user est un objet instance de la classe User
$user = new User();

// la flèche permet d'accéder à un attribut de la classe
echo $user->firstname;

// création d'un attribut à la volée = mauvaise pratique
$user->nouvelAttribut = 'Une valeur'; 

// modification de la valeur d'un attribut de l'objet
$user->lastname = 'Anest';
echo '<br>';
var_dump($user->lastname);

// $user2 est un autre objet de la classe User
// la valeur de ses attributs n'est pas liée à celle de $user
$user2 = new User();
echo '<br>';
var_dump($user2->lastname);

echo '<br>';
// appel de la méthode getFullname()
echo $user->getFullname();

// Fatal error : l'attribut $age est inaccessible en dehors de la classe
// echo $user->age;

echo '<br>';
echo $user->getInfo();
$user->birthday();
echo '<br>';
echo $user->getInfo();