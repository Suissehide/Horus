<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VisiteRepository::class)]
class Visite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?string $protocoleNom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['export', 'advancement'])]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(targetEntity: Patient::class, inversedBy: 'visites', cascade: ['persist'])]
    private $patient;

    #[ORM\ManyToOne(targetEntity: Protocole::class, inversedBy: 'visites', cascade: ['persist', 'remove'])]
    #[Groups(['export'])]
    private $protocole;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getProtocoleNom(): ?string
    {
        return $this->protocoleNom;
    }

    public function setProtocoleNom(?string $protocoleNom): self
    {
        $this->protocoleNom = $protocoleNom;

        return $this;
    }
}
