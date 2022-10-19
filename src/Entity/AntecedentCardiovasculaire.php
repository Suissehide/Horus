<?php

namespace App\Entity;

use App\Repository\AntecedentCardiovasculaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AntecedentCardiovasculaireRepository::class)]
class AntecedentCardiovasculaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $IDM_SCA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $angorStable;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $angioplastieCoronaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pontageCoronaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $insuffisanceCardiaque;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $AVC;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $AIT;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $endarteriectomieCarotidienne;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $arteriteMembresInferieurs;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $angioplastiePeripherique;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pontagePeripherique;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $antecedentFibrillationAuriculaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $valvulopathie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDMSCA(): ?string
    {
        return $this->IDM_SCA;
    }

    public function setIDMSCA(?string $IDM_SCA): self
    {
        $this->IDM_SCA = $IDM_SCA;

        return $this;
    }

    public function getAngorStable(): ?string
    {
        return $this->angorStable;
    }

    public function setAngorStable(?string $angorStable): self
    {
        $this->angorStable = $angorStable;

        return $this;
    }

    public function getAngioplastieCoronaire(): ?string
    {
        return $this->angioplastieCoronaire;
    }

    public function setAngioplastieCoronaire(?string $angioplastieCoronaire): self
    {
        $this->angioplastieCoronaire = $angioplastieCoronaire;

        return $this;
    }

    public function getPontageCoronaire(): ?string
    {
        return $this->pontageCoronaire;
    }

    public function setPontageCoronaire(?string $pontageCoronaire): self
    {
        $this->pontageCoronaire = $pontageCoronaire;

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

    public function getAVC(): ?string
    {
        return $this->AVC;
    }

    public function setAVC(?string $AVC): self
    {
        $this->AVC = $AVC;

        return $this;
    }

    public function getAIT(): ?string
    {
        return $this->AIT;
    }

    public function setAIT(?string $AIT): self
    {
        $this->AIT = $AIT;

        return $this;
    }

    public function getEndarteriectomieCarotidienne(): ?string
    {
        return $this->endarteriectomieCarotidienne;
    }

    public function setEndarteriectomieCarotidienne(?string $endarteriectomieCarotidienne): self
    {
        $this->endarteriectomieCarotidienne = $endarteriectomieCarotidienne;

        return $this;
    }

    public function getArteriteMembresInferieurs(): ?string
    {
        return $this->arteriteMembresInferieurs;
    }

    public function setArteriteMembresInferieurs(?string $arteriteMembresInferieurs): self
    {
        $this->arteriteMembresInferieurs = $arteriteMembresInferieurs;

        return $this;
    }

    public function getAngioplastiePeripherique(): ?string
    {
        return $this->angioplastiePeripherique;
    }

    public function setAngioplastiePeripherique(?string $angioplastiePeripherique): self
    {
        $this->angioplastiePeripherique = $angioplastiePeripherique;

        return $this;
    }

    public function getPontagePeripherique(): ?string
    {
        return $this->pontagePeripherique;
    }

    public function setPontagePeripherique(?string $pontagePeripherique): self
    {
        $this->pontagePeripherique = $pontagePeripherique;

        return $this;
    }

    public function getAntecedentFibrillationAuriculaire(): ?string
    {
        return $this->antecedentFibrillationAuriculaire;
    }

    public function setAntecedentFibrillationAuriculaire(?string $antecedentFibrillationAuriculaire): self
    {
        $this->antecedentFibrillationAuriculaire = $antecedentFibrillationAuriculaire;

        return $this;
    }

    public function getValvulopathie(): ?string
    {
        return $this->valvulopathie;
    }

    public function setValvulopathie(?string $valvulopathie): self
    {
        $this->valvulopathie = $valvulopathie;

        return $this;
    }
}
