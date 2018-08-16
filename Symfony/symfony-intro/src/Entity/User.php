<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * la class correspond à une table en bdd
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * Clé primaire
     * @ORM\Id()
     * Auto-increment
     * @ORM\GeneratedValue()
     * champ de type integer dans la bdd
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $birthdate;

    /**
     * @var ArrayCollection
     * OneToMany() (facultatif) permet de pouvoir accéder aux publications
     * mappedBy dit quel attribut dans Publication définit la clé étrangère avec ManyToOne()
     * @ORM\OneToMany(targetEntity="Publication",mappedBy="author",cascade={"persist"})
     */
    private $publications;

    /**
     * relation n-n entre User et Group définie sur l'attribut $users de Group
     *
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Group", mappedBy="users")
     */
    private $groups;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->groups= new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }


    /**
     * @param Collection $groups
     * @return User
     */
    public function setGroups(Collection $groups): User
    {
        $this->groups = $groups;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTimeInterface $birthdate
     * @return User
     */
    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    /**
     * @param Collection $publications
     * @return User
     */
    public function setPublications(Collection $publications): User
    {
        $this->publications = $publications;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @param Publication $publication
     */
    public function addPublication(Publication $publication)
    {
        // On ajoute la publication à l'utilisateur
        $this->publications->add($publication);
        // éq : $this->publications[] = $publication;

        // On definit l'auteur de la publication avec l'objet User qui appel la methode
        $publication->setAuthor($this);
    }
}
