<?php

namespace App\Entity;

use App\Repository\MedicamentsEntreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentsEntreeRepository::class)
 */
class MedicamentsEntree
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreMedicamentsJour;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombrePrisesSemaine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pilulier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gestion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $priseDecalee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $geneHeurePrise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $evaluation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @ORM\ManyToMany(targetEntity=Medicament::class, inversedBy="medicamentsEntrees")
     */
    private $medicaments;

    public function __construct()
    {
        $this->medicaments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreMedicamentsJour(): ?int
    {
        return $this->nombreMedicamentsJour;
    }

    public function setNombreMedicamentsJour(?int $nombreMedicamentsJour): self
    {
        $this->nombreMedicamentsJour = $nombreMedicamentsJour;

        return $this;
    }

    public function getNombrePrisesSemaine(): ?int
    {
        return $this->nombrePrisesSemaine;
    }

    public function setNombrePrisesSemaine(?int $nombrePrisesSemaine): self
    {
        $this->nombrePrisesSemaine = $nombrePrisesSemaine;

        return $this;
    }

    public function getPilulier(): ?string
    {
        return $this->pilulier;
    }

    public function setPilulier(?string $pilulier): self
    {
        $this->pilulier = $pilulier;

        return $this;
    }

    public function getGestion(): ?string
    {
        return $this->gestion;
    }

    public function setGestion(?string $gestion): self
    {
        $this->gestion = $gestion;

        return $this;
    }

    public function getPriseDecalee(): ?string
    {
        return $this->priseDecalee;
    }

    public function setPriseDecalee(?string $priseDecalee): self
    {
        $this->priseDecalee = $priseDecalee;

        return $this;
    }

    public function getGeneHeurePrise(): ?string
    {
        return $this->geneHeurePrise;
    }

    public function setGeneHeurePrise(?string $geneHeurePrise): self
    {
        $this->geneHeurePrise = $geneHeurePrise;

        return $this;
    }

    public function getEvaluation(): ?string
    {
        return $this->evaluation;
    }

    public function setEvaluation(?string $evaluation): self
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return Collection|Medicament[]
     */
    public function getMedicaments(): Collection
    {
        return $this->medicaments;
    }

    public function addMedicament(Medicament $medicament): self
    {
        if (!$this->medicaments->contains($medicament)) {
            $this->medicaments[] = $medicament;
        }

        return $this;
    }

    public function removeMedicament(Medicament $medicament): self
    {
        $this->medicaments->removeElement($medicament);

        return $this;
    }
}
