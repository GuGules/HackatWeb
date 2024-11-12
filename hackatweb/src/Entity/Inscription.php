<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
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

    #[ORM\OneToOne(mappedBy: 'inscription', cascade: ['persist', 'remove'])]
    private ?Participants $participants = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    private ?Hackathon $Hackathon = null;

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

    public function getParticipants(): ?Participants
    {
        return $this->participants;
    }

    public function setParticipants(?Participants $participants): static
    {
        // unset the owning side of the relation if necessary
        if ($participants === null && $this->participants !== null) {
            $this->participants->setInscription(null);
        }

        // set the owning side of the relation if necessary
        if ($participants !== null && $participants->getInscription() !== $this) {
            $participants->setInscription($this);
        }

        $this->participants = $participants;

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
}
