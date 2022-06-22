<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SuiviRepository::class)
 */
class Suivi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

/**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $dateVisite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $recidive;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $dateSurvenue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $dyspnee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $douleur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $tabac;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $activite;

    /**
     * @ORM\Column(type="array", nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $alimentation = [];

    /**
     * @ORM\ManyToMany(targetEntity=QCM::class, cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     * @ORM\JoinTable(name="donnee_qcm_facteurs",
     *      joinColumns={@ORM\JoinColumn(name="facteurs_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="qcm_id", referencedColumnName="id", onDelete="CASCADE", unique=true)}
     *      )
     */
    private $facteurs;

    /**
     * @ORM\ManyToMany(targetEntity=QCM::class, cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     * @ORM\JoinTable(name="donnee_qcm_traitement",
     *      joinColumns={@ORM\JoinColumn(name="traitement_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="qcm_id", referencedColumnName="id", onDelete="CASCADE", unique=true)}
     *      )
     */
    private $traitement;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $debitFiltrationGlomerulaire;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $crp;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $cholesterol;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $ldl;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $hdl;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=1, nullable=true)
     * @Groups({"advancement", "export"})
     */
    private $hba1c;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="suivis", cascade={"persist"})
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity=Protocole::class, inversedBy="suivis", cascade={"persist", "remove"})
     */
    private $protocole;

    public function __construct()
    {
        $this->facteurs = new ArrayCollection();
        $this->traitement = new ArrayCollection();
        $this->genes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVisite(): ?\DateTimeInterface
    {
        return $this->dateVisite;
    }

    public function setDateVisite(?\DateTimeInterface $dateVisite): self
    {
        $this->dateVisite = $dateVisite;

        return $this;
    }

    public function getRecidive(): ?string
    {
        return $this->recidive;
    }

    public function setRecidive(?string $recidive): self
    {
        $this->recidive = $recidive;

        return $this;
    }

    public function getDateSurvenue(): ?\DateTimeInterface
    {
        return $this->dateSurvenue;
    }

    public function setDateSurvenue(?\DateTimeInterface $dateSurvenue): self
    {
        $this->dateSurvenue = $dateSurvenue;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDyspnee(): ?int
    {
        return $this->dyspnee;
    }

    public function setDyspnee(?int $dyspnee): self
    {
        $this->dyspnee = $dyspnee;

        return $this;
    }

    public function getDouleur(): ?int
    {
        return $this->douleur;
    }

    public function setDouleur(?int $douleur): self
    {
        $this->douleur = $douleur;

        return $this;
    }

    public function getTabac(): ?string
    {
        return $this->tabac;
    }

    public function setTabac(?string $tabac): self
    {
        $this->tabac = $tabac;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(?string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getAlimentation(): ?array
    {
        return $this->alimentation;
    }

    public function setAlimentation(?array $alimentation): self
    {
        $this->alimentation = $alimentation;

        return $this;
    }

    /**
     * @return Collection|QCM[]
     */
    public function getFacteurs(): Collection
    {
        return $this->facteurs;
    }

    public function addFacteur(QCM $facteur): self
    {
        if (!$this->facteurs->contains($facteur)) {
            $this->facteurs[] = $facteur;
        }

        return $this;
    }

    public function removeFacteur(QCM $facteur): self
    {
        if ($this->facteurs->contains($facteur)) {
            $this->facteurs->removeElement($facteur);
        }

        return $this;
    }

    /**
     * @return Collection|QCM[]
     */
    public function getTraitement(): Collection
    {
        return $this->traitement;
    }

    public function addTraitement(QCM $traitement): self
    {
        if (!$this->traitement->contains($traitement)) {
            $this->traitement[] = $traitement;
        }

        return $this;
    }

    public function removeTraitement(QCM $traitement): self
    {
        if ($this->traitement->contains($traitement)) {
            $this->traitement->removeElement($traitement);
        }

        return $this;
    }

    public function getDebitFiltrationGlomerulaire(): ?string
    {
        return $this->debitFiltrationGlomerulaire;
    }

    public function setDebitFiltrationGlomerulaire(?string $debitFiltrationGlomerulaire): self
    {
        $this->debitFiltrationGlomerulaire = $debitFiltrationGlomerulaire;

        return $this;
    }

    public function getCrp(): ?float
    {
        return $this->crp;
    }

    public function setCrp(?float $crp): self
    {
        $this->crp = $crp;

        return $this;
    }

    public function getCholesterol(): ?float
    {
        return $this->cholesterol;
    }

    public function setCholesterol(?float $cholesterol): self
    {
        $this->cholesterol = $cholesterol;

        return $this;
    }

    public function getLdl(): ?float
    {
        return $this->ldl;
    }

    public function setLdl(?float $ldl): self
    {
        $this->ldl = $ldl;

        return $this;
    }

    public function getHdl(): ?float
    {
        return $this->hdl;
    }

    public function setHdl(?float $hdl): self
    {
        $this->hdl = $hdl;

        return $this;
    }

    public function getHba1c(): ?float
    {
        return $this->hba1c;
    }

    public function setHba1c(?float $hba1c): self
    {
        $this->hba1c = $hba1c;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getProtocole(): ?Protocole
    {
        return $this->protocole;
    }

    public function setProtocole(?Protocole $protocole): self
    {
        $this->protocole = $protocole;

        return $this;
    }
}
