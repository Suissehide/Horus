<?php

namespace App\Entity;

use App\Repository\NeuroPsychologieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: NeuroPsychologieRepository::class)]
class NeuroPsychologie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $MMSE;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $MOCA;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $HADAnxiete;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $HADDepression;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $barriereLangue;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $niveauSocioEducatif;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $aphasie;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $difficultesMouvementFin;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $rankin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMMSE(): ?int
    {
        return $this->MMSE;
    }

    public function setMMSE(?int $MMSE): self
    {
        $this->MMSE = $MMSE;

        return $this;
    }

    public function getMOCA(): ?int
    {
        return $this->MOCA;
    }

    public function setMOCA(?int $MOCA): self
    {
        $this->MOCA = $MOCA;

        return $this;
    }

    public function getHADAnxiete(): ?int
    {
        return $this->HADAnxiete;
    }

    public function setHADAnxiete(?int $HADAnxiete): self
    {
        $this->HADAnxiete = $HADAnxiete;

        return $this;
    }

    public function getHADDepression(): ?int
    {
        return $this->HADDepression;
    }

    public function setHADDepression(?int $HADDepression): self
    {
        $this->HADDepression = $HADDepression;

        return $this;
    }

    public function getBarriereLangue(): ?string
    {
        return $this->barriereLangue;
    }

    public function setBarriereLangue(?string $barriereLangue): self
    {
        $this->barriereLangue = $barriereLangue;

        return $this;
    }

    public function getNiveauSocioEducatif(): ?string
    {
        return $this->niveauSocioEducatif;
    }

    public function setNiveauSocioEducatif(?string $niveauSocioEducatif): self
    {
        $this->niveauSocioEducatif = $niveauSocioEducatif;

        return $this;
    }

    public function getAphasie(): ?string
    {
        return $this->aphasie;
    }

    public function setAphasie(?string $aphasie): self
    {
        $this->aphasie = $aphasie;

        return $this;
    }

    public function getDifficultesMouvementFin(): ?string
    {
        return $this->difficultesMouvementFin;
    }

    public function setDifficultesMouvementFin(?string $difficultesMouvementFin): self
    {
        $this->difficultesMouvementFin = $difficultesMouvementFin;

        return $this;
    }

    public function getRankin(): ?int
    {
        return $this->rankin;
    }

    public function setRankin(?int $rankin): self
    {
        $this->rankin = $rankin;

        return $this;
    }
}
