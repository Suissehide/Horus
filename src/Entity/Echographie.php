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
    private $reposCX;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reposCD;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $effortIVA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $effortCX;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $effortCD;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbSegmentIVA;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbSegmentCX;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbSegmentCD;

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

    public function getReposCX(): ?string
    {
        return $this->reposCX;
    }

    public function setReposCX(?string $reposCX): self
    {
        $this->reposCX = $reposCX;

        return $this;
    }

    public function getReposCD(): ?string
    {
        return $this->reposCD;
    }

    public function setReposCD(?string $reposCD): self
    {
        $this->reposCD = $reposCD;

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

    public function getEffortCX(): ?string
    {
        return $this->effortCX;
    }

    public function setEffortCX(?string $effortCX): self
    {
        $this->effortCX = $effortCX;

        return $this;
    }

    public function getEffortCD(): ?string
    {
        return $this->effortCD;
    }

    public function setEffortCD(?string $effortCD): self
    {
        $this->effortCD = $effortCD;

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

    public function getNbSegmentCX(): ?int
    {
        return $this->nbSegmentCX;
    }

    public function setNbSegmentCX(?int $nbSegmentCX): self
    {
        $this->nbSegmentCX = $nbSegmentCX;

        return $this;
    }

    public function getNbSegmentCD(): ?int
    {
        return $this->nbSegmentCD;
    }

    public function setNbSegmentCD(?int $nbSegmentCD): self
    {
        $this->nbSegmentCD = $nbSegmentCD;

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
