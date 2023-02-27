<?php

namespace App\Entity;

use App\Repository\EchographieCardiaqueRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EchographieCardiaqueRepository::class)]
class EchographieCardiaque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    #[Groups(['export'])]
    private $date;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $fcRepos;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $fcMax;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $rythmeCardiaque;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $taSystoliqueRepos;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $taSystoliquePic;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $basalEchographie;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $basalFMTPercent;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $basalResult;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $basalNumberSegment;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $basalIschemieLocation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $stressEchographie;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $stressFMTPercent;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $stressResult;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['export'])]
    private $stressNumberSegment;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups(['export'])]
    private $stressIschemieLocation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBasalEchographie(): ?string
    {
        return $this->basalEchographie;
    }

    public function setBasalEchographie(?string $basalEchographie): self
    {
        $this->basalEchographie = $basalEchographie;

        return $this;
    }

    public function getBasalFMTPercent(): ?int
    {
        return $this->basalFMTPercent;
    }

    public function setBasalFMTPercent(?int $basalFMTPercent): self
    {
        $this->basalFMTPercent = $basalFMTPercent;

        return $this;
    }

    public function getBasalResult(): ?string
    {
        return $this->basalResult;
    }

    public function setBasalResult(?string $basalResult): self
    {
        $this->basalResult = $basalResult;

        return $this;
    }

    public function getBasalNumberSegment(): ?int
    {
        return $this->basalNumberSegment;
    }

    public function setBasalNumberSegment(?int $basalNumberSegment): self
    {
        $this->basalNumberSegment = $basalNumberSegment;

        return $this;
    }

    public function getBasalIschemieLocation(): ?string
    {
        return $this->basalIschemieLocation;
    }

    public function setBasalIschemieLocation(?string $basalIschemieLocation): self
    {
        $this->basalIschemieLocation = $basalIschemieLocation;

        return $this;
    }

    public function getStressEchographie(): ?string
    {
        return $this->stressEchographie;
    }

    public function setStressEchographie(?string $stressEchographie): self
    {
        $this->stressEchographie = $stressEchographie;

        return $this;
    }

    public function getStressFMTPercent(): ?int
    {
        return $this->stressFMTPercent;
    }

    public function setStressFMTPercent(?int $stressFMTPercent): self
    {
        $this->stressFMTPercent = $stressFMTPercent;

        return $this;
    }

    public function getStressResult(): ?string
    {
        return $this->stressResult;
    }

    public function setStressResult(?string $stressResult): self
    {
        $this->stressResult = $stressResult;

        return $this;
    }

    public function getStressNumberSegment(): ?int
    {
        return $this->stressNumberSegment;
    }

    public function setStressNumberSegment(?int $stressNumberSegment): self
    {
        $this->stressNumberSegment = $stressNumberSegment;

        return $this;
    }

    public function getStressIschemieLocation(): ?string
    {
        return $this->stressIschemieLocation;
    }

    public function setStressIschemieLocation(?string $stressIschemieLocation): self
    {
        $this->stressIschemieLocation = $stressIschemieLocation;

        return $this;
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

    public function getFcRepos(): ?int
    {
        return $this->fcRepos;
    }

    public function setFcRepos(?int $fcRepos): self
    {
        $this->fcRepos = $fcRepos;

        return $this;
    }

    public function getFcMax(): ?int
    {
        return $this->fcMax;
    }

    public function setFcMax(?int $fcMax): self
    {
        $this->fcMax = $fcMax;

        return $this;
    }

    public function getRythmeCardiaque(): ?string
    {
        return $this->rythmeCardiaque;
    }

    public function setRythmeCardiaque(?string $rythmeCardiaque): self
    {
        $this->rythmeCardiaque = $rythmeCardiaque;

        return $this;
    }

    public function getTaSystoliqueRepos(): ?int
    {
        return $this->taSystoliqueRepos;
    }

    public function setTaSystoliqueRepos(?int $taSystoliqueRepos): self
    {
        $this->taSystoliqueRepos = $taSystoliqueRepos;

        return $this;
    }

    public function getTaSystoliquePic(): ?int
    {
        return $this->taSystoliquePic;
    }

    public function setTaSystoliquePic(?int $taSystoliquePic): self
    {
        $this->taSystoliquePic = $taSystoliquePic;

        return $this;
    }
}
