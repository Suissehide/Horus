<?php

namespace App\Entity;

use App\Repository\AngioplastiePontageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AngioplastiePontageRepository::class)]
class AngioplastiePontage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $segment1;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $segment2;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $segment3;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $troncCommun;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $diagonal;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ivaProximal;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $ivaMoyenne;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $circonflexeProximale;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $postrolLateral;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $pontSaphenesGauche;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $pontSaphenesDroit;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $pontMammaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSegment1(): ?bool
    {
        return $this->segment1;
    }

    public function setSegment1(?bool $segment1): self
    {
        $this->segment1 = $segment1;

        return $this;
    }

    public function getSegment2(): ?bool
    {
        return $this->segment2;
    }

    public function setSegment2(?bool $segment2): self
    {
        $this->segment2 = $segment2;

        return $this;
    }

    public function getSegment3(): ?bool
    {
        return $this->segment3;
    }

    public function setSegment3(?bool $segment3): self
    {
        $this->segment3 = $segment3;

        return $this;
    }

    public function getTroncCommun(): ?bool
    {
        return $this->troncCommun;
    }

    public function setTroncCommun(?bool $troncCommun): self
    {
        $this->troncCommun = $troncCommun;

        return $this;
    }

    public function getDiagonal(): ?bool
    {
        return $this->diagonal;
    }

    public function setDiagonal(?bool $diagonal): self
    {
        $this->diagonal = $diagonal;

        return $this;
    }

    public function getIvaProximal(): ?bool
    {
        return $this->ivaProximal;
    }

    public function setIvaProximal(?bool $ivaProximal): self
    {
        $this->ivaProximal = $ivaProximal;

        return $this;
    }

    public function getIvaMoyenne(): ?bool
    {
        return $this->ivaMoyenne;
    }

    public function setIvaMoyenne(?bool $ivaMoyenne): self
    {
        $this->ivaMoyenne = $ivaMoyenne;

        return $this;
    }

    public function getCirconflexeProximale(): ?bool
    {
        return $this->circonflexeProximale;
    }

    public function setCirconflexeProximale(?bool $circonflexeProximale): self
    {
        $this->circonflexeProximale = $circonflexeProximale;

        return $this;
    }

    public function getPostrolLateral(): ?bool
    {
        return $this->postrolLateral;
    }

    public function setPostrolLateral(?bool $postrolLateral): self
    {
        $this->postrolLateral = $postrolLateral;

        return $this;
    }

    public function getPontSaphenesGauche(): ?bool
    {
        return $this->pontSaphenesGauche;
    }

    public function setPontSaphenesGauche(?bool $pontSaphenesGauche): self
    {
        $this->pontSaphenesGauche = $pontSaphenesGauche;

        return $this;
    }

    public function getPontSaphenesDroit(): ?bool
    {
        return $this->pontSaphenesDroit;
    }

    public function setPontSaphenesDroit(?bool $pontSaphenesDroit): self
    {
        $this->pontSaphenesDroit = $pontSaphenesDroit;

        return $this;
    }

    public function getPontMammaire(): ?bool
    {
        return $this->pontMammaire;
    }

    public function setPontMammaire(?bool $pontMammaire): self
    {
        $this->pontMammaire = $pontMammaire;

        return $this;
    }

    public function isSegment1(): ?bool
    {
        return $this->segment1;
    }

    public function isSegment2(): ?bool
    {
        return $this->segment2;
    }

    public function isSegment3(): ?bool
    {
        return $this->segment3;
    }

    public function isTroncCommun(): ?bool
    {
        return $this->troncCommun;
    }

    public function isDiagonal(): ?bool
    {
        return $this->diagonal;
    }

    public function isIvaProximal(): ?bool
    {
        return $this->ivaProximal;
    }

    public function isIvaMoyenne(): ?bool
    {
        return $this->ivaMoyenne;
    }

    public function isCirconflexeProximale(): ?bool
    {
        return $this->circonflexeProximale;
    }

    public function isPostrolLateral(): ?bool
    {
        return $this->postrolLateral;
    }

    public function isPontSaphenesGauche(): ?bool
    {
        return $this->pontSaphenesGauche;
    }

    public function isPontSaphenesDroit(): ?bool
    {
        return $this->pontSaphenesDroit;
    }

    public function isPontMammaire(): ?bool
    {
        return $this->pontMammaire;
    }
}
