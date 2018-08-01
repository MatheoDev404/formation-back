<?php
class Member
{
    private $firstname;
    
    private $lastname;
    
    private $age;
    
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }


}
