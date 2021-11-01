<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentRepository::class)
 */
class Medicament
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=MedicamentsEntree::class, mappedBy="medicaments")
     */
    private $medicamentsEntrees;

    public function __construct()
    {
        $this->medicamentsEntrees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|MedicamentsEntree[]
     */
    public function getMedicamentsEntrees(): Collection
    {
        return $this->medicamentsEntrees;
    }

    public function addMedicamentsEntree(MedicamentsEntree $medicamentsEntree): self
    {
        if (!$this->medicamentsEntrees->contains($medicamentsEntree)) {
            $this->medicamentsEntrees[] = $medicamentsEntree;
            $medicamentsEntree->addMedicament($this);
        }

        return $this;
    }

    public function removeMedicamentsEntree(MedicamentsEntree $medicamentsEntree): self
    {
        if ($this->medicamentsEntrees->removeElement($medicamentsEntree)) {
            $medicamentsEntree->removeMedicament($this);
        }

        return $this;
    }
}
