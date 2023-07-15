<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
class Contacts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prénom = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $Téléphone = null;

    #[ORM\Column(length: 200)]
    private ?string $reason = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

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

    public function getPrénom(): ?string
    {
        return $this->prénom;
    }

    public function setPrénom(string $prénom): static
    {
        $this->prénom = $prénom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTéléphone(): ?string
    {
        return $this->Téléphone;
    }

    public function setTéléphone(?string $Téléphone): static
    {
        $this->Téléphone = $Téléphone;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;


        return $this;
    }
}
