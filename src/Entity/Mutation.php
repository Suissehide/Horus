<?php

namespace App\Entity;

use App\Repository\MutationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MutationRepository::class)]
class Mutation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $gene = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $nomenclature = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1, nullable: true)]
    #[Groups(['export'])]
    private ?string $vaf = null;

    #[ORM\ManyToOne(inversedBy: 'mutations')]
    private ?Chip $chip = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGene(): ?string
    {
        return $this->gene;
    }

    public function setGene(?string $gene): self
    {
        $this->gene = $gene;

        return $this;
    }

    public function getNomenclature(): ?string
    {
        return $this->nomenclature;
    }

    public function setNomenclature(?string $nomenclature): self
    {
        $this->nomenclature = $nomenclature;

        return $this;
    }

    public function getVaf(): ?string
    {
        return $this->vaf;
    }

    public function setVaf(?string $vaf): self
    {
        $this->vaf = $vaf;

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
}
