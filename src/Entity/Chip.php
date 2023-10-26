<?php

namespace App\Entity;

use App\Repository\ChipRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ChipRepository::class)]
class Chip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export'])]
    private ?string $chip = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['export'])]
    private ?int $numberOfClones = null;

    #[ORM\OneToMany(mappedBy: 'chip', targetEntity: Mutation::class, cascade: ["persist", "remove"])]
    #[Groups(['export'])]
    private Collection $mutations;

    public function __construct()
    {
        $this->mutations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChip(): ?string
    {
        return $this->chip;
    }

    public function setChip(?string $chip): self
    {
        $this->chip = $chip;

        return $this;
    }

    public function getNumberOfClones(): ?int
    {
        return $this->numberOfClones;
    }

    public function setNumberOfClones(?int $numberOfClones): self
    {
        $this->numberOfClones = $numberOfClones;

        return $this;
    }

    /**
     * @return Collection<int, Mutation>
     */
    public function getMutations(): Collection
    {
        return $this->mutations;
    }

    public function addMutation(Mutation $mutation): self
    {
        if (!$this->mutations->contains($mutation)) {
            $this->mutations->add($mutation);
            $mutation->setChip($this);
        }

        return $this;
    }

    public function removeMutation(Mutation $mutation): self
    {
        if ($this->mutations->removeElement($mutation)) {
            // set the owning side to null (unless already changed)
            if ($mutation->getChip() === $this) {
                $mutation->setChip(null);
            }
        }

        return $this;
    }
}
