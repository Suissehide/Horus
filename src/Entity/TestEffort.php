<?php

namespace App\Entity;

use App\Repository\TestEffortRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TestEffortRepository::class)]
class TestEffort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $maquille;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $type;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $duree;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $watts;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $frequenceMaxPercent;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $ECGModifie;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $mesure;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $symptomes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaquille(): ?string
    {
        return $this->maquille;
    }

    public function setMaquille(?string $maquille): self
    {
        $this->maquille = $maquille;

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

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getWatts(): ?int
    {
        return $this->watts;
    }

    public function setWatts(?int $watts): self
    {
        $this->watts = $watts;

        return $this;
    }

    public function getFrequenceMaxPercent(): ?int
    {
        return $this->frequenceMaxPercent;
    }

    public function setFrequenceMaxPercent(?int $frequenceMaxPercent): self
    {
        $this->frequenceMaxPercent = $frequenceMaxPercent;

        return $this;
    }

    public function getECGModifie(): ?string
    {
        return $this->ECGModifie;
    }

    public function setECGModifie(?string $ECGModifie): self
    {
        $this->ECGModifie = $ECGModifie;

        return $this;
    }

    public function getMesure(): ?int
    {
        return $this->mesure;
    }

    public function setMesure(?int $mesure): self
    {
        $this->mesure = $mesure;

        return $this;
    }

    public function getSymptomes(): ?string
    {
        return $this->symptomes;
    }

    public function setSymptomes(?string $symptomes): self
    {
        $this->symptomes = $symptomes;

        return $this;
    }
}
