<?php

namespace App\Entity;

use App\Repository\CoronaireAngioplastieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoronaireAngioplastieRepository::class)
 */
class CoronaireAngioplastie
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
    private $stenoseIVA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stenoseDiagonale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stenoseCirconflexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stenosePostrolLaterale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stenoseCoronaireDroite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stenosePontage;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ffrIVA;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ffrDiagonale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ffrCirconflexe;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ffrPostrolLaterale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ffrCoronaireDroite;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ffrPontage;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cmrIVA;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cmrDiagonale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cmrCirconflexe;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cmrPostrolLaterale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cmrCoronaireDroite;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cmrPontage;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $imrIVA;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $imrDiagonale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $imrCirconflexe;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $imrPostrolLaterale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $imrCoronaireDroite;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $imrPontage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $angioplastieIVA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $angioplastieDiagonale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $angioplastieCirconflexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $angioplastiePostrolLaterale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $angioplastieCoronaireDroite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $angioplastiePontage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coroscannerIVA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coroscannerDiagonale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coroscannerCirconflexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coroscannerPostrolLaterale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coroscannerCoronaireDroite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coroscannerPontage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $scoreCalcique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStenoseIVA(): ?string
    {
        return $this->stenoseIVA;
    }

    public function setStenoseIVA(?string $stenoseIVA): self
    {
        $this->stenoseIVA = $stenoseIVA;

        return $this;
    }

    public function getStenoseDiagonale(): ?string
    {
        return $this->stenoseDiagonale;
    }

    public function setStenoseDiagonale(?string $stenoseDiagonale): self
    {
        $this->stenoseDiagonale = $stenoseDiagonale;

        return $this;
    }

    public function getStenoseCirconflexe(): ?string
    {
        return $this->stenoseCirconflexe;
    }

    public function setStenoseCirconflexe(?string $stenoseCirconflexe): self
    {
        $this->stenoseCirconflexe = $stenoseCirconflexe;

        return $this;
    }

    public function getStenosePostrolLaterale(): ?string
    {
        return $this->stenosePostrolLaterale;
    }

    public function setStenosePostrolLaterale(?string $stenosePostrolLaterale): self
    {
        $this->stenosePostrolLaterale = $stenosePostrolLaterale;

        return $this;
    }

    public function getStenoseCoronaireDroite(): ?string
    {
        return $this->stenoseCoronaireDroite;
    }

    public function setStenoseCoronaireDroite(?string $stenoseCoronaireDroite): self
    {
        $this->stenoseCoronaireDroite = $stenoseCoronaireDroite;

        return $this;
    }

    public function getStenosePontage(): ?string
    {
        return $this->stenosePontage;
    }

    public function setStenosePontage(?string $stenosePontage): self
    {
        $this->stenosePontage = $stenosePontage;

        return $this;
    }

    public function getFfrIVA(): ?string
    {
        return $this->ffrIVA;
    }

    public function setFfrIVA(?string $ffrIVA): self
    {
        $this->ffrIVA = $ffrIVA;

        return $this;
    }

    public function getFfrDiagonale(): ?string
    {
        return $this->ffrDiagonale;
    }

    public function setFfrDiagonale(?string $ffrDiagonale): self
    {
        $this->ffrDiagonale = $ffrDiagonale;

        return $this;
    }

    public function getFfrCirconflexe(): ?string
    {
        return $this->ffrCirconflexe;
    }

    public function setFfrCirconflexe(?string $ffrCirconflexe): self
    {
        $this->ffrCirconflexe = $ffrCirconflexe;

        return $this;
    }

    public function getFfrPostrolLaterale(): ?string
    {
        return $this->ffrPostrolLaterale;
    }

    public function setFfrPostrolLaterale(?string $ffrPostrolLaterale): self
    {
        $this->ffrPostrolLaterale = $ffrPostrolLaterale;

        return $this;
    }

    public function getFfrCoronaireDroite(): ?string
    {
        return $this->ffrCoronaireDroite;
    }

    public function setFfrCoronaireDroite(?string $ffrCoronaireDroite): self
    {
        $this->ffrCoronaireDroite = $ffrCoronaireDroite;

        return $this;
    }

    public function getFfrPontage(): ?string
    {
        return $this->ffrPontage;
    }

    public function setFfrPontage(?string $ffrPontage): self
    {
        $this->ffrPontage = $ffrPontage;

        return $this;
    }

    public function getCmrIVA(): ?string
    {
        return $this->cmrIVA;
    }

    public function setCmrIVA(?string $cmrIVA): self
    {
        $this->cmrIVA = $cmrIVA;

        return $this;
    }

    public function getCmrDiagonale(): ?string
    {
        return $this->cmrDiagonale;
    }

    public function setCmrDiagonale(?string $cmrDiagonale): self
    {
        $this->cmrDiagonale = $cmrDiagonale;

        return $this;
    }

    public function getCmrCirconflexe(): ?string
    {
        return $this->cmrCirconflexe;
    }

    public function setCmrCirconflexe(?string $cmrCirconflexe): self
    {
        $this->cmrCirconflexe = $cmrCirconflexe;

        return $this;
    }

    public function getCmrPostrolLaterale(): ?string
    {
        return $this->cmrPostrolLaterale;
    }

    public function setCmrPostrolLaterale(?string $cmrPostrolLaterale): self
    {
        $this->cmrPostrolLaterale = $cmrPostrolLaterale;

        return $this;
    }

    public function getCmrCoronaireDroite(): ?string
    {
        return $this->cmrCoronaireDroite;
    }

    public function setCmrCoronaireDroite(?string $cmrCoronaireDroite): self
    {
        $this->cmrCoronaireDroite = $cmrCoronaireDroite;

        return $this;
    }

    public function getCmrPontage(): ?string
    {
        return $this->cmrPontage;
    }

    public function setCmrPontage(?string $cmrPontage): self
    {
        $this->cmrPontage = $cmrPontage;

        return $this;
    }

    public function getImrIVA(): ?string
    {
        return $this->imrIVA;
    }

    public function setImrIVA(?string $imrIVA): self
    {
        $this->imrIVA = $imrIVA;

        return $this;
    }

    public function getImrDiagonale(): ?string
    {
        return $this->imrDiagonale;
    }

    public function setImrDiagonale(?string $imrDiagonale): self
    {
        $this->imrDiagonale = $imrDiagonale;

        return $this;
    }

    public function getImrCirconflexe(): ?string
    {
        return $this->imrCirconflexe;
    }

    public function setImrCirconflexe(?string $imrCirconflexe): self
    {
        $this->imrCirconflexe = $imrCirconflexe;

        return $this;
    }

    public function getImrPostrolLaterale(): ?string
    {
        return $this->imrPostrolLaterale;
    }

    public function setImrPostrolLaterale(?string $imrPostrolLaterale): self
    {
        $this->imrPostrolLaterale = $imrPostrolLaterale;

        return $this;
    }

    public function getImrCoronaireDroite(): ?string
    {
        return $this->imrCoronaireDroite;
    }

    public function setImrCoronaireDroite(?string $imrCoronaireDroite): self
    {
        $this->imrCoronaireDroite = $imrCoronaireDroite;

        return $this;
    }

    public function getImrPontage(): ?string
    {
        return $this->imrPontage;
    }

    public function setImrPontage(?string $imrPontage): self
    {
        $this->imrPontage = $imrPontage;

        return $this;
    }

    public function getAngioplastieIVA(): ?string
    {
        return $this->angioplastieIVA;
    }

    public function setAngioplastieIVA(?string $angioplastieIVA): self
    {
        $this->angioplastieIVA = $angioplastieIVA;

        return $this;
    }

    public function getAngioplastieDiagonale(): ?string
    {
        return $this->angioplastieDiagonale;
    }

    public function setAngioplastieDiagonale(?string $angioplastieDiagonale): self
    {
        $this->angioplastieDiagonale = $angioplastieDiagonale;

        return $this;
    }

    public function getAngioplastieCirconflexe(): ?string
    {
        return $this->angioplastieCirconflexe;
    }

    public function setAngioplastieCirconflexe(?string $angioplastieCirconflexe): self
    {
        $this->angioplastieCirconflexe = $angioplastieCirconflexe;

        return $this;
    }

    public function getAngioplastiePostrolLaterale(): ?string
    {
        return $this->angioplastiePostrolLaterale;
    }

    public function setAngioplastiePostrolLaterale(?string $angioplastiePostrolLaterale): self
    {
        $this->angioplastiePostrolLaterale = $angioplastiePostrolLaterale;

        return $this;
    }

    public function getAngioplastieCoronaireDroite(): ?string
    {
        return $this->angioplastieCoronaireDroite;
    }

    public function setAngioplastieCoronaireDroite(?string $angioplastieCoronaireDroite): self
    {
        $this->angioplastieCoronaireDroite = $angioplastieCoronaireDroite;

        return $this;
    }

    public function getAngioplastiePontage(): ?string
    {
        return $this->angioplastiePontage;
    }

    public function setAngioplastiePontage(?string $angioplastiePontage): self
    {
        $this->angioplastiePontage = $angioplastiePontage;

        return $this;
    }

    public function getCoroscannerIVA(): ?string
    {
        return $this->coroscannerIVA;
    }

    public function setCoroscannerIVA(?string $coroscannerIVA): self
    {
        $this->coroscannerIVA = $coroscannerIVA;

        return $this;
    }

    public function getCoroscannerDiagonale(): ?string
    {
        return $this->coroscannerDiagonale;
    }

    public function setCoroscannerDiagonale(?string $coroscannerDiagonale): self
    {
        $this->coroscannerDiagonale = $coroscannerDiagonale;

        return $this;
    }

    public function getCoroscannerCirconflexe(): ?string
    {
        return $this->coroscannerCirconflexe;
    }

    public function setCoroscannerCirconflexe(?string $coroscannerCirconflexe): self
    {
        $this->coroscannerCirconflexe = $coroscannerCirconflexe;

        return $this;
    }

    public function getCoroscannerPostrolLaterale(): ?string
    {
        return $this->coroscannerPostrolLaterale;
    }

    public function setCoroscannerPostrolLaterale(?string $coroscannerPostrolLaterale): self
    {
        $this->coroscannerPostrolLaterale = $coroscannerPostrolLaterale;

        return $this;
    }

    public function getCoroscannerCoronaireDroite(): ?string
    {
        return $this->coroscannerCoronaireDroite;
    }

    public function setCoroscannerCoronaireDroite(?string $coroscannerCoronaireDroite): self
    {
        $this->coroscannerCoronaireDroite = $coroscannerCoronaireDroite;

        return $this;
    }

    public function getCoroscannerPontage(): ?string
    {
        return $this->coroscannerPontage;
    }

    public function setCoroscannerPontage(?string $coroscannerPontage): self
    {
        $this->coroscannerPontage = $coroscannerPontage;

        return $this;
    }

    public function getScoreCalcique(): ?int
    {
        return $this->scoreCalcique;
    }

    public function setScoreCalcique(?int $scoreCalcique): self
    {
        $this->scoreCalcique = $scoreCalcique;

        return $this;
    }
}
