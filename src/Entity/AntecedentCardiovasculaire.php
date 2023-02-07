<?php

namespace App\Entity;

use App\Repository\AntecedentCardiovasculaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AntecedentCardiovasculaireRepository::class)]
class AntecedentCardiovasculaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?string $id;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $IDM_SCA = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $angorStable = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $angioplastieCoronaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $pontageCoronaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $insuffisanceCardiaque = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $AVC = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $AIT = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $endarteriectomieCarotidienne = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])] 
    private ?string $stenoseCarotidienne = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $arteriteMembresInferieurs = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $angioplastiePeripherique = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $pontagePeripherique = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $antecedentFibrillationAuriculaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]    
    private ?string $valvulopathie = null;

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

    public function getStenoseCarotidienne(): ?string
    {
        return $this->stenoseCarotidienne;
    }

    public function setStenoseCarotidienne(?string $stenoseCarotidienne): self
    {
        $this->stenoseCarotidienne = $stenoseCarotidienne;

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
