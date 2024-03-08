<?php

namespace App\Entity;

use App\Repository\PrevoirRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrevoirRepository::class)]
class Prevoir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePrevision = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\ManyToOne(inversedBy: 'prevoirs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'prevoirs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Plats $plats = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePrevision(): ?\DateTimeInterface
    {
        return $this->datePrevision;
    }

    public function setDatePrevision(\DateTimeInterface $datePrevision): static
    {
        $this->datePrevision = $datePrevision;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateurs
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateurs $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

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
}
