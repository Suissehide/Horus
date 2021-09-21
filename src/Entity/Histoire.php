<?php

namespace App\Entity;

use App\Repository\HistoireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoireRepository::class)
 */
class Histoire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $antecedentsExtraCardiaques;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $antecedentsCardioVasculaires;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeEvenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $territoire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $traitementPhaseAigue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultats;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mecanismeASCOD;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sejourSSR;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $symptomeCardiaque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $symptomeNeurologique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $symptomeAutre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $arteriopathie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAntecedentsExtraCardiaques(): ?string
    {
        return $this->antecedentsExtraCardiaques;
    }

    public function setAntecedentsExtraCardiaques(?string $antecedentsExtraCardiaques): self
    {
        $this->antecedentsExtraCardiaques = $antecedentsExtraCardiaques;

        return $this;
    }

    public function getAntecedentsCardioVasculaires(): ?string
    {
        return $this->antecedentsCardioVasculaires;
    }

    public function setAntecedentsCardioVasculaires(?string $antecedentsCardioVasculaires): self
    {
        $this->antecedentsCardioVasculaires = $antecedentsCardioVasculaires;

        return $this;
    }

    public function getTypeEvenement(): ?string
    {
        return $this->typeEvenement;
    }

    public function setTypeEvenement(?string $typeEvenement): self
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    public function getTerritoire(): ?string
    {
        return $this->territoire;
    }

    public function setTerritoire(string $territoire): self
    {
        $this->territoire = $territoire;

        return $this;
    }

    public function getTraitementPhaseAigue(): ?string
    {
        return $this->traitementPhaseAigue;
    }

    public function setTraitementPhaseAigue(?string $traitementPhaseAigue): self
    {
        $this->traitementPhaseAigue = $traitementPhaseAigue;

        return $this;
    }

    public function getResultats(): ?string
    {
        return $this->resultats;
    }

    public function setResultats(string $resultats): self
    {
        $this->resultats = $resultats;

        return $this;
    }

    public function getMecanismeASCOD(): ?string
    {
        return $this->mecanismeASCOD;
    }

    public function setMecanismeASCOD(?string $mecanismeASCOD): self
    {
        $this->mecanismeASCOD = $mecanismeASCOD;

        return $this;
    }

    public function getSejourSSR(): ?string
    {
        return $this->sejourSSR;
    }

    public function setSejourSSR(?string $sejourSSR): self
    {
        $this->sejourSSR = $sejourSSR;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getSymptomeCardiaque(): ?string
    {
        return $this->symptomeCardiaque;
    }

    public function setSymptomeCardiaque(?string $symptomeCardiaque): self
    {
        $this->symptomeCardiaque = $symptomeCardiaque;

        return $this;
    }

    public function getSymptomeNeurologique(): ?string
    {
        return $this->symptomeNeurologique;
    }

    public function setSymptomeNeurologique(?string $symptomeNeurologique): self
    {
        $this->symptomeNeurologique = $symptomeNeurologique;

        return $this;
    }

    public function getSymptomeAutre(): ?string
    {
        return $this->symptomeAutre;
    }

    public function setSymptomeAutre(?string $symptomeAutre): self
    {
        $this->symptomeAutre = $symptomeAutre;

        return $this;
    }

    public function getArteriopathie(): ?string
    {
        return $this->arteriopathie;
    }

    public function setArteriopathie(?string $arteriopathie): self
    {
        $this->arteriopathie = $arteriopathie;

        return $this;
    }
}
