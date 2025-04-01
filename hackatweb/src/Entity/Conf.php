<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\Entity(repositoryClass: ConfRepository::class)]

class Conf extends Evenement {
    #[ORM\Column(length: 255)]
    private ?string $intervenant = null;
    #[ORM\Column(length: 255)]
    private ?string $theme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailIntervenant = null;

    public function getIntervenant(): ?string
    {
        return $this->intervenant;
    }

    public function setIntervenant(string $intervenant): static
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->intervenant;
    }

    public function setTheme(string $intervenant): static
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    public function getEmailIntervenant(): ?string
    {
        return $this->emailIntervenant;
    }

    public function setEmailIntervenant(?string $emailIntervenant): static
    {
        $this->emailIntervenant = $emailIntervenant;

        return $this;
    }
}