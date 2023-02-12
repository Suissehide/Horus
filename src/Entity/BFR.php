<?php

namespace App\Entity;

use App\Repository\BFRRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BFRRepository::class)]
class BFR
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $taille;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $poids;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $tourTaille;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 3, nullable: true)]
    private $tensionArterielleSystoliqueJour;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 3, nullable: true)]
    private $tensionArterielleDiastoliqueJour;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 3, nullable: true)]
    private $tensionArterielleSystoliqueNuit;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 3, nullable: true)]
    private $tensionArterielleDiastoliqueNuit;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $HVG;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $cholesterolTotal;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $triglicerides;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $HDLC;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $LDLC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $scoreDUTCH;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $tabagisme;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateArret;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nombrePaquetsAn;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $microAlbuminurie;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $creatinine;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $debitFiltrationGlomerulaire;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $proteinurie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $diabeteType;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $diabeteDepuis;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $glycemieAjeun;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 1, nullable: true)]
    private $hba1c;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $neuropathieClinique;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $fondOeil;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $neuroesthesiometriePiedDroit;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $neuroesthesiometriePiedGauche;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $transaminasesASAT;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $transaminasesALAT;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $gamma;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $fibrinogene;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $CRP;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $hemoglobine;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $VGM;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $plaquettes;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $TSH;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $activitePhysique;

    #[ORM\Column(type: 'array', nullable: true)]
    private $alimentation = [];

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

    public function getTensionArterielleSystoliqueJour(): ?string
    {
        return $this->tensionArterielleSystoliqueJour;
    }

    public function setTensionArterielleSystoliqueJour(?string $tensionArterielleSystoliqueJour): self
    {
        $this->tensionArterielleSystoliqueJour = $tensionArterielleSystoliqueJour;

        return $this;
    }

    public function getTensionArterielleDiastoliqueJour(): ?string
    {
        return $this->tensionArterielleDiastoliqueJour;
    }

    public function setTensionArterielleDiastoliqueJour(?string $tensionArterielleDiastoliqueJour): self
    {
        $this->tensionArterielleDiastoliqueJour = $tensionArterielleDiastoliqueJour;

        return $this;
    }

    public function getTensionArterielleSystoliqueNuit(): ?string
    {
        return $this->tensionArterielleSystoliqueNuit;
    }

    public function setTensionArterielleSystoliqueNuit(?string $tensionArterielleSystoliqueNuit): self
    {
        $this->tensionArterielleSystoliqueNuit = $tensionArterielleSystoliqueNuit;

        return $this;
    }

    public function getTensionArterielleDiastoliqueNuit(): ?string
    {
        return $this->tensionArterielleDiastoliqueNuit;
    }

    public function setTensionArterielleDiastoliqueNuit(?string $tensionArterielleDiastoliqueNuit): self
    {
        $this->tensionArterielleDiastoliqueNuit = $tensionArterielleDiastoliqueNuit;

        return $this;
    }

    public function getTransaminasesASAT(): ?string
    {
        return $this->transaminasesASAT;
    }

    public function setTransaminasesASAT(?string $transaminasesASAT): self
    {
        $this->transaminasesASAT = $transaminasesASAT;

        return $this;
    }

    public function getTransaminasesALAT(): ?string
    {
        return $this->transaminasesALAT;
    }

    public function setTransaminasesALAT(?string $transaminasesALAT): self
    {
        $this->transaminasesALAT = $transaminasesALAT;

        return $this;
    }

    public function getGamma(): ?string
    {
        return $this->gamma;
    }

    public function setGamma(?string $gamma): self
    {
        $this->gamma = $gamma;

        return $this;
    }

    public function getProteinurie(): ?string
    {
        return $this->proteinurie;
    }

    public function setProteinurie(?string $proteinurie): self
    {
        $this->proteinurie = $proteinurie;

        return $this;
    }

    public function getMicroAlbuminurie(): ?string
    {
        return $this->microAlbuminurie;
    }

    public function setMicroAlbuminurie(?string $microAlbuminurie): self
    {
        $this->microAlbuminurie = $microAlbuminurie;

        return $this;
    }

    public function getCreatinine(): ?string
    {
        return $this->creatinine;
    }

    public function setCreatinine(?string $creatinine): self
    {
        $this->creatinine = $creatinine;

        return $this;
    }

    public function getCholesterolTotal(): ?string
    {
        return $this->cholesterolTotal;
    }

    public function setCholesterolTotal(?string $cholesterolTotal): self
    {
        $this->cholesterolTotal = $cholesterolTotal;

        return $this;
    }

    public function getTriglicerides(): ?string
    {
        return $this->triglicerides;
    }

    public function setTriglicerides(?string $triglicerides): self
    {
        $this->triglicerides = $triglicerides;

        return $this;
    }

    public function getHDLC(): ?string
    {
        return $this->HDLC;
    }

    public function setHDLC(?string $HDLC): self
    {
        $this->HDLC = $HDLC;

        return $this;
    }

    public function getLDLC(): ?string
    {
        return $this->LDLC;
    }

    public function setLDLC(?string $LDLC): self
    {
        $this->LDLC = $LDLC;

        return $this;
    }

    public function getGlycemieAjeun(): ?string
    {
        return $this->glycemieAjeun;
    }

    public function setGlycemieAjeun(?string $glycemieAjeun): self
    {
        $this->glycemieAjeun = $glycemieAjeun;

        return $this;
    }

    public function getHba1c(): ?string
    {
        return $this->hba1c;
    }

    public function setHba1c(?string $hba1c): self
    {
        $this->hba1c = $hba1c;

        return $this;
    }

    public function getNeuropathieClinique(): ?string
    {
        return $this->neuropathieClinique;
    }

    public function setNeuropathieClinique(?string $neuropathieClinique): self
    {
        $this->neuropathieClinique = $neuropathieClinique;

        return $this;
    }

    public function getFondOeil(): ?string
    {
        return $this->fondOeil;
    }

    public function setFondOeil(?string $fondOeil): self
    {
        $this->fondOeil = $fondOeil;

        return $this;
    }

    public function getNeuroesthesiometriePiedDroit(): ?string
    {
        return $this->neuroesthesiometriePiedDroit;
    }

    public function setNeuroesthesiometriePiedDroit(?string $neuroesthesiometriePiedDroit): self
    {
        $this->neuroesthesiometriePiedDroit = $neuroesthesiometriePiedDroit;

        return $this;
    }

    public function getNeuroesthesiometriePiedGauche(): ?string
    {
        return $this->neuroesthesiometriePiedGauche;
    }

    public function setNeuroesthesiometriePiedGauche(?string $neuroesthesiometriePiedGauche): self
    {
        $this->neuroesthesiometriePiedGauche = $neuroesthesiometriePiedGauche;

        return $this;
    }

    public function getFibrinogene(): ?string
    {
        return $this->fibrinogene;
    }

    public function setFibrinogene(?string $fibrinogene): self
    {
        $this->fibrinogene = $fibrinogene;

        return $this;
    }

    public function getCRP(): ?string
    {
        return $this->CRP;
    }

    public function setCRP(?string $CRP): self
    {
        $this->CRP = $CRP;

        return $this;
    }

    public function getPlaquettes(): ?string
    {
        return $this->plaquettes;
    }

    public function setPlaquettes(?string $plaquettes): self
    {
        $this->plaquettes = $plaquettes;

        return $this;
    }

    public function getHemoglobine(): ?string
    {
        return $this->hemoglobine;
    }

    public function setHemoglobine(?string $hemoglobine): self
    {
        $this->hemoglobine = $hemoglobine;

        return $this;
    }

    public function getActivitePhysique(): ?string
    {
        return $this->activitePhysique;
    }

    public function setActivitePhysique(?string $activitePhysique): self
    {
        $this->activitePhysique = $activitePhysique;

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

    public function getHVG(): ?string
    {
        return $this->HVG;
    }

    public function setHVG(?string $HVG): self
    {
        $this->HVG = $HVG;

        return $this;
    }

    public function getScoreDUTCH(): ?string
    {
        return $this->scoreDUTCH;
    }

    public function setScoreDUTCH(?string $scoreDUTCH): self
    {
        $this->scoreDUTCH = $scoreDUTCH;

        return $this;
    }

    public function getVGM(): ?string
    {
        return $this->VGM;
    }

    public function setVGM(?string $VGM): self
    {
        $this->VGM = $VGM;

        return $this;
    }

    public function getTSH(): ?string
    {
        return $this->TSH;
    }

    public function setTSH(?string $TSH): self
    {
        $this->TSH = $TSH;

        return $this;
    }

    public function getAlimentation(): array
    {
        return $this->alimentation;
    }

    public function setAlimentation(?array $alimentation): self
    {
        $this->alimentation = $alimentation;

        return $this;
    }

    public function getDiabeteType(): ?string
    {
        return $this->diabeteType;
    }

    public function setDiabeteType(?string $diabeteType): self
    {
        $this->diabeteType = $diabeteType;

        return $this;
    }

    public function getDiabeteDepuis(): ?string
    {
        return $this->diabeteDepuis;
    }

    public function setDiabeteDepuis(?string $diabeteDepuis): self
    {
        $this->diabeteDepuis = $diabeteDepuis;

        return $this;
    }

    public function getDebitFiltrationGlomerulaire(): ?string
    {
        return $this->debitFiltrationGlomerulaire;
    }

    public function setDebitFiltrationGlomerulaire(?string $debitFiltrationGlomerulaire): self
    {
        $this->debitFiltrationGlomerulaire = $debitFiltrationGlomerulaire;

        return $this;
    }
}
