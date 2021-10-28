<?php

namespace App\Entity;

use App\Repository\ProtocoleRepository;
use Doctrine\ORM\Mapping as ORM;

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
}
