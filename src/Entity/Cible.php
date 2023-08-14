<?php

namespace App\Entity; 

use App\Repository\CibleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CibleRepository::class)]
class Cible
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Ref_cible = null;

    #[ORM\Column(length: 255)]
    private ?string $Localisation = null;

    #[ORM\Column(length: 255)]
    private ?string $Activite = null;

    #[ORM\Column(length: 255)]
    public ?string $Nom_cible = null;

    #[ORM\ManyToMany(targetEntity: Cannaux::class, mappedBy: 'cible')]
    private Collection $canal;

    #[ORM\ManyToMany(targetEntity: Produit::class, mappedBy: 'cible')]
    private Collection $produits;

    #[ORM\ManyToMany(targetEntity: Service::class, mappedBy: 'Cible')]
    private Collection $Service;

    public function __construct()
    {
        $this->canal = new ArrayCollection();
        $this->produits = new ArrayCollection();
        $this->Service = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefCible(): ?string
    {
        return $this->Ref_cible;
    }

    public function setRefCible(string $Ref_cible): static
    {
        $this->Ref_cible = $Ref_cible;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->Localisation;
    }

    public function setLocalisation(string $Localisation): static
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->Activite;
    }

    public function setActivite(string $Activite): static
    {
        $this->Activite = $Activite;

        return $this;
    }

    public function getNomCible(): ?string
    {
        return $this->Nom_cible;
    }

    public function setNomCible(string $Nom_cible): static
    {
        $this->Nom_cible = $Nom_cible;

        return $this;
    }

    /**
     * @return Collection<int, Cannaux>
     */
    public function getCanal(): Collection
    {
        return $this->canal;
    }

    public function addCanal(Cannaux $canal): static
    {
        if (!$this->canal->contains($canal)) {
            $this->canal->add($canal);
            $canal->addCible($this);
        }
        return $this;
    }

    public function removeCanal(Cannaux $canal): static
    {
        if ($this->canal->removeElement($canal)) {
            $canal->removeCible($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->addCible($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeCible($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->Service;
    }

    public function addService(Service $service): static
    {
        if (!$this->Service->contains($service)) {
            $this->Service->add($service);
            $service->addCible($this);
        }

        return $this;
    }

    public function removeService(Service $service): static
    {
        if ($this->Service->removeElement($service)) {
            $service->removeCible($this);
        }

        return $this;
    }
}
