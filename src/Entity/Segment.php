<?php

namespace App\Entity;

use App\Repository\SegmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SegmentRepository::class)]
class Segment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private $segment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSegment(): ?string
    {
        return $this->segment;
    }

    public function setSegment(?string $segment): self
    {
        $this->segment = $segment;

        return $this;
    }
}
