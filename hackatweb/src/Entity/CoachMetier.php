<?php

namespace App\Entity;

use App\Repository\CoachMetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachMetierRepository::class)]
class CoachMetier extends Coach
{
    /**
     * @var Collection<int, CompetenceSecteur>
     */
    #[ORM\ManyToMany(targetEntity: CompetenceSecteur::class, mappedBy: 'lesMetiers')]
    private Collection $lesCompetencesSecteurs;

    public function __construct()
    {
        parent::__construct();
        $this->lesCompetencesSecteurs = new ArrayCollection();
    }

    /**
     * @return Collection<int, CompetenceSecteur>
     */
    public function getLesCompetencesSecteurs(): Collection
    {
        return $this->lesCompetencesSecteurs;
    }

    public function addLesCompetencesSecteur(CompetenceSecteur $lesCompetencesSecteur): static
    {
        if (!$this->lesCompetencesSecteurs->contains($lesCompetencesSecteur)) {
            $this->lesCompetencesSecteurs->add($lesCompetencesSecteur);
            $lesCompetencesSecteur->addLesMetier($this);
        }

        return $this;
    }

    public function removeLesCompetencesSecteur(CompetenceSecteur $lesCompetencesSecteur): static
    {
        if ($this->lesCompetencesSecteurs->removeElement($lesCompetencesSecteur)) {
            $lesCompetencesSecteur->removeLesMetier($this);
        }

        return $this;
    }
}
