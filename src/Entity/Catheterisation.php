<?php

namespace App\Entity;

use App\Repository\CatheterisationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatheterisationRepository::class)]
class Catheterisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $segment1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $segment2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $segment3;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $troncCommun;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $diagonal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ivaProximal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ivaMoyenne;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $circonflexeProximale;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $postrolLateral;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pontSaphenesGauche;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pontSaphenesDroit;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pontMammaire;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $FEVentriculographie;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $FEIsotopique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSegment1(): ?string
    {
        return $this->segment1;
    }

    public function setSegment1(?string $segment1): self
    {
        $this->segment1 = $segment1;

        return $this;
    }

    public function getSegment2(): ?string
    {
        return $this->segment2;
    }

    public function setSegment2(?string $segment2): self
    {
        $this->segment2 = $segment2;

        return $this;
    }

    public function getSegment3(): ?string
    {
        return $this->segment3;
    }

    public function setSegment3(?string $segment3): self
    {
        $this->segment3 = $segment3;

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

    public function getDiagonal(): ?string
    {
        return $this->diagonal;
    }

    public function setDiagonal(?string $diagonal): self
    {
        $this->diagonal = $diagonal;

        return $this;
    }

    public function getIvaProximal(): ?string
    {
        return $this->ivaProximal;
    }

    public function setIvaProximal(?string $ivaProximal): self
    {
        $this->ivaProximal = $ivaProximal;

        return $this;
    }

    public function getIvaMoyenne(): ?string
    {
        return $this->ivaMoyenne;
    }

    public function setIvaMoyenne(?string $ivaMoyenne): self
    {
        $this->ivaMoyenne = $ivaMoyenne;

        return $this;
    }

    public function getCirconflexeProximale(): ?string
    {
        return $this->circonflexeProximale;
    }

    public function setCirconflexeProximale(?string $circonflexeProximale): self
    {
        $this->circonflexeProximale = $circonflexeProximale;

        return $this;
    }

    public function getPostrolLateral(): ?string
    {
        return $this->postrolLateral;
    }

    public function setPostrolLateral(?string $postrolLateral): self
    {
        $this->postrolLateral = $postrolLateral;

        return $this;
    }

    public function getPontSaphenesGauche(): ?string
    {
        return $this->pontSaphenesGauche;
    }

    public function setPontSaphenesGauche(?string $pontSaphenesGauche): self
    {
        $this->pontSaphenesGauche = $pontSaphenesGauche;

        return $this;
    }

    public function getPontSaphenesDroit(): ?string
    {
        return $this->pontSaphenesDroit;
    }

    public function setPontSaphenesDroit(?string $pontSaphenesDroit): self
    {
        $this->pontSaphenesDroit = $pontSaphenesDroit;

        return $this;
    }

    public function getPontMammaire(): ?string
    {
        return $this->pontMammaire;
    }

    public function setPontMammaire(?string $pontMammaire): self
    {
        $this->pontMammaire = $pontMammaire;

        return $this;
    }

    public function getFEVentriculographie(): ?int
    {
        return $this->FEVentriculographie;
    }

    public function setFEVentriculographie(?int $FEVentriculographie): self
    {
        $this->FEVentriculographie = $FEVentriculographie;

        return $this;
    }

    public function getFEIsotopique(): ?int
    {
        return $this->FEIsotopique;
    }

    public function setFEIsotopique(?int $FEIsotopique): self
    {
        $this->FEIsotopique = $FEIsotopique;

        return $this;
    }
}
