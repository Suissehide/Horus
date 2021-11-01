<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisiteRepository::class)
 */
class Visite
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
    private $motifs = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotifs(): ?array
    {
        return $this->motifs;
    }

    public function setMotifs(?array $motifs): self
    {
        $this->motifs = $motifs;

        return $this;
    }
}
