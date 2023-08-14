<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Ref_produit = null;

    #[ORM\Column(length: 255)]
    public ?string $Nom_produit = null;

    #[ORM\Column(length: 255)]
    private ?string $Categorie = null;

    #[ORM\Column]
    private ?float $Prix = null;

    #[ORM\Column(length: 50)]
    private ?string $Statut = null;

    #[ORM\Column(length: 10)]
    private ?string $Unite = null;

    // #[ORM\ManyToOne(inversedBy: 'produitsAchetes')]
    // private ?Client $client = null;

    #[ORM\ManyToMany(targetEntity: Cible::class, inversedBy: 'produits')]
    private Collection $cible;

    #[ORM\ManyToMany(targetEntity: Client::class, mappedBy: 'Produits')]
    private Collection $clients;

    public function __construct()
    {
        $this->cible = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // 
    public function __toString(): string
    {
        return $this->Ref_produit; 
    }
    // 

    public function getRefProduit(): ?string
    {
        return $this->Ref_produit;
    }

    public function setRefProduit(string $Ref_produit): static
    {
        $this->Ref_produit = $Ref_produit;

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->Nom_produit;
    }

    public function setNomProduit(string $Nom_produit): static
    {
        $this->Nom_produit = $Nom_produit;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): static
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->Statut;
    }

    public function setStatut(string $Statut): static
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->Unite;
    }

    public function setUnite(string $Unite): static
    {
        $this->Unite = $Unite;

        return $this;
    }

    // public function getClient(): ?Client
    // {
    //     return $this->client;
    // }

    // public function setClient(?Client $client): static
    // {
    //     $this->client = $client;

    //     return $this;
    // }

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

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->addProduit($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->clients->removeElement($client)) {
            $client->removeProduit($this);
        }

        return $this;
    }
}
