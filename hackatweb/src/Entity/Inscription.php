<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_saisie = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    private ?Hackathon $Hackathon = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    private ?Participants $participant;

    
    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSaisie(): ?\DateTimeInterface
    {
        return $this->date_saisie;
    }

    public function setDateSaisie(\DateTimeInterface $date_saisie): static
    {
        $this->date_saisie = $date_saisie;

        return $this;
    }

    public function getHackathon(): ?Hackathon
    {
        return $this->Hackathon;
    }

    public function setHackathon(?Hackathon $Hackathon): static
    {
        $this->Hackathon = $Hackathon;

        return $this;
    }

    public function getParticipant(): ?Participants
    {
        return $this->participant;
    }

    public function setParticipant(?Participants $participant): static
    {
        $this->participant = $participant;

        return $this;
    }


}
