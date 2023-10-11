<?php

namespace App\Entity;

use App\Repository\WishlistItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: WishlistItemRepository::class)]
class WishlistItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produits $product = null;


    #[ORM\Column(type: "integer")]
    #[Assert\NotBlank]
    #[Assert\GreaterThanOrEqual(1)]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Wishlist $order = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Produits
    {
        return $this->product;
    }

    public function setProduct(?Produits $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrder(): ?Wishlist
    {
        return $this->order;
    }

    public function setOrder(?Wishlist $order): static
    {
        $this->order = $order;

        return $this;
    }
    public function equals(WishlistItem $item): bool
    {
        return $this->getProduct()->getId() === $item->getProduct()->getId();
    }
    public function getTotal(): float
    {
        return $this->getProduct()->getPrix() * $this->getQuantity();
    }
}
