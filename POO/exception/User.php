<?php
class User
{
    private $name;
    
    private $age;
    
    private $status;
    
    private static $availableStatuses = [
        'user',
        'admin'
    ];


    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setName($name)
    {
        if (strlen($name) > 50) {
            throw new Exception("'$name' fait plus de 50 caractères");
        }
        
        $this->name = $name;
        return $this;
    }

    public function setAge($age)
    {
        if (!is_int($age)) {
            // classe d'exception pour un paramètre non voulu
            throw new InvalidArgumentException("'$age' n'est pas un entier");
        }
        
        $this->age = $age;
        return $this;
    }

    public function setStatus($status)
    {
        if (!in_array($status, self::$availableStatuses)) {
            // classe d'exception en cas de valeur
            // non prise en charge par l'application
            throw new UnexpectedValueException(
                "'$status' n'est pas un statut reconnu, les status possibles sont :"
                . implode(', ', self::$availableStatuses)
            );
        }
        
        $this->status = $status;
        return $this;
    }


}
