<?php

namespace App\Entity;

use App\Repository\EchographieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EchographieRepository::class)]
class Echographie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reposIVA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reposCirconflexe;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reposCoronaireDroite;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $effortIVA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $effortCirconflexe;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $effortCoronaireDroite;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbSegmentIVA;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbSegmentCirconflexe;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbSegmentCoronaireDroite;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fractionEjection;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReposIVA(): ?string
    {
        return $this->reposIVA;
    }

    public function setReposIVA(?string $reposIVA): self
    {
        $this->reposIVA = $reposIVA;

        return $this;
    }

    public function getReposCirconflexe(): ?string
    {
        return $this->reposCirconflexe;
    }

    public function setReposCirconflexe(?string $reposCirconflexe): self
    {
        $this->reposCirconflexe = $reposCirconflexe;

        return $this;
    }

    public function getReposCoronaireDroite(): ?string
    {
        return $this->reposCoronaireDroite;
    }

    public function setReposCoronaireDroite(?string $reposCoronaireDroite): self
    {
        $this->reposCoronaireDroite = $reposCoronaireDroite;

        return $this;
    }

    public function getEffortIVA(): ?string
    {
        return $this->effortIVA;
    }

    public function setEffortIVA(?string $effortIVA): self
    {
        $this->effortIVA = $effortIVA;

        return $this;
    }

    public function getEffortCirconflexe(): ?string
    {
        return $this->effortCirconflexe;
    }

    public function setEffortCirconflexe(?string $effortCirconflexe): self
    {
        $this->effortCirconflexe = $effortCirconflexe;

        return $this;
    }

    public function getEffortCoronaireDroite(): ?string
    {
        return $this->effortCoronaireDroite;
    }

    public function setEffortCoronaireDroite(?string $effortCoronaireDroite): self
    {
        $this->effortCoronaireDroite = $effortCoronaireDroite;

        return $this;
    }

    public function getNbSegmentIVA(): ?int
    {
        return $this->nbSegmentIVA;
    }

    public function setNbSegmentIVA(?int $nbSegmentIVA): self
    {
        $this->nbSegmentIVA = $nbSegmentIVA;

        return $this;
    }

    public function getNbSegmentCirconflexe(): ?int
    {
        return $this->nbSegmentCirconflexe;
    }

    public function setNbSegmentCirconflexe(?int $nbSegmentCirconflexe): self
    {
        $this->nbSegmentCirconflexe = $nbSegmentCirconflexe;

        return $this;
    }

    public function getNbSegmentCoronaireDroite(): ?int
    {
        return $this->nbSegmentCoronaireDroite;
    }

    public function setNbSegmentCoronaireDroite(?int $nbSegmentCoronaireDroite): self
    {
        $this->nbSegmentCoronaireDroite = $nbSegmentCoronaireDroite;

        return $this;
    }

    public function getFractionEjection(): ?int
    {
        return $this->fractionEjection;
    }

    public function setFractionEjection(?int $fractionEjection): self
    {
        $this->fractionEjection = $fractionEjection;

        return $this;
    }
}
