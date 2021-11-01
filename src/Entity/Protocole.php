<?php

namespace App\Entity;

use App\Repository\ProtocoleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProtocoleRepository::class)
 */
class Protocole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $fiches = [];

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\MedicamentsEntree", cascade={"persist", "remove"})
     * @Groups({"advancement", "export"})
     */
    private $medicamentsEntree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiches(): ?array
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
}
