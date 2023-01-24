<?php

namespace App\Entity;

use App\Repository\EchographieVasculaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EchographieVasculaireRepository::class)]
class EchographieVasculaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $carotideInterneDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $carotideInterneGauche;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 4, nullable: true)]
    private $EIMDroit;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 4, nullable: true)]
    private $EIMGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $vertebraleDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $vertebraleGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $carotideCommuneDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $carotideCommuneGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sousClaviereDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sousClaviereGauche;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $TSAAorte;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $membresInferieurAorte;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $iliaqueDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $iliaqueGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $femoraleCommuneDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $femoraleCommuneGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $femoraleSuperficielleDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $femoraleSuperficielleGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $popliteDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $popliteGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $axesJambiersDroits;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $axesJambiersGauches;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $IPSReposDroit;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $IPSReposGauche;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $IPSEffortDroit;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $IPSEffortGauche;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $testStrandnessDistanceMax;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $testStrandnessDistanceGene;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $vitesseOndePouls;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $volumeCarotideDroite;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $volumeCarotideGauche;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $chargeAtheromeTotale;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $IPSGrosOrteilDroit;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $IPSGrosOrteilGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $arretPour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarotideInterneDroite(): ?string
    {
        return $this->carotideInterneDroite;
    }

    public function setCarotideInterneDroite(?string $carotideInterneDroite): self
    {
        $this->carotideInterneDroite = $carotideInterneDroite;

        return $this;
    }

    public function getCarotideInterneGauche(): ?string
    {
        return $this->carotideInterneGauche;
    }

    public function setCarotideInterneGauche(?string $carotideInterneGauche): self
    {
        $this->carotideInterneGauche = $carotideInterneGauche;

        return $this;
    }

    public function getEIMDroit(): ?string
    {
        return $this->EIMDroit;
    }

    public function setEIMDroit(?string $EIMDroit): self
    {
        $this->EIMDroit = $EIMDroit;

        return $this;
    }

    public function getEIMGauche(): ?string
    {
        return $this->EIMGauche;
    }

    public function setEIMGauche(?string $EIMGauche): self
    {
        $this->EIMGauche = $EIMGauche;

        return $this;
    }

    public function getVertebraleDroite(): ?string
    {
        return $this->vertebraleDroite;
    }

    public function setVertebraleDroite(?string $vertebraleDroite): self
    {
        $this->vertebraleDroite = $vertebraleDroite;

        return $this;
    }

    public function getVertebraleGauche(): ?string
    {
        return $this->vertebraleGauche;
    }

    public function setVertebraleGauche(?string $vertebraleGauche): self
    {
        $this->vertebraleGauche = $vertebraleGauche;

        return $this;
    }

    public function getCarotideCommuneDroite(): ?string
    {
        return $this->carotideCommuneDroite;
    }

    public function setCarotideCommuneDroite(?string $carotideCommuneDroite): self
    {
        $this->carotideCommuneDroite = $carotideCommuneDroite;

        return $this;
    }

    public function getCarotideCommuneGauche(): ?string
    {
        return $this->carotideCommuneGauche;
    }

    public function setCarotideCommuneGauche(?string $carotideCommuneGauche): self
    {
        $this->carotideCommuneGauche = $carotideCommuneGauche;

        return $this;
    }

    public function getSousClaviereDroite(): ?string
    {
        return $this->sousClaviereDroite;
    }

    public function setSousClaviereDroite(?string $sousClaviereDroite): self
    {
        $this->sousClaviereDroite = $sousClaviereDroite;

        return $this;
    }

    public function getSousClaviereGauche(): ?string
    {
        return $this->sousClaviereGauche;
    }

    public function setSousClaviereGauche(?string $sousClaviereGauche): self
    {
        $this->sousClaviereGauche = $sousClaviereGauche;

        return $this;
    }

    public function getTSAAorte(): ?string
    {
        return $this->TSAAorte;
    }

    public function setTSAAorte(?string $TSAAorte): self
    {
        $this->TSAAorte = $TSAAorte;

        return $this;
    }

    public function getMembresInferieurAorte(): ?string
    {
        return $this->membresInferieurAorte;
    }

    public function setMembresInferieurAorte(?string $membresInferieurAorte): self
    {
        $this->membresInferieurAorte = $membresInferieurAorte;

        return $this;
    }

    public function getIliaqueDroite(): ?string
    {
        return $this->iliaqueDroite;
    }

    public function setIliaqueDroite(?string $iliaqueDroite): self
    {
        $this->iliaqueDroite = $iliaqueDroite;

        return $this;
    }

    public function getIliaqueGauche(): ?string
    {
        return $this->iliaqueGauche;
    }

    public function setIliaqueGauche(?string $iliaqueGauche): self
    {
        $this->iliaqueGauche = $iliaqueGauche;

        return $this;
    }

    public function getFemoraleCommuneDroite(): ?string
    {
        return $this->femoraleCommuneDroite;
    }

    public function setFemoraleCommuneDroite(?string $femoraleCommuneDroite): self
    {
        $this->femoraleCommuneDroite = $femoraleCommuneDroite;

        return $this;
    }

    public function getFemoraleCommuneGauche(): ?string
    {
        return $this->femoraleCommuneGauche;
    }

    public function setFemoraleCommuneGauche(?string $femoraleCommuneGauche): self
    {
        $this->femoraleCommuneGauche = $femoraleCommuneGauche;

        return $this;
    }

    public function getFemoraleSuperficielleDroite(): ?string
    {
        return $this->femoraleSuperficielleDroite;
    }

    public function setFemoraleSuperficielleDroite(?string $femoraleSuperficielleDroite): self
    {
        $this->femoraleSuperficielleDroite = $femoraleSuperficielleDroite;

        return $this;
    }

    public function getFemoraleSuperficielleGauche(): ?string
    {
        return $this->femoraleSuperficielleGauche;
    }

    public function setFemoraleSuperficielleGauche(?string $femoraleSuperficielleGauche): self
    {
        $this->femoraleSuperficielleGauche = $femoraleSuperficielleGauche;

        return $this;
    }

    public function getPopliteDroite(): ?string
    {
        return $this->popliteDroite;
    }

    public function setPopliteDroite(?string $popliteDroite): self
    {
        $this->popliteDroite = $popliteDroite;

        return $this;
    }

    public function getPopliteGauche(): ?string
    {
        return $this->popliteGauche;
    }

    public function setPopliteGauche(?string $popliteGauche): self
    {
        $this->popliteGauche = $popliteGauche;

        return $this;
    }

    public function getAxesJambiersDroits(): ?string
    {
        return $this->axesJambiersDroits;
    }

    public function setAxesJambiersDroits(?string $axesJambiersDroits): self
    {
        $this->axesJambiersDroits = $axesJambiersDroits;

        return $this;
    }

    public function getAxesJambiersGauches(): ?string
    {
        return $this->axesJambiersGauches;
    }

    public function setAxesJambiersGauches(?string $axesJambiersGauches): self
    {
        $this->axesJambiersGauches = $axesJambiersGauches;

        return $this;
    }

    public function getIPSReposDroit(): ?string
    {
        return $this->IPSReposDroit;
    }

    public function setIPSReposDroit(?string $IPSReposDroit): self
    {
        $this->IPSReposDroit = $IPSReposDroit;

        return $this;
    }

    public function getIPSReposGauche(): ?string
    {
        return $this->IPSReposGauche;
    }

    public function setIPSReposGauche(?string $IPSReposGauche): self
    {
        $this->IPSReposGauche = $IPSReposGauche;

        return $this;
    }

    public function getIPSEffortDroit(): ?string
    {
        return $this->IPSEffortDroit;
    }

    public function setIPSEffortDroit(?string $IPSEffortDroit): self
    {
        $this->IPSEffortDroit = $IPSEffortDroit;

        return $this;
    }

    public function getIPSEffortGauche(): ?string
    {
        return $this->IPSEffortGauche;
    }

    public function setIPSEffortGauche(?string $IPSEffortGauche): self
    {
        $this->IPSEffortGauche = $IPSEffortGauche;

        return $this;
    }

    public function getTestStrandnessDistanceMax(): ?int
    {
        return $this->testStrandnessDistanceMax;
    }

    public function setTestStrandnessDistanceMax(?int $testStrandnessDistanceMax): self
    {
        $this->testStrandnessDistanceMax = $testStrandnessDistanceMax;

        return $this;
    }

    public function getTestStrandnessDistanceGene(): ?int
    {
        return $this->testStrandnessDistanceGene;
    }

    public function setTestStrandnessDistanceGene(?int $testStrandnessDistanceGene): self
    {
        $this->testStrandnessDistanceGene = $testStrandnessDistanceGene;

        return $this;
    }

    public function getVitesseOndePouls(): ?int
    {
        return $this->vitesseOndePouls;
    }

    public function setVitesseOndePouls(?int $vitesseOndePouls): self
    {
        $this->vitesseOndePouls = $vitesseOndePouls;

        return $this;
    }

    public function getVolumeCarotideDroite(): ?int
    {
        return $this->volumeCarotideDroite;
    }

    public function setVolumeCarotideDroite(?int $volumeCarotideDroite): self
    {
        $this->volumeCarotideDroite = $volumeCarotideDroite;

        return $this;
    }

    public function getVolumeCarotideGauche(): ?int
    {
        return $this->volumeCarotideGauche;
    }

    public function setVolumeCarotideGauche(?int $volumeCarotideGauche): self
    {
        $this->volumeCarotideGauche = $volumeCarotideGauche;

        return $this;
    }

    public function getChargeAtheromeTotale(): ?int
    {
        return $this->chargeAtheromeTotale;
    }

    public function setChargeAtheromeTotale(?int $chargeAtheromeTotale): self
    {
        $this->chargeAtheromeTotale = $chargeAtheromeTotale;

        return $this;
    }

    public function getIPSGrosOrteilDroit(): ?string
    {
        return $this->IPSGrosOrteilDroit;
    }

    public function setIPSGrosOrteilDroit(?string $IPSGrosOrteilDroit): self
    {
        $this->IPSGrosOrteilDroit = $IPSGrosOrteilDroit;

        return $this;
    }

    public function getIPSGrosOrteilGauche(): ?string
    {
        return $this->IPSGrosOrteilGauche;
    }

    public function setIPSGrosOrteilGauche(?string $IPSGrosOrteilGauche): self
    {
        $this->IPSGrosOrteilGauche = $IPSGrosOrteilGauche;

        return $this;
    }

    public function getArretPour(): ?string
    {
        return $this->arretPour;
    }

    public function setArretPour(?string $arretPour): self
    {
        $this->arretPour = $arretPour;

        return $this;
    }
}
