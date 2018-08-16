<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * Validation : contrainte d'unicité sur le nom de la categorie
 * @UniqueEntity(fields={"name"}, message="Il existe déjà une catégorie du cul avec ce nom")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     * Validation : non vide
     * @Assert\NotBlank(message="Le nom est obligatoire du cul")
     * Validation : nombre de caractères
     * @Assert\Length(max="20",
     *     maxMessage="Le nom ne doit pas dépasser {{ limit }} caractères du cul"
     * )
     */
    private $name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Article", mappedBy="category")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    /**
     * @param Collection $articles
     * @return Category
     */
    public function setArticles(Collection $articles): Category
    {
        $this->articles = $articles;
        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

}
