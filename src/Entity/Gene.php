<?php

namespace App\Entity;

use App\Repository\GeneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GeneRepository::class)]
class Gene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $mutation = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['export'])]
    private ?int $frequence = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $classification = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getMutation(): ?string
    {
        return $this->mutation;
    }

    public function setMutation(?string $mutation): self
    {
        $this->mutation = $mutation;

        return $this;
    }

    public function getFrequence(): ?int
    {
        return $this->frequence;
    }

    public function setFrequence(?int $frequence): self
    {
        $this->frequence = $frequence;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(?string $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
