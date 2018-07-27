<?php

class User 
{
    /** attribut de class avec une valeur par default 
     * 
     * @var string
    */
    public $firstname =  'Mathéo';
    
    /** attribut de class sans une valeur par default (=null)
     * 
     * @var string
     */
    public $lastname;

    /**
     * Une méthode est une fonction interne de la class
     * 
     * @return string
     */
    public function getFullname(){
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Une méthode est une fonction interne de la class
     * 
     * @return string
     */
    public function getInfo(){
        return $this->getFullname() . ', ' . $this->age . ' ans';
    }
    
    /**
     * Un attribut privé n'est disponible que dans la class
     * 
     * @var int
     */
    private $age = 22;

    //écrire une méthode anniversaire qui fais viellire d'un an

    /**
     * Une méthode est une fonction interne de la class
     * 
     * @return int
     */
    public function happyBirthday(){
        $this->age++;
        return 'Bon anniversaire tu à maintenant ' . $this->age . ' ans <br/>';
    }
}

//Instanciation de la class User
$user = new User();

// la fleche permet d'acceder a un attribut de la class
echo $user->firstname;

$user->lastname = 'Stunault';
echo '<br>';
var_dump($user->lastname);

$user2 = new User();
echo '<br>';
var_dump($user2->lastname);

echo '<br>';
echo $user->getFullname();

echo '<br>';
echo $user->getInfo();

echo '<br>';
echo $user->happyBirthday();
echo $user->getInfo();
