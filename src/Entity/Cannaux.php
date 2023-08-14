<?php

namespace App\Entity;

use App\Repository\CannauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CannauxRepository::class)]
class Cannaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Ref_canal = null;

    #[ORM\Column(length: 255)]
    public ?string $Nom_canal = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Type = null;

    #[ORM\ManyToMany(targetEntity: Cible::class, inversedBy: 'canal')]
    private Collection $cible;

    public function __construct()
    {
        $this->cible = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefCanal(): ?string
    {
        return $this->Ref_canal;
    }

    public function setRefCanal(string $Ref_canal): static
    {
        $this->Ref_canal = $Ref_canal;

        return $this;
    }

    public function getNomCanal(): ?string
    {
        return $this->Nom_canal;
    }

    public function setNomCanal(string $Nom_canal): static
    {
        $this->Nom_canal = $Nom_canal;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(?string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection<int, Cible>
     */
    public function getCible(): Collection
    {
        return $this->cible;
    }

    public function addCible(Cible $cible): static
    {
        if (!$this->cible->contains($cible)) {
            $this->cible->add($cible);
        }

        return $this;
    }

    public function removeCible(Cible $cible): static
    {
        $this->cible->removeElement($cible);

        return $this;
    }
}
