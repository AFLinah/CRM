<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Ref_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Mot_de_passe = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Email_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Telephone_utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefUtilisateur(): ?string
    {
        return $this->Ref_utilisateur;
    }

    public function setRefUtilisateur(string $Ref_utilisateur): static
    {
        $this->Ref_utilisateur = $Ref_utilisateur;

        return $this;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->Nom_utilisateur;
    }

    public function setNomUtilisateur(string $Nom_utilisateur): static
    {
        $this->Nom_utilisateur = $Nom_utilisateur;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->Mot_de_passe;
    }

    public function setMotDePasse(string $Mot_de_passe): static
    {
        $this->Mot_de_passe = $Mot_de_passe;

        return $this;
    }

    public function getAdresseUtilisateur(): ?string
    {
        return $this->Adresse_utilisateur;
    }

    public function setAdresseUtilisateur(string $Adresse_utilisateur): static
    {
        $this->Adresse_utilisateur = $Adresse_utilisateur;

        return $this;
    }

    public function getEmailUtilisateur(): ?string
    {
        return $this->Email_utilisateur;
    }

    public function setEmailUtilisateur(string $Email_utilisateur): static
    {
        $this->Email_utilisateur = $Email_utilisateur;

        return $this;
    }

    public function getTelephoneUtilisateur(): ?string
    {
        return $this->Telephone_utilisateur;
    }

    public function setTelephoneUtilisateur(string $Telephone_utilisateur): static
    {
        $this->Telephone_utilisateur = $Telephone_utilisateur;

        return $this;
    }
}
