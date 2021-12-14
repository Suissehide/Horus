<?php

namespace App\Entity;

use App\Repository\ProtocoleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProtocoleRepository::class)
 */
class Protocole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $fiches = [];

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\MedicamentsEntree", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $medicamentsEntree;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AngioplastiePontage", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $angioplastiePontage;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\BFR", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $BFR;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Catheterisation", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $catheterisation;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Echocardiographie", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $echocardiographie;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\EchographieVasculaire", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $echographieVasculaire;
    
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NeuroImagerie", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $neuroImagerie;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\NeuroPsychologie", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $neuroPsychologie;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TestEffort", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $testEffort;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Visite", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $visite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiches(): ?array
    {
        return $this->fiches;
    }

    public function setFiches(?array $fiches): self
    {
        $this->fiches = $fiches;

        return $this;
    }
    
    public function getMedicamentsEntree(): ?MedicamentsEntree
    {
        return $this->medicamentsEntree;
    }

    public function setMedicamentsEntree(?MedicamentsEntree $medicamentsEntree): self
    {
        $this->medicamentsEntree = $medicamentsEntree;

        return $this;
    }

    public function getAngioplastiePontage(): ?AngioplastiePontage
    {
        return $this->angioplastiePontage;
    }

    public function setAngioplastiePontage(?AngioplastiePontage $angioplastiePontage): self
    {
        $this->angioplastiePontage = $angioplastiePontage;

        return $this;
    }

    public function getBFR(): ?BFR
    {
        return $this->BFR;
    }

    public function setBFR(?BFR $BFR): self
    {
        $this->BFR = $BFR;

        return $this;
    }

    public function getCatheterisation(): ?Catheterisation
    {
        return $this->catheterisation;
    }

    public function setCatheterisation(?Catheterisation $catheterisation): self
    {
        $this->catheterisation = $catheterisation;

        return $this;
    }

    public function getEchocardiographie(): ?Echocardiographie
    {
        return $this->echocardiographie;
    }

    public function setEchocardiographie(?Echocardiographie $echocardiographie): self
    {
        $this->echocardiographie = $echocardiographie;

        return $this;
    }

    public function getEchographieVasculaire(): ?EchographieVasculaire
    {
        return $this->echographieVasculaire;
    }

    public function setEchographieVasculaire(?EchographieVasculaire $echographieVasculaire): self
    {
        $this->echographieVasculaire = $echographieVasculaire;

        return $this;
    }

    public function getNeuroImagerie(): ?NeuroImagerie
    {
        return $this->neuroImagerie;
    }

    public function setNeuroImagerie(?NeuroImagerie $neuroImagerie): self
    {
        $this->neuroImagerie = $neuroImagerie;

        return $this;
    }

    public function getNeuroPsychologie(): ?NeuroPsychologie
    {
        return $this->neuroPsychologie;
    }

    public function setNeuroPsychologie(?NeuroPsychologie $neuroPsychologie): self
    {
        $this->neuroPsychologie = $neuroPsychologie;

        return $this;
    }

    public function getTestEffort(): ?TestEffort
    {
        return $this->testEffort;
    }

    public function setTestEffort(?TestEffort $testEffort): self
    {
        $this->testEffort = $testEffort;

        return $this;
    }

    public function getVisite(): ?Visite
    {
        return $this->visite;
    }

    public function setVisite(?Visite $visite): self
    {
        $this->visite = $visite;

        return $this;
    }
}
