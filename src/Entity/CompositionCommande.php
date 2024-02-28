<?php

namespace App\Entity;

use App\Repository\CompositionCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompositionCommandeRepository::class)]
class CompositionCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Plats $plats = null;

    #[ORM\ManyToOne(inversedBy: 'compositionCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPlats(): ?Plats
    {
        return $this->plats;
    }

    public function setPlats(?Plats $plats): static
    {
        $this->plats = $plats;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }
}
