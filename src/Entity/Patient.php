<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\General", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $general;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AntecedentCardiovasculaire", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $antecedentCardiovasculaire;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Information", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $information;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Facteur", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $facteur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Protocole", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $protocole;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Erreur", mappedBy="patient", cascade={"remove"})
     */
    private $erreurs;

    /**
     * @ORM\OneToMany(targetEntity=Suivi::class, mappedBy="patient", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $suivis;

    public function __construct()
    {
        $this->erreurs = new ArrayCollection();
        $this->suivis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeneral(): ?General
    {
        return $this->general;
    }

    public function setGeneral(?General $general): self
    {
        $this->general = $general;

        return $this;
    }

    public function getAntecedentCardiovasculaire(): ?AntecedentCardiovasculaire
    {
        return $this->antecedentCardiovasculaire;
    }

    public function setAntecedentCardiovasculaire(?AntecedentCardiovasculaire $antecedentCardiovasculaire): self
    {
        $this->antecedentCardiovasculaire = $antecedentCardiovasculaire;

        return $this;
    }

    public function getInformation(): ?Information
    {
        return $this->information;
    }

    public function setInformation(?Information $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getFacteur(): ?Facteur
    {
        return $this->facteur;
    }

    public function setFacteur(?Facteur $facteur): self
    {
        $this->facteur = $facteur;

        return $this;
    }

    public function getProtocole(): ?Protocole
    {
        return $this->protocole;
    }

    public function setProtocole(?Protocole $protocole): self
    {
        $this->protocole = $protocole;

        return $this;
    }
    
    /**
     * @return Collection|Erreur[]
     */
    public function getErreurs(): Collection
    {
        return $this->erreurs;
    }

    public function addErreur(Erreur $erreur): self
    {
        if (!$this->erreurs->contains($erreur)) {
            $this->erreurs[] = $erreur;
            $erreur->setPatient($this);
        }

        return $this;
    }

    public function removeErreur(Erreur $erreur): self
    {
        if ($this->erreurs->contains($erreur)) {
            $this->erreurs->removeElement($erreur);
            // set the owning side to null (unless already changed)
            if ($erreur->getPatient() === $this) {
                $erreur->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Suivi>
     */
    public function getSuivis(): Collection
    {
        return $this->suivis;
    }

    public function addSuivi(Suivi $suivi): self
    {
        if (!$this->suivis->contains($suivi)) {
            $this->suivis[] = $suivi;
            $suivi->setPatient($this);
        }

        return $this;
    }

    public function removeSuivi(Suivi $suivi): self
    {
        if ($this->suivis->removeElement($suivi)) {
            // set the owning side to null (unless already changed)
            if ($suivi->getPatient() === $this) {
                $suivi->setPatient(null);
            }
        }

        return $this;
    }
}
