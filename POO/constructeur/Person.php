<?php
class Person
{
    private $lastname;
    
    private $firstname;
    
    private $age;
    
    private $hobbies = [];
    
    /**
     * Le constructeur est appelé automatiquement
     * à l'instanciation de la classe
     * 
     * @param string $lastname
     * @param string $firstname
     * @param int $age
     * @param array $hobbies
     */
    public function __construct($lastname, $firstname, $age, array $hobbies = [])
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->age = $age;
        $this->hobbies = $hobbies;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    public function getHobbies()
    {
        return $this->hobbies;
    }

    public function setHobbies(array $hobbies)
    {
        $this->hobbies = $hobbies;
        return $this;
    }

    /**
     * Méthode appelée automatiquement quand on traite un objet de la classe
     * en chaîne de caractère (ex : faire un echo dessus)
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
