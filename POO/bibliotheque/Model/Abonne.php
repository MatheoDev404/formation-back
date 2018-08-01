<?php
namespace Model;

use App\Cnx;

class Abonne 
{
    /**
     *
     * @var int
     */
    private $id;

    /**
     *
     * @var string
     */
    private $prenom;


    public function __construct($prenom = null, $id = null)
    {
        $this->setPrenom($prenom);
        $this->setId($id);
    }


    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return  string
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param  string  $prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function fetchAll()
    {
        $pdo = Cnx::getInstance();
        $stmt = $pdo->query('SELECT * FROM abonne');
        $abonnes = [];

        foreach($stmt->fetchAll() as $abonne) {
            $abonnes[] = new self($abonne['prenom'],$abonne['id']);
        }

        return $abonnes;
    }

    /**
     * @return void
     */
    public function save()
    {
        if(empty($this->id)){
            $this->insert();
        }else{
            $this->update();
        }
    }


    /**
     * @return void
     */
    private function update(){
        $pdo = Cnx::getInstance();
        $query = 'UPDATE abonne SET prenom = :prenom WHERE id = :id'; 
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':prenom' => $this->getPrenom(),
            ':id' => $this->getId(),
        ]);
    }

    

    /**
     * @return void
     */
    private function insert(){
        $pdo = Cnx::getInstance();
        $query = 'INSERT INTO abonne (prenom) VALUES (:prenom)'; 
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':prenom' => $this->getPrenom(),
        ]);
    }
    /**
     * @return array les messages d'erreur
     */
    public function validate()
    {
        $errors = [];

        if(empty($this->prenom)){
            $errors[] = 'le prenom est vide.';
        }elseif (strlen($this->prenom) > 100) {
            $errors[] = 'Le prénom doit faire entre 1 et 100 caractère';
        }
        

        return $errors;
    }

    /**
     * @param int $id
     * @return Abonne
     */
    public static function find($id)
    {
        $pdo = Cnx::getInstance();
        $stmt = $pdo->query('SELECT * FROM abonne WHERE id='. $id);
        $result = $stmt->fetch();
        
        // return un objet Abonne avec les attributs id et prenom settés à  partir du resultat de la requete.
        return new self($result['prenom'],$result['id']);
    }
    
    public function delete(){
        $pdo = Cnx::getInstance();
        $query = 'DELETE FROM abonne WHERE id = ' .$this->id;
        $stmt = $pdo->query($query);
    }

}