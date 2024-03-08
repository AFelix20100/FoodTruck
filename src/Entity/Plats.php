<?php

namespace App\Entity;

use App\Repository\PlatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatsRepository::class)]
class Plats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\ManyToOne(inversedBy: 'plats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(targetEntity: Prevoir::class, mappedBy: 'plats', orphanRemoval: true)]
    private Collection $prevoirs;

    public function __construct()
    {
        $this->prevoirs = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

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

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Prevoir>
     */
    public function getPrevoirs(): Collection
    {
        return $this->prevoirs;
    }

    public function addPrevoir(Prevoir $prevoir): static
    {
        if (!$this->prevoirs->contains($prevoir)) {
            $this->prevoirs->add($prevoir);
            $prevoir->setPlats($this);
        }

        return $this;
    }

    public function removePrevoir(Prevoir $prevoir): static
    {
        if ($this->prevoirs->removeElement($prevoir)) {
            // set the owning side to null (unless already changed)
            if ($prevoir->getPlats() === $this) {
                $prevoir->setPlats(null);
            }
        }

        return $this;
    }
}
