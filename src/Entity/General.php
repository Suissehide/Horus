<?php

namespace App\Entity;

use App\Repository\GeneralRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GeneralRepository::class)]
class General
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $civilite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $prenom;

    #[ORM\Column(type: 'date', nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $dateNaissance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $sexe;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $nomNaissance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $profession;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $statutActuel;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private $niveauEtude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNomNaissance(): ?string
    {
        return $this->nomNaissance;
    }

    public function setNomNaissance(?string $nomNaissance): self
    {
        $this->nomNaissance = $nomNaissance;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getStatutActuel(): ?string
    {
        return $this->statutActuel;
    }

    public function setStatutActuel(?string $statutActuel): self
    {
        $this->statutActuel = $statutActuel;

        return $this;
    }

    public function getNiveauEtude(): ?string
    {
        return $this->niveauEtude;
    }

    public function setNiveauEtude(?string $niveauEtude): self
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }
}
