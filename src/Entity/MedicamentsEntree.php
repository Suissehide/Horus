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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $DelaiSousTraitement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pilulier;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $gestionMedicaments = [];

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
     * @ORM\Column(type="array", nullable=true)
     */
    private $problemes = [];

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
     * @ORM\ManyToMany(targetEntity=QCM::class, cascade={"persist", "remove"})
     * @ORM\JoinTable(name="medicaments_entree_qcm_verbatims",
     *      joinColumns={@ORM\JoinColumn(name="verbatims_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="qcm_id", referencedColumnName="id", onDelete="CASCADE", unique=true)}
     *      )
     */
    private $verbatims;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $verbatimsApportSante;

    /**
     * @ORM\ManyToMany(targetEntity=QCM::class, cascade={"persist", "remove"})
     * @ORM\JoinTable(name="medicaments_entree_qcm_verbatims_sante",
     *      joinColumns={@ORM\JoinColumn(name="verbatims_sante_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="qcm_id", referencedColumnName="id", onDelete="CASCADE", unique=true)}
     *      )
     */
    private $verbatimsSante;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vecuTraitement;

    /**
     * @ORM\ManyToMany(targetEntity=QCM::class, cascade={"persist", "remove"})
     * @ORM\JoinTable(name="medicaments_entree_qcm_questionnaire",
     *      joinColumns={@ORM\JoinColumn(name="questionnaire_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="qcm_id", referencedColumnName="id", onDelete="CASCADE", unique=true)}
     *      )
     */
    private $questionnaire;

    public function __construct()
    {
        $this->verbatims = new ArrayCollection();
        $this->verbatimsSante = new ArrayCollection();
        $this->questionnaire = new ArrayCollection();
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

    public function setDelaiSousTraitement(?int $DelaiSousTraitement): self
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

    public function getGestionMedicaments(): ?array
    {
        return $this->gestionMedicaments;
    }

    public function setGestionMedicaments(?array $gestionMedicaments): self
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

    public function getProblemes(): ?array
    {
        return $this->problemes;
    }

    public function setProblemes(?array $problemes): self
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

    /**
     * @return Collection<int, QCM>
     */
    public function getVerbatims(): Collection
    {
        return $this->verbatims;
    }

    public function addVerbatim(QCM $verbatim): self
    {
        if (!$this->verbatims->contains($verbatim)) {
            $this->verbatims[] = $verbatim;
        }

        return $this;
    }

    public function removeVerbatim(QCM $verbatim): self
    {
        $this->verbatims->removeElement($verbatim);

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

    /**
     * @return Collection<int, QCM>
     */
    public function getVerbatimsSante(): Collection
    {
        return $this->verbatimsSante;
    }

    public function addVerbatimsSante(QCM $verbatimsSante): self
    {
        if (!$this->verbatimsSante->contains($verbatimsSante)) {
            $this->verbatimsSante[] = $verbatimsSante;
        }

        return $this;
    }

    public function removeVerbatimsSante(QCM $verbatimsSante): self
    {
        if ($this->verbatimsSante->contains($verbatimsSante)) {
            $this->verbatimsSante->removeElement($verbatimsSante);
        }

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

    /**
     * @return Collection<int, QCM>
     */
    public function getQuestionnaire(): Collection
    {
        return $this->questionnaire;
    }

    public function addQuestionnaire(QCM $questionnaire): self
    {
        if (!$this->questionnaire->contains($questionnaire)) {
            $this->questionnaire[] = $questionnaire;
        }

        return $this;
    }

    public function removeQuestionnaire(QCM $questionnaire): self
    {
        if ($this->questionnaire->contains($questionnaire)) {
            $this->questionnaire->removeElement($questionnaire);
        }

        return $this;
    }
}
