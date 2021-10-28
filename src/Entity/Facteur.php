<?php

namespace App\Entity;

use App\Repository\FacteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacteurRepository::class)
 */
class Facteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $poids;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $tourTaille;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $tensionArterielleJour;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $tensionArterielleNuit;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $risqueHTA;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $depuisHTA;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $traiteHTA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $risqueDiabete;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $depuisDiabete;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $traiteDiabete;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $risqueHypercholesterolemie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $depuisHypercholesterolemie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $traiteHypercholesterolemie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $risqueHypertriglyceridemie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $depuisHypertriglyceridemie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $traiteHypertriglyceridemie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $obesite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $alcoolisme;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sevre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tabagisme;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateArret;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombrePaquetsAn;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $antecedentFamiliaux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTourTaille(): ?string
    {
        return $this->tourTaille;
    }

    public function setTourTaille(?string $tourTaille): self
    {
        $this->tourTaille = $tourTaille;

        return $this;
    }

    public function getTensionArterielleJour(): ?string
    {
        return $this->tensionArterielleJour;
    }

    public function setTensionArterielleJour(?string $tensionArterielleJour): self
    {
        $this->tensionArterielleJour = $tensionArterielleJour;

        return $this;
    }

    public function getTensionArterielleNuit(): ?string
    {
        return $this->tensionArterielleNuit;
    }

    public function setTensionArterielleNuit(?string $tensionArterielleNuit): self
    {
        $this->tensionArterielleNuit = $tensionArterielleNuit;

        return $this;
    }

    public function getRisqueHTA(): ?bool
    {
        return $this->risqueHTA;
    }

    public function setRisqueHTA(?bool $risqueHTA): self
    {
        $this->risqueHTA = $risqueHTA;

        return $this;
    }

    public function getDepuisHTA(): ?int
    {
        return $this->depuisHTA;
    }

    public function setDepuisHTA(?int $depuisHTA): self
    {
        $this->depuisHTA = $depuisHTA;

        return $this;
    }

    public function getTraiteHTA(): ?bool
    {
        return $this->traiteHTA;
    }

    public function setTraiteHTA(?bool $traiteHTA): self
    {
        $this->traiteHTA = $traiteHTA;

        return $this;
    }

    public function getRisqueDiabete(): ?string
    {
        return $this->risqueDiabete;
    }

    public function setRisqueDiabete(?string $risqueDiabete): self
    {
        $this->risqueDiabete = $risqueDiabete;

        return $this;
    }

    public function getDepuisDiabete(): ?int
    {
        return $this->depuisDiabete;
    }

    public function setDepuisDiabete(?int $depuisDiabete): self
    {
        $this->depuisDiabete = $depuisDiabete;

        return $this;
    }

    public function getTraiteDiabete(): ?bool
    {
        return $this->traiteDiabete;
    }

    public function setTraiteDiabete(?bool $traiteDiabete): self
    {
        $this->traiteDiabete = $traiteDiabete;

        return $this;
    }

    public function getRisqueHypercholesterolemie(): ?bool
    {
        return $this->risqueHypercholesterolemie;
    }

    public function setRisqueHypercholesterolemie(?bool $risqueHypercholesterolemie): self
    {
        $this->risqueHypercholesterolemie = $risqueHypercholesterolemie;

        return $this;
    }

    public function getDepuisHypercholesterolemie(): ?int
    {
        return $this->depuisHypercholesterolemie;
    }

    public function setDepuisHypercholesterolemie(?int $depuisHypercholesterolemie): self
    {
        $this->depuisHypercholesterolemie = $depuisHypercholesterolemie;

        return $this;
    }

    public function getTraiteHypercholesterolemie(): ?bool
    {
        return $this->traiteHypercholesterolemie;
    }

    public function setTraiteHypercholesterolemie(?bool $traiteHypercholesterolemie): self
    {
        $this->traiteHypercholesterolemie = $traiteHypercholesterolemie;

        return $this;
    }

    public function getRisqueHypertriglyceridemie(): ?bool
    {
        return $this->risqueHypertriglyceridemie;
    }

    public function setRisqueHypertriglyceridemie(?bool $risqueHypertriglyceridemie): self
    {
        $this->risqueHypertriglyceridemie = $risqueHypertriglyceridemie;

        return $this;
    }

    public function getDepuisHypertriglyceridemie(): ?int
    {
        return $this->depuisHypertriglyceridemie;
    }

    public function setDepuisHypertriglyceridemie(?int $depuisHypertriglyceridemie): self
    {
        $this->depuisHypertriglyceridemie = $depuisHypertriglyceridemie;

        return $this;
    }

    public function getTraiteHypertriglyceridemie(): ?bool
    {
        return $this->traiteHypertriglyceridemie;
    }

    public function setTraiteHypertriglyceridemie(?bool $traiteHypertriglyceridemie): self
    {
        $this->traiteHypertriglyceridemie = $traiteHypertriglyceridemie;

        return $this;
    }

    public function getObesite(): ?bool
    {
        return $this->obesite;
    }

    public function setObesite(?bool $obesite): self
    {
        $this->obesite = $obesite;

        return $this;
    }

    public function getAlcoolisme(): ?bool
    {
        return $this->alcoolisme;
    }

    public function setAlcoolisme(?bool $alcoolisme): self
    {
        $this->alcoolisme = $alcoolisme;

        return $this;
    }

    public function getSevre(): ?bool
    {
        return $this->sevre;
    }

    public function setSevre(?bool $sevre): self
    {
        $this->sevre = $sevre;

        return $this;
    }

    public function getTabagisme(): ?string
    {
        return $this->tabagisme;
    }

    public function setTabagisme(?string $tabagisme): self
    {
        $this->tabagisme = $tabagisme;

        return $this;
    }

    public function getDateArret(): ?\DateTimeInterface
    {
        return $this->dateArret;
    }

    public function setDateArret(?\DateTimeInterface $dateArret): self
    {
        $this->dateArret = $dateArret;

        return $this;
    }

    public function getNombrePaquetsAn(): ?int
    {
        return $this->nombrePaquetsAn;
    }

    public function setNombrePaquetsAn(?int $nombrePaquetsAn): self
    {
        $this->nombrePaquetsAn = $nombrePaquetsAn;

        return $this;
    }

    public function getAntecedentFamiliaux(): ?bool
    {
        return $this->antecedentFamiliaux;
    }

    public function setAntecedentFamiliaux(?bool $antecedentFamiliaux): self
    {
        $this->antecedentFamiliaux = $antecedentFamiliaux;

        return $this;
    }
}
