<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 */
class Information
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
    private $susDecalage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anterieur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $septoApical;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lateral;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $inferieurPosterieur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sansTerritoire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $IVA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CD;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Cx;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marginale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diagonale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pontage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $troncCommun;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $traitementPhaseAigue = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $troubleRythmeVentriculaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $insuffisanceCardiaque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pericardite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complicationMecanique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mecanisme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSusDecalage(): ?string
    {
        return $this->susDecalage;
    }

    public function setSusDecalage(?string $susDecalage): self
    {
        $this->susDecalage = $susDecalage;

        return $this;
    }

    public function getAnterieur(): ?string
    {
        return $this->anterieur;
    }

    public function setAnterieur(?string $anterieur): self
    {
        $this->anterieur = $anterieur;

        return $this;
    }

    public function getSeptoApical(): ?string
    {
        return $this->septoApical;
    }

    public function setSeptoApical(?string $septoApical): self
    {
        $this->septoApical = $septoApical;

        return $this;
    }

    public function getLateral(): ?string
    {
        return $this->lateral;
    }

    public function setLateral(?string $lateral): self
    {
        $this->lateral = $lateral;

        return $this;
    }

    public function getInferieurPosterieur(): ?string
    {
        return $this->inferieurPosterieur;
    }

    public function setInferieurPosterieur(?string $inferieurPosterieur): self
    {
        $this->inferieurPosterieur = $inferieurPosterieur;

        return $this;
    }

    public function getSansTerritoire(): ?string
    {
        return $this->sansTerritoire;
    }

    public function setSansTerritoire(?string $sansTerritoire): self
    {
        $this->sansTerritoire = $sansTerritoire;

        return $this;
    }

    public function getIVA(): ?string
    {
        return $this->IVA;
    }

    public function setIVA(?string $IVA): self
    {
        $this->IVA = $IVA;

        return $this;
    }

    public function getCD(): ?string
    {
        return $this->CD;
    }

    public function setCD(?string $CD): self
    {
        $this->CD = $CD;

        return $this;
    }

    public function getCx(): ?string
    {
        return $this->Cx;
    }

    public function setCx(?string $Cx): self
    {
        $this->Cx = $Cx;

        return $this;
    }

    public function getMarginale(): ?string
    {
        return $this->marginale;
    }

    public function setMarginale(?string $marginale): self
    {
        $this->marginale = $marginale;

        return $this;
    }

    public function getDiagonale(): ?string
    {
        return $this->diagonale;
    }

    public function setDiagonale(?string $diagonale): self
    {
        $this->diagonale = $diagonale;

        return $this;
    }

    public function getPontage(): ?string
    {
        return $this->pontage;
    }

    public function setPontage(?string $pontage): self
    {
        $this->pontage = $pontage;

        return $this;
    }

    public function getTroncCommun(): ?string
    {
        return $this->troncCommun;
    }

    public function setTroncCommun(?string $troncCommun): self
    {
        $this->troncCommun = $troncCommun;

        return $this;
    }

    public function getTraitementPhaseAigue(): ?array
    {
        return $this->traitementPhaseAigue;
    }

    public function setTraitementPhaseAigue(?array $traitementPhaseAigue): self
    {
        $this->traitementPhaseAigue = $traitementPhaseAigue;

        return $this;
    }

    public function getTroubleRythmeVentriculaire(): ?string
    {
        return $this->troubleRythmeVentriculaire;
    }

    public function setTroubleRythmeVentriculaire(?string $troubleRythmeVentriculaire): self
    {
        $this->troubleRythmeVentriculaire = $troubleRythmeVentriculaire;

        return $this;
    }

    public function getInsuffisanceCardiaque(): ?string
    {
        return $this->insuffisanceCardiaque;
    }

    public function setInsuffisanceCardiaque(?string $insuffisanceCardiaque): self
    {
        $this->insuffisanceCardiaque = $insuffisanceCardiaque;

        return $this;
    }

    public function getPericardite(): ?string
    {
        return $this->pericardite;
    }

    public function setPericardite(?string $pericardite): self
    {
        $this->pericardite = $pericardite;

        return $this;
    }

    public function getComplicationMecanique(): ?string
    {
        return $this->complicationMecanique;
    }

    public function setComplicationMecanique(?string $complicationMecanique): self
    {
        $this->complicationMecanique = $complicationMecanique;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(?string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
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

    public function getMecanisme(): ?string
    {
        return $this->mecanisme;
    }

    public function setMecanisme(?string $mecanisme): self
    {
        $this->mecanisme = $mecanisme;

        return $this;
    }
}
