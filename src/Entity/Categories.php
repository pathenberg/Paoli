<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: SmallCategories::class)]
    private Collection $smallCategories;

    public function __construct()
    {
        $this->smallCategories = new ArrayCollection();
    }



   

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Produits>
     */

    /**
     * @return Collection<int, SmallCategories>
     */
    public function getSmallCategories(): Collection
    {
        return $this->smallCategories;
    }

    public function addSmallCategory(SmallCategories $smallCategory): static
    {
        if (!$this->smallCategories->contains($smallCategory)) {
            $this->smallCategories->add($smallCategory);
            $smallCategory->setCategory($this);
        }

        return $this;
    }

    public function removeSmallCategory(SmallCategories $smallCategory): static
    {
        if ($this->smallCategories->removeElement($smallCategory)) {
            // set the owning side to null (unless already changed)
            if ($smallCategory->getCategory() === $this) {
                $smallCategory->setCategory(null);
            }
        }

        return $this;
    }
   

    public function __toString(){
        return $this->getNom();
    }
    
}
