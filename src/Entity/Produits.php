<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Categories $category = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codeOrdi = null;

    #[ORM\Column(length: 4)]
    private ?string $taille = null;

    #[ORM\Column]
    private ?int $poids = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column]
    private ?float $carats = null;

    #[ORM\Column(length: 50)]
    private ?string $couleur = null;

    #[ORM\Column]
    private ?int $Prix = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?SmallCategories $smallCategory = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

 

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Picture = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getCodeOrdi(): ?string
    {
        return $this->codeOrdi;
    }

    public function setCodeOrdi(?string $codeOrdi): static
    {
        $this->codeOrdi = $codeOrdi;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCarats(): ?float
    {
        return $this->carats;
    }

    public function setCarats(float $carats): static
    {
        $this->carats = $carats;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getSmallCategory(): ?SmallCategories
    {
        return $this->smallCategory;
    }

    public function setSmallCategory(?SmallCategories $smallCategory): static
    {
        $this->smallCategory = $smallCategory;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->Picture;
    }

    public function setPicture(string $Picture): static
    {
        $this->Picture = $Picture;

        return $this;
    }
}
