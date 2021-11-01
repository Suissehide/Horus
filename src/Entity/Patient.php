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

    public function __construct()
    {
        $this->erreurs = new ArrayCollection();
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
}
