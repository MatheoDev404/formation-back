<?php

class Person {
        
    private $firstname;

    private $lastname;

    private $age;

    private $hobbies = [];

    /**
     * Le constructeur est appelé automatiquement à l'instenciation de la class
     * 
     * @param string $lastname
     * @param string $firstname
     * @param int $age
     * @param array $hobbies
     */
    public function __construct($lastname, $firstname, $age, array $hobbies = [])
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->hobbies = $hobbies;
    }
    /**
     * Methode appelée automatiquement quand  on traite un objet de la class en 
     * chaine de caractère (ex : faire un echo dessus).
     *
     * @return string
     */
    public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of hobbies
     */ 
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * Set the value of hobbies
     *
     * @return  self
     */ 
    public function setHobbies(array $hobbies)
    {
        $this->hobbies = $hobbies;

        return $this;
    }
}