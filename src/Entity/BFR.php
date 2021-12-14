<?php

namespace App\Entity;

use App\Repository\BFRRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BFRRepository::class)
 */
class BFR
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
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $transaminasesASAT;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $transaminasesALAT;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $gamma;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $proteinurie;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $microAlbuminurie;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $creatinine;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $clairence;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $homoCysBasale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cholesterolTotal;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $triglicerides;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $HDLC;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $LDLC;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $glycemieAjeun;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $glycemiePostPrandiale;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Hba1c;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $neuropathieClinique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fondOeil;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $neuroesthesiometriePiedDroit;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $neuroesthesiometriePiedGauche;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $fibrinogene;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $CRP;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $VS;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $plaquettes;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $globulesBlancs;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $hemoglobine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activitePhysique;

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

    public function getClairence(): ?string
    {
        return $this->clairence;
    }

    public function setClairence(?string $clairence): self
    {
        $this->clairence = $clairence;

        return $this;
    }

    public function getHomoCysBasale(): ?string
    {
        return $this->homoCysBasale;
    }

    public function setHomoCysBasale(?string $homoCysBasale): self
    {
        $this->homoCysBasale = $homoCysBasale;

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

    public function getGlycemiePostPrandiale(): ?string
    {
        return $this->glycemiePostPrandiale;
    }

    public function setGlycemiePostPrandiale(?string $glycemiePostPrandiale): self
    {
        $this->glycemiePostPrandiale = $glycemiePostPrandiale;

        return $this;
    }

    public function getHba1c(): ?int
    {
        return $this->Hba1c;
    }

    public function setHba1c(?int $Hba1c): self
    {
        $this->Hba1c = $Hba1c;

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

    public function getVS(): ?string
    {
        return $this->VS;
    }

    public function setVS(?string $VS): self
    {
        $this->VS = $VS;

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

    public function getGlobulesBlancs(): ?string
    {
        return $this->globulesBlancs;
    }

    public function setGlobulesBlancs(?string $globulesBlancs): self
    {
        $this->globulesBlancs = $globulesBlancs;

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
}