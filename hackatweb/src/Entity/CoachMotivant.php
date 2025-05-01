<?php

namespace App\Entity;

use App\Repository\CoachMotivantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachMotivantRepository::class)]
class CoachMotivant extends Coach
{

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $specialite = null;

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }
}
