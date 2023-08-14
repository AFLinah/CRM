<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Ref_client = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_client = null;

    #[ORM\Column(length: 50)]
    private ?string $Adresse_client = null;

    #[ORM\Column(length: 50)]
    private ?string $Email_client = null;

    #[ORM\Column(length: 50)]
    private ?string $Telephone_client = null;

    #[ORM\ManyToMany(targetEntity: Produit::class, inversedBy: 'clients')]
    private Collection $Produits;

    #[ORM\ManyToMany(targetEntity: Service::class, inversedBy: 'clients')]
    private Collection $Services;

    // #[ORM\OneToMany(mappedBy: 'client', targetEntity: Produit::class)]
    // private Collection $produitsAchetes;

    // #[ORM\OneToMany(mappedBy: 'client', targetEntity: Service::class)]
    // private Collection $servicesLoues;

    public function __construct()
    {
        // $this->produitsAchetes = new ArrayCollection();
        // $this->servicesLoues = new ArrayCollection();
        $this->Produits = new ArrayCollection();
        $this->Services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // 
    public function __toString(): string
    {
        return $this->Ref_client;
    }
    //

    public function getRefClient(): ?string
    {
        return $this->Ref_client;
    }

    public function setRefClient(string $Ref_client): static
    {
        $this->Ref_client = $Ref_client;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->Nom_client;
    }

    public function setNomClient(string $Nom_client): static
    {
        $this->Nom_client = $Nom_client;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->Adresse_client;
    }

    public function setAdresseClient(string $Adresse_client): static
    {
        $this->Adresse_client = $Adresse_client;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->Email_client;
    }

    public function setEmailClient(string $Email_client): static
    {
        $this->Email_client = $Email_client;

        return $this;
    }

    public function getTelephoneClient(): ?string
    {
        return $this->Telephone_client;
    }

    public function setTelephoneClient(string $Telephone_client): static
    {
        $this->Telephone_client = $Telephone_client;

        return $this;
    }

    // /**
    //  * @return Collection<int, Produit>
    //  */
    // public function getProduitsAchetes(): collection
    // {
    //     return $this->produitsAchetes;
    // }

    // public function addProduitsAchete(Produit $produitsAchete): static
    // {
    //     if (!$this->produitsAchetes->contains($produitsAchete)) {
    //         $this->produitsAchetes->add($produitsAchete);
    //         $produitsAchete->setClient($this);
    //     }
    //     return $this;
    // }

    // public function removeProduitsAchete(Produit $produitsAchete): static
    // {
    //     if ($this->produitsAchetes->removeElement($produitsAchete)) {
    //         // set the owning side to null (unless already changed)
    //         if ($produitsAchete->getClient() === $this) {
    //             $produitsAchete->setClient(null);
    //         }
    //     }

    //     return $this;
    // }

    // /**
    //  * @return Collection<int, Service>
    //  */
    // public function getServicesLoues(): collection
    // {
    //     return $this->servicesLoues;
    // }

    // public function addServicesLoue(Service $servicesLoue): static
    // {
    //     if (!$this->servicesLoues->contains($servicesLoue)) {
    //         $this->servicesLoues->add($servicesLoue);
    //         $servicesLoue->setClient($this);
    //     }

    //     return $this;
    // }

    // public function removeServicesLoue(Service $servicesLoue): static
    // {
    //     if ($this->servicesLoues->removeElement($servicesLoue)) {
    //         // set the owning side to null (unless already changed)
    //         if ($servicesLoue->getClient() === $this) {
    //             $servicesLoue->setClient(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->Produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->Produits->contains($produit)) {
            $this->Produits->add($produit);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        $this->Produits->removeElement($produit);

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->Services;
    }

    public function addService(Service $service): static
    {
        if (!$this->Services->contains($service)) {
            $this->Services->add($service);
        }

        return $this;
    }

    public function removeService(Service $service): static
    {
        $this->Services->removeElement($service);

        return $this;
    }
}
