<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(targetEntity: 'App\Entity\General', cascade: ['persist', 'remove'])]
    #[Groups(['advancement', 'export'])]
    private $general;

    #[ORM\OneToOne(targetEntity: 'App\Entity\AntecedentCardiovasculaire', cascade: ['persist', 'remove'])]
    #[Groups(['advancement', 'export'])]
    private $antecedentCardiovasculaire;

    #[ORM\OneToOne(targetEntity: 'App\Entity\Information', cascade: ['persist', 'remove'])]
    #[Groups(['advancement', 'export'])]
    private $information;

    #[ORM\OneToOne(targetEntity: 'App\Entity\Facteur', cascade: ['persist', 'remove'])]
    #[Groups(['advancement', 'export'])]
    private $facteur;

    #[ORM\OneToMany(targetEntity: 'App\Entity\Erreur', mappedBy: 'patient', cascade: ['remove'])]
    private $erreurs;

    #[ORM\OneToMany(targetEntity: Visite::class, mappedBy: 'patient', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private $visites;

    public function __construct()
    {
        $this->erreurs = new ArrayCollection();
        $this->visites = new ArrayCollection();
    }

    public function serializer()
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->serialize($this, 'json', [
            'groups' => 'advancement',
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            },
        ]);
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

    /**
     * @return Collection<int, Erreur>
     */
    public function getErreurs(): Collection
    {
        return $this->erreurs;
    }

    public function addErreur(Erreur $erreur): self
    {
        if (!$this->erreurs->contains($erreur)) {
            $this->erreurs->add($erreur);
            $erreur->setPatient($this);
        }

        return $this;
    }

    public function removeErreur(Erreur $erreur): self
    {
        if ($this->erreurs->removeElement($erreur)) {
            // set the owning side to null (unless already changed)
            if ($erreur->getPatient() === $this) {
                $erreur->setPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Visite>
     */
    public function getVisites(): Collection
    {
        return $this->visites;
    }

    public function addVisite(Visite $visite): self
    {
        if (!$this->visites->contains($visite)) {
            $this->visites->add($visite);
            $visite->setPatient($this);
        }

        return $this;
    }

    public function removeVisite(Visite $visite): self
    {
        if ($this->visites->removeElement($visite)) {
            // set the owning side to null (unless already changed)
            if ($visite->getPatient() === $this) {
                $visite->setPatient(null);
            }
        }

        return $this;
    }
}
