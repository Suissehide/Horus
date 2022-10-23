<?php

namespace App\Entity;

use App\Repository\ScintigraphieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScintigraphieRepository::class)]
class Scintigraphie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reposDebitIVA;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reposDebitCX;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reposDebitCD;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reposDebitTotal;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $regadenosonDebitIVA;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $regadenosonDebitCX;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $regadenosonDebitCD;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $regadenosonDebitTotal;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reserveIVA;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reserveCX;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reserveCD;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $reserveTotal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reposAnalyseVisuelleIVA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reposAnalyseVisuelleCX;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $reposAnalyseVisuelleCD;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $regadenosonAnalyseVisuelleIVA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $regadenosonAnalyseVisuelleCX;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $regadenosonAnalyseVisuelleCD;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fractionEjection;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReposDebitIVA(): ?string
    {
        return $this->reposDebitIVA;
    }

    public function setReposDebitIVA(?string $reposDebitIVA): self
    {
        $this->reposDebitIVA = $reposDebitIVA;

        return $this;
    }

    public function getReposDebitCX(): ?string
    {
        return $this->reposDebitCX;
    }

    public function setReposDebitCX(?string $reposDebitCX): self
    {
        $this->reposDebitCX = $reposDebitCX;

        return $this;
    }

    public function getReposDebitCD(): ?string
    {
        return $this->reposDebitCD;
    }

    public function setReposDebitCD(?string $reposDebitCD): self
    {
        $this->reposDebitCD = $reposDebitCD;

        return $this;
    }

    public function getReposDebitTotal(): ?string
    {
        return $this->reposDebitTotal;
    }

    public function setReposDebitTotal(?string $reposDebitTotal): self
    {
        $this->reposDebitTotal = $reposDebitTotal;

        return $this;
    }

    public function getRegadenosonDebitIVA(): ?string
    {
        return $this->regadenosonDebitIVA;
    }

    public function setRegadenosonDebitIVA(?string $regadenosonDebitIVA): self
    {
        $this->regadenosonDebitIVA = $regadenosonDebitIVA;

        return $this;
    }

    public function getRegadenosonDebitCX(): ?string
    {
        return $this->regadenosonDebitCX;
    }

    public function setRegadenosonDebitCX(?string $regadenosonDebitCX): self
    {
        $this->regadenosonDebitCX = $regadenosonDebitCX;

        return $this;
    }

    public function getRegadenosonDebitCD(): ?string
    {
        return $this->regadenosonDebitCD;
    }

    public function setRegadenosonDebitCD(?string $regadenosonDebitCD): self
    {
        $this->regadenosonDebitCD = $regadenosonDebitCD;

        return $this;
    }

    public function getRegadenosonDebitTotal(): ?string
    {
        return $this->regadenosonDebitTotal;
    }

    public function setRegadenosonDebitTotal(?string $regadenosonDebitTotal): self
    {
        $this->regadenosonDebitTotal = $regadenosonDebitTotal;

        return $this;
    }

    public function getReserveIVA(): ?string
    {
        return $this->reserveIVA;
    }

    public function setReserveIVA(?string $reserveIVA): self
    {
        $this->reserveIVA = $reserveIVA;

        return $this;
    }

    public function getReserveCX(): ?string
    {
        return $this->reserveCX;
    }

    public function setReserveCX(?string $reserveCX): self
    {
        $this->reserveCX = $reserveCX;

        return $this;
    }

    public function getReserveCD(): ?string
    {
        return $this->reserveCD;
    }

    public function setReserveCD(?string $reserveCD): self
    {
        $this->reserveCD = $reserveCD;

        return $this;
    }

    public function getReserveTotal(): ?string
    {
        return $this->reserveTotal;
    }

    public function setReserveTotal(?string $reserveTotal): self
    {
        $this->reserveTotal = $reserveTotal;

        return $this;
    }

    public function getReposAnalyseVisuelleIVA(): ?string
    {
        return $this->reposAnalyseVisuelleIVA;
    }

    public function setReposAnalyseVisuelleIVA(?string $reposAnalyseVisuelleIVA): self
    {
        $this->reposAnalyseVisuelleIVA = $reposAnalyseVisuelleIVA;

        return $this;
    }

    public function getReposAnalyseVisuelleCX(): ?string
    {
        return $this->reposAnalyseVisuelleCX;
    }

    public function setReposAnalyseVisuelleCX(?string $reposAnalyseVisuelleCX): self
    {
        $this->reposAnalyseVisuelleCX = $reposAnalyseVisuelleCX;

        return $this;
    }

    public function getReposAnalyseVisuelleCD(): ?string
    {
        return $this->reposAnalyseVisuelleCD;
    }

    public function setReposAnalyseVisuelleCD(?string $reposAnalyseVisuelleCD): self
    {
        $this->reposAnalyseVisuelleCD = $reposAnalyseVisuelleCD;

        return $this;
    }

    public function getRegadenosonAnalyseVisuelleIVA(): ?string
    {
        return $this->regadenosonAnalyseVisuelleIVA;
    }

    public function setRegadenosonAnalyseVisuelleIVA(?string $regadenosonAnalyseVisuelleIVA): self
    {
        $this->regadenosonAnalyseVisuelleIVA = $regadenosonAnalyseVisuelleIVA;

        return $this;
    }

    public function getRegadenosonAnalyseVisuelleCX(): ?string
    {
        return $this->regadenosonAnalyseVisuelleCX;
    }

    public function setRegadenosonAnalyseVisuelleCX(?string $regadenosonAnalyseVisuelleCX): self
    {
        $this->regadenosonAnalyseVisuelleCX = $regadenosonAnalyseVisuelleCX;

        return $this;
    }

    public function getRegadenosonAnalyseVisuelleCD(): ?string
    {
        return $this->regadenosonAnalyseVisuelleCD;
    }

    public function setRegadenosonAnalyseVisuelleCD(?string $regadenosonAnalyseVisuelleCD): self
    {
        $this->regadenosonAnalyseVisuelleCD = $regadenosonAnalyseVisuelleCD;

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
