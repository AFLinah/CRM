<?php

namespace App\Entity;

use App\Repository\AchatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchatRepository::class)]
class Achat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Ref_achat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date_achat = null;

    #[ORM\Column(length: 255)]
    private ?string $Statut_payement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Statut_livraison = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $Client = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $Produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefAchat(): ?string
    {
        return $this->Ref_achat;
    }

    public function setRefAchat(string $Ref_achat): static
    {
        $this->Ref_achat = $Ref_achat;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->Date_achat;
    }

    public function setDateAchat(\DateTimeInterface $Date_achat): static
    {
        $this->Date_achat = $Date_achat;

        return $this;
    }

    public function getStatutPayement(): ?string
    {
        return $this->Statut_payement;
    }

    public function setStatutPayement(string $Statut_payement): static
    {
        $this->Statut_payement = $Statut_payement;

        return $this;
    }

    public function getStatutLivraison(): ?string
    {
        return $this->Statut_livraison;
    }

    public function setStatutLivraison(?string $Statut_livraison): static
    {
        $this->Statut_livraison = $Statut_livraison;

        return $this;
    }

    // 
    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->Produit;
    }

    public function setProduit(?Produit $Produit): static
    {
        $this->Produit = $Produit;

        return $this;
    }
}
