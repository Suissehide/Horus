<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SuiviRepository::class)]
class Suivi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $recidive;

    #[ORM\Column(type: 'date', nullable: true)]
    #[Groups(['export'])]
    private $dateSurvenue;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $type;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $dyspnee;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $douleur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $tabac;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $activite;

    #[ORM\Column(type: 'array', nullable: true)]
    #[Groups(['export'])]
    private $alimentation = [];

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $hba1c = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $hypertension = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $dyslipidemie = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $poids = null;

    #[ORM\JoinTable(name: 'donnee_qcm_facteurs')]
    #[ORM\JoinColumn(name: 'facteurs_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    #[ORM\InverseJoinColumn(name: 'qcm_id', referencedColumnName: 'id', onDelete: 'CASCADE', unique: true)]
    #[ORM\ManyToMany(targetEntity: QCM::class, cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $facteurs;

    #[ORM\JoinTable(name: 'donnee_qcm_traitement')]
    #[ORM\JoinColumn(name: 'traitement_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    #[ORM\InverseJoinColumn(name: 'qcm_id', referencedColumnName: 'id', onDelete: 'CASCADE', unique: true)]
    #[ORM\ManyToMany(targetEntity: QCM::class, cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $traitement;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['export'])]
    private $debitFiltrationGlomerulaire;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['export'])]
    private $crp;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['export'])]
    private $triglycerides;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['export'])]
    private $ldl;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['export'])]
    private $hdl;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $score = null;

    public function __construct()
    {
        $this->facteurs = new ArrayCollection();
        $this->traitement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAlimentation(): array
    {
        return $this->alimentation;
    }

    public function setAlimentation(?array $alimentation): self
    {
        $this->alimentation = $alimentation;

        return $this;
    }

    public function getHba1c(): ?string
    {
        return $this->hba1c;
    }

    public function setHba1c(?string $hba1c): self
    {
        $this->hba1c = $hba1c;

        return $this;
    }

    public function getHypertension(): ?string
    {
        return $this->hypertension;
    }

    public function setHypertension(?string $hypertension): self
    {
        $this->hypertension = $hypertension;

        return $this;
    }

    public function getDyslipidemie(): ?string
    {
        return $this->dyslipidemie;
    }

    public function setDyslipidemie(?string $dyslipidemie): self
    {
        $this->dyslipidemie = $dyslipidemie;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * @return Collection<int, QCM>
     */
    public function getFacteurs(): Collection
    {
        return $this->facteurs;
    }

    public function addFacteur(QCM $facteur): self
    {
        if (!$this->facteurs->contains($facteur)) {
            $this->facteurs->add($facteur);
        }

        return $this;
    }

    public function removeFacteur(QCM $facteur): self
    {
        $this->facteurs->removeElement($facteur);

        return $this;
    }

    /**
     * @return Collection<int, QCM>
     */
    public function getTraitement(): Collection
    {
        return $this->traitement;
    }

    public function addTraitement(QCM $traitement): self
    {
        if (!$this->traitement->contains($traitement)) {
            $this->traitement->add($traitement);
        }

        return $this;
    }

    public function removeTraitement(QCM $traitement): self
    {
        $this->traitement->removeElement($traitement);

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

    public function getCrp(): ?string
    {
        return $this->crp;
    }

    public function setCrp(?string $crp): self
    {
        $this->crp = $crp;

        return $this;
    }

    public function getTriglycerides(): ?string
    {
        return $this->triglycerides;
    }

    public function setTriglycerides(?string $triglycerides): self
    {
        $this->triglycerides = $triglycerides;

        return $this;
    }

    public function getLdl(): ?string
    {
        return $this->ldl;
    }

    public function setLdl(?string $ldl): self
    {
        $this->ldl = $ldl;

        return $this;
    }

    public function getHdl(): ?string
    {
        return $this->hdl;
    }

    public function setHdl(?string $hdl): self
    {
        $this->hdl = $hdl;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }
}
