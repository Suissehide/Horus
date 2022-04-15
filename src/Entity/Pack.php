<?php

namespace App\Entity;

use App\Repository\PackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PackRepository::class)
 */
class Pack
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=QCM::class, mappedBy="pack")
     */
    private $qcm;

    /**
     * @ORM\OneToMany(targetEntity=BMQ::class, mappedBy="pack")
     */
    private $bmq;

    public function __construct()
    {
        $this->qcm = new ArrayCollection();
        $this->bmq = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|QCM[]
     */
    public function getQcm(): Collection
    {
        return $this->qcm;
    }

    public function addQcm(QCM $qcm): self
    {
        if (!$this->qcm->contains($qcm)) {
            $this->qcm[] = $qcm;
            $qcm->setPack($this);
        }

        return $this;
    }

    public function removeQcm(QCM $qcm): self
    {
        if ($this->qcm->removeElement($qcm)) {
            // set the owning side to null (unless already changed)
            if ($qcm->getPack() === $this) {
                $qcm->setPack(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BMQ[]
     */
    public function getBmq(): Collection
    {
        return $this->bmq;
    }

    public function addBmq(BMQ $bmq): self
    {
        if (!$this->bmq->contains($bmq)) {
            $this->bmq[] = $bmq;
            $bmq->setPack($this);
        }

        return $this;
    }

    public function removeBmq(BMQ $bmq): self
    {
        if ($this->bmq->removeElement($bmq)) {
            // set the owning side to null (unless already changed)
            if ($bmq->getPack() === $this) {
                $bmq->setPack(null);
            }
        }

        return $this;
    }
}
