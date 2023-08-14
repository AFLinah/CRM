<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Ref_service = null;

    #[ORM\Column(length: 255)]
    public ?string $Nom_service = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(nullable: true)]
    private ?float $Tarif_horaire = null;

    #[ORM\Column(length: 255)]
    private ?string $Statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Zone_geographique = null;

    // #[ORM\ManyToOne(inversedBy: 'servicesLoues')]
    // private ?Client $client = null;

    #[ORM\ManyToMany(targetEntity: Cible::class, inversedBy: 'Service')]
    private Collection $Cible;

    #[ORM\ManyToMany(targetEntity: Client::class, mappedBy: 'Services')]
    private Collection $clients;

    public function __construct()
    {
        $this->Cible = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // 
    public function __toString(): string
    {
        return $this->Ref_service; 
    }
    //

    public function getRefService(): ?string
    {
        return $this->Ref_service;
    }

    public function setRefService(string $Ref_service): static
    {
        $this->Ref_service = $Ref_service;

        return $this;
    }

    public function getNomService(): ?string
    {
        return $this->Nom_service;
    }

    public function setNomService(string $Nom_service): static
    {
        $this->Nom_service = $Nom_service;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getTarifHoraire(): ?float
    {
        return $this->Tarif_horaire;
    }

    public function setTarifHoraire(?float $Tarif_horaire): static
    {
        $this->Tarif_horaire = $Tarif_horaire;

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

    public function getZoneGeographique(): ?string
    {
        return $this->Zone_geographique;
    }

    public function setZoneGeographique(?string $Zone_geographique): static
    {
        $this->Zone_geographique = $Zone_geographique;

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
        return $this->Cible;
    }

    public function addCible(Cible $cible): static
    {
        if (!$this->Cible->contains($cible)) {
            $this->Cible->add($cible);
        }

        return $this;
    }

    public function removeCible(Cible $cible): static
    {
        $this->Cible->removeElement($cible);

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
            $client->addService($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->clients->removeElement($client)) {
            $client->removeService($this);
        }

        return $this;
    }
}