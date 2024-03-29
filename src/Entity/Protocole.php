<?php

namespace App\Entity;

use App\Repository\ProtocoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProtocoleRepository::class)]
class Protocole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'array', nullable: true)]
    private $fiches = [];

    #[ORM\OneToOne(targetEntity: 'App\Entity\AngioplastiePontage', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $angioplastiePontage;

    #[ORM\OneToOne(targetEntity: 'App\Entity\BFR', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $BFR;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private ?Chip $chip = null;

    #[ORM\OneToOne(targetEntity: 'App\Entity\Catheterisation', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $catheterisation;

    #[ORM\OneToOne(targetEntity: 'App\Entity\AnatomieCoronaire', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $anatomieCoronaire;

    #[ORM\OneToOne(targetEntity: 'App\Entity\Echographie', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $echographie;

    #[ORM\OneToOne(targetEntity: 'App\Entity\EchographieCardiaque', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $echographieCardiaque;

    #[ORM\OneToOne(targetEntity: 'App\Entity\EchographieVasculaire', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $echographieVasculaire;

    #[ORM\OneToOne(targetEntity: 'App\Entity\MedicamentsEntree', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $medicamentsEntree;

    #[ORM\OneToOne(targetEntity: 'App\Entity\NeuroPsychologie', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $neuroPsychologie;

    #[ORM\OneToOne(targetEntity: 'App\Entity\Scintigraphie', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $scintigraphie;

    #[ORM\OneToOne(targetEntity: 'App\Entity\TestEffort', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $testEffort;

    #[ORM\OneToOne(targetEntity: 'App\Entity\Suivi', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $suivi;

    #[ORM\OneToMany(targetEntity: Visite::class, mappedBy: 'protocole', cascade: ['persist', 'remove'])]
    private $visites;

    public function __construct()
    {
        $this->visites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiches(): array
    {
        return $this->fiches;
    }

    public function setFiches(?array $fiches): self
    {
        $this->fiches = $fiches;

        return $this;
    }

    public function getMedicamentsEntree(): ?MedicamentsEntree
    {
        return $this->medicamentsEntree;
    }

    public function setMedicamentsEntree(?MedicamentsEntree $medicamentsEntree): self
    {
        $this->medicamentsEntree = $medicamentsEntree;

        return $this;
    }

    public function getAngioplastiePontage(): ?AngioplastiePontage
    {
        return $this->angioplastiePontage;
    }

    public function setAngioplastiePontage(?AngioplastiePontage $angioplastiePontage): self
    {
        $this->angioplastiePontage = $angioplastiePontage;

        return $this;
    }

    public function getBFR(): ?BFR
    {
        return $this->BFR;
    }

    public function setBFR(?BFR $BFR): self
    {
        $this->BFR = $BFR;

        return $this;
    }

    public function getChip(): ?Chip
    {
        return $this->chip;
    }

    public function setChip(?Chip $chip): self
    {
        $this->chip = $chip;

        return $this;
    }

    public function getCatheterisation(): ?Catheterisation
    {
        return $this->catheterisation;
    }

    public function setCatheterisation(?Catheterisation $catheterisation): self
    {
        $this->catheterisation = $catheterisation;

        return $this;
    }

    public function getAnatomieCoronaire(): ?AnatomieCoronaire
    {
        return $this->anatomieCoronaire;
    }

    public function setAnatomieCoronaire(?AnatomieCoronaire $anatomieCoronaire): self
    {
        $this->anatomieCoronaire = $anatomieCoronaire;

        return $this;
    }

    public function getEchographie(): ?Echographie
    {
        return $this->echographie;
    }

    public function setEchographie(?Echographie $echographie): self
    {
        $this->echographie = $echographie;

        return $this;
    }

    public function getEchographieCardiaque(): ?EchographieCardiaque
    {
        return $this->echographieCardiaque;
    }

    public function setEchographieCardiaque(?EchographieCardiaque $echographieCardiaque): self
    {
        $this->echographieCardiaque = $echographieCardiaque;

        return $this;
    }

    public function getEchographieVasculaire(): ?EchographieVasculaire
    {
        return $this->echographieVasculaire;
    }

    public function setEchographieVasculaire(?EchographieVasculaire $echographieVasculaire): self
    {
        $this->echographieVasculaire = $echographieVasculaire;

        return $this;
    }

    public function getNeuroPsychologie(): ?NeuroPsychologie
    {
        return $this->neuroPsychologie;
    }

    public function setNeuroPsychologie(?NeuroPsychologie $neuroPsychologie): self
    {
        $this->neuroPsychologie = $neuroPsychologie;

        return $this;
    }

    public function getScintigraphie(): ?Scintigraphie
    {
        return $this->scintigraphie;
    }

    public function setScintigraphie(?Scintigraphie $scintigraphie): self
    {
        $this->scintigraphie = $scintigraphie;

        return $this;
    }

    public function getTestEffort(): ?TestEffort
    {
        return $this->testEffort;
    }

    public function setTestEffort(?TestEffort $testEffort): self
    {
        $this->testEffort = $testEffort;

        return $this;
    }

    public function getSuivi(): ?Suivi
    {
        return $this->suivi;
    }

    public function setSuivi(?Suivi $suivi): self
    {
        $this->suivi = $suivi;

        return $this;
    }

    /**
     * @return Collection<int, Visite>
     */
    public function getVisites(): Collection
    {
        return $this->visites;
    }

    public function addVisite(Visite $visite): self
    {
        if (!$this->visites->contains($visite)) {
            $this->visites->add($visite);
            $visite->setProtocole($this);
        }

        return $this;
    }

    public function removeVisite(Visite $visite): self
    {
        if ($this->visites->removeElement($visite)) {
            // set the owning side to null (unless already changed)
            if ($visite->getProtocole() === $this) {
                $visite->setProtocole(null);
            }
        }

        return $this;
    }
}
