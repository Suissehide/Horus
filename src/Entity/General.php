<?php

namespace App\Entity;

use App\Repository\GeneralRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeneralRepository::class)
 * @ORM\Table(name="`general`")
 */
class General
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $civilite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activiteProfessionnelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationFamiliale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $enfant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statutActuel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
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

    public function getActiviteProfessionnelle(): ?string
    {
        return $this->activiteProfessionnelle;
    }

    public function setActiviteProfessionnelle(?string $activiteProfessionnelle): self
    {
        $this->activiteProfessionnelle = $activiteProfessionnelle;

        return $this;
    }

    public function getSituationFamiliale(): ?string
    {
        return $this->situationFamiliale;
    }

    public function setSituationFamiliale(?string $situationFamiliale): self
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }

    public function getEnfant(): ?string
    {
        return $this->enfant;
    }

    public function setEnfant(?string $enfant): self
    {
        $this->enfant = $enfant;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
