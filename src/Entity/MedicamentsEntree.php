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
     * @ORM\ManyToMany(targetEntity=Medicament::class, inversedBy="medicamentsEntrees")
     */
    private $medicaments;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NbMedicamentSemaine;

    /**
     * @ORM\Column(type="integer")
     */
    private $DelaiSousTraitement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pilulier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gestionMedicaments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $satisfaction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ConnaissanceDureeTraitement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $scoreMasCard;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $problemes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarques;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $effetIndesirable;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lequel;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $verbatimsMedicaments;

    /**
     * @ORM\OneToOne(targetEntity=Pack::class, cascade={"persist", "remove"})
     */
    private $verbatims;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $verbatimsApportSante;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $verbatimsSante;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vecuTraitement;

    /**
     * @ORM\OneToOne(targetEntity=pack::class, cascade={"persist", "remove"})
     */
    private $questionnaire;

    public function __construct()
    {
        $this->medicaments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNbMedicamentSemaine(): ?int
    {
        return $this->NbMedicamentSemaine;
    }

    public function setNbMedicamentSemaine(?int $NbMedicamentSemaine): self
    {
        $this->NbMedicamentSemaine = $NbMedicamentSemaine;

        return $this;
    }

    public function getDelaiSousTraitement(): ?int
    {
        return $this->DelaiSousTraitement;
    }

    public function setDelaiSousTraitement(int $DelaiSousTraitement): self
    {
        $this->DelaiSousTraitement = $DelaiSousTraitement;

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

    public function getGestionMedicaments(): ?string
    {
        return $this->gestionMedicaments;
    }

    public function setGestionMedicaments(?string $gestionMedicaments): self
    {
        $this->gestionMedicaments = $gestionMedicaments;

        return $this;
    }

    public function getSatisfaction(): ?string
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(?string $satisfaction): self
    {
        $this->satisfaction = $satisfaction;

        return $this;
    }

    public function getConnaissanceDureeTraitement(): ?string
    {
        return $this->ConnaissanceDureeTraitement;
    }

    public function setConnaissanceDureeTraitement(?string $ConnaissanceDureeTraitement): self
    {
        $this->ConnaissanceDureeTraitement = $ConnaissanceDureeTraitement;

        return $this;
    }

    public function getScoreMasCard(): ?int
    {
        return $this->scoreMasCard;
    }

    public function setScoreMasCard(?int $scoreMasCard): self
    {
        $this->scoreMasCard = $scoreMasCard;

        return $this;
    }

    public function getProblemes(): ?string
    {
        return $this->problemes;
    }

    public function setProblemes(?string $problemes): self
    {
        $this->problemes = $problemes;

        return $this;
    }

    public function getRemarques(): ?string
    {
        return $this->remarques;
    }

    public function setRemarques(?string $remarques): self
    {
        $this->remarques = $remarques;

        return $this;
    }

    public function getEffetIndesirable(): ?string
    {
        return $this->effetIndesirable;
    }

    public function setEffetIndesirable(?string $effetIndesirable): self
    {
        $this->effetIndesirable = $effetIndesirable;

        return $this;
    }

    public function getLequel(): ?string
    {
        return $this->lequel;
    }

    public function setLequel(?string $lequel): self
    {
        $this->lequel = $lequel;

        return $this;
    }

    public function getVerbatimsMedicaments(): ?string
    {
        return $this->verbatimsMedicaments;
    }

    public function setVerbatimsMedicaments(?string $verbatimsMedicaments): self
    {
        $this->verbatimsMedicaments = $verbatimsMedicaments;

        return $this;
    }

    public function getVerbatims(): ?Pack
    {
        return $this->verbatims;
    }

    public function setVerbatims(?Pack $verbatims): self
    {
        $this->verbatims = $verbatims;

        return $this;
    }

    public function getVerbatimsApportSante(): ?string
    {
        return $this->verbatimsApportSante;
    }

    public function setVerbatimsApportSante(?string $verbatimsApportSante): self
    {
        $this->verbatimsApportSante = $verbatimsApportSante;

        return $this;
    }

    public function getVerbatimsSante(): ?string
    {
        return $this->verbatimsSante;
    }

    public function setVerbatimsSante(?string $verbatimsSante): self
    {
        $this->verbatimsSante = $verbatimsSante;

        return $this;
    }

    public function getVecuTraitement(): ?string
    {
        return $this->vecuTraitement;
    }

    public function setVecuTraitement(?string $vecuTraitement): self
    {
        $this->vecuTraitement = $vecuTraitement;

        return $this;
    }

    public function getQuestionnaire(): ?pack
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire(?pack $questionnaire): self
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }
}
