<?php

namespace App\Entity;

use App\Repository\FacteurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FacteurRepository::class)]
class Facteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $risqueHTA;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $depuisHTA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $traiteHTA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $risqueDiabete;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $depuisDiabete;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $traiteDiabete;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $risqueHypercholesterolemie;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $depuisHypercholesterolemie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $traiteHypercholesterolemie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $risqueHypertriglyceridemie;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $depuisHypertriglyceridemie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $traiteHypertriglyceridemie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $obesite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $alcoolisme;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sevre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tabagisme;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateArret;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nombrePaquetsAn;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $antecedentFamiliaux;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $cannabis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRisqueHTA(): ?string
    {
        return $this->risqueHTA;
    }

    public function setRisqueHTA(?string $risqueHTA): self
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

    public function getTraiteHTA(): ?string
    {
        return $this->traiteHTA;
    }

    public function setTraiteHTA(?string $traiteHTA): self
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

    public function getTraiteDiabete(): ?string
    {
        return $this->traiteDiabete;
    }

    public function setTraiteDiabete(?string $traiteDiabete): self
    {
        $this->traiteDiabete = $traiteDiabete;

        return $this;
    }

    public function getRisqueHypercholesterolemie(): ?string
    {
        return $this->risqueHypercholesterolemie;
    }

    public function setRisqueHypercholesterolemie(?string $risqueHypercholesterolemie): self
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

    public function getTraiteHypercholesterolemie(): ?string
    {
        return $this->traiteHypercholesterolemie;
    }

    public function setTraiteHypercholesterolemie(?string $traiteHypercholesterolemie): self
    {
        $this->traiteHypercholesterolemie = $traiteHypercholesterolemie;

        return $this;
    }

    public function getRisqueHypertriglyceridemie(): ?string
    {
        return $this->risqueHypertriglyceridemie;
    }

    public function setRisqueHypertriglyceridemie(?string $risqueHypertriglyceridemie): self
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

    public function getTraiteHypertriglyceridemie(): ?string
    {
        return $this->traiteHypertriglyceridemie;
    }

    public function setTraiteHypertriglyceridemie(?string $traiteHypertriglyceridemie): self
    {
        $this->traiteHypertriglyceridemie = $traiteHypertriglyceridemie;

        return $this;
    }

    public function getObesite(): ?string
    {
        return $this->obesite;
    }

    public function setObesite(?string $obesite): self
    {
        $this->obesite = $obesite;

        return $this;
    }

    public function getAlcoolisme(): ?string
    {
        return $this->alcoolisme;
    }

    public function setAlcoolisme(?string $alcoolisme): self
    {
        $this->alcoolisme = $alcoolisme;

        return $this;
    }

    public function getSevre(): ?string
    {
        return $this->sevre;
    }

    public function setSevre(?string $sevre): self
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

    public function getAntecedentFamiliaux(): ?string
    {
        return $this->antecedentFamiliaux;
    }

    public function setAntecedentFamiliaux(?string $antecedentFamiliaux): self
    {
        $this->antecedentFamiliaux = $antecedentFamiliaux;

        return $this;
    }

    public function getCannabis(): ?string
    {
        return $this->cannabis;
    }

    public function setCannabis(?string $cannabis): self
    {
        $this->cannabis = $cannabis;

        return $this;
    }
}
