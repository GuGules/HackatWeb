<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\Entity(repositoryClass: AtelierRepository::class)]

class Atelier extends Evenement {
    #[ORM\Column]
    private ?int $nbPlaces = null;

    /**
     * @var Collection<int, ParticipantAtelier>
     */
    #[ORM\OneToMany(targetEntity: ParticipantAtelier::class, mappedBy: 'atelier')]
    private Collection $participants;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): static
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    /**
     * @return Collection<int, ParticipantAtelier>
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(ParticipantAtelier $participant): static
    {
        if (!$this->participants->contains($participant)) {
            $this->participants->add($participant);
            $participant->setAtelier($this);
        }

        return $this;
    }

    public function removeParticipant(ParticipantAtelier $participant): static
    {
        if ($this->participants->removeElement($participant)) {
            // set the owning side to null (unless already changed)
            if ($participant->getAtelier() === $this) {
                $participant->setAtelier(null);
            }
        }

        return $this;
    }
}