<?php

namespace App\Entity;

use App\Repository\FoodTruckRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoodTruckRepository::class)]
class FoodTruck
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\OneToOne(mappedBy: 'foodTruck', cascade: ['persist', 'remove'])]
    private ?Utilisateurs $restaurateur = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 14)]
    private ?string $siret = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getRestaurateur(): ?Utilisateurs
    {
        return $this->restaurateur;
    }

    public function setRestaurateur(?Utilisateurs $restaurateur): static
    {
        // unset the owning side of the relation if necessary
        if ($restaurateur === null && $this->restaurateur !== null) {
            $this->restaurateur->setFoodTruck(null);
        }

        // set the owning side of the relation if necessary
        if ($restaurateur !== null && $restaurateur->getFoodTruck() !== $this) {
            $restaurateur->setFoodTruck($this);
        }

        $this->restaurateur = $restaurateur;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }
}
