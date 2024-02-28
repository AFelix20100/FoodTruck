<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?float $total = null;

    #[ORM\OneToMany(targetEntity: CompositionCommande::class, mappedBy: 'commande', orphanRemoval: true)]
    private Collection $compositionCommandes;

    public function __construct()
    {
        $this->compositionCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): static
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): static
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection<int, CompositionCommande>
     */
    public function getCompositionCommandes(): Collection
    {
        return $this->compositionCommandes;
    }

    public function addCompositionCommande(CompositionCommande $compositionCommande): static
    {
        if (!$this->compositionCommandes->contains($compositionCommande)) {
            $this->compositionCommandes->add($compositionCommande);
            $compositionCommande->setCommande($this);
        }

        return $this;
    }

    public function removeCompositionCommande(CompositionCommande $compositionCommande): static
    {
        if ($this->compositionCommandes->removeElement($compositionCommande)) {
            // set the owning side to null (unless already changed)
            if ($compositionCommande->getCommande() === $this) {
                $compositionCommande->setCommande(null);
            }
        }

        return $this;
    }
}
