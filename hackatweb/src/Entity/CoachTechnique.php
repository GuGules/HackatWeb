<?php

namespace App\Entity;

use App\Repository\CoachTechniqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachTechniqueRepository::class)]
class CoachTechnique extends Coach
{
    /**
     * @var Collection<int, CompetenceTech>
     */
    #[ORM\ManyToMany(targetEntity: CompetenceTech::class, mappedBy: 'lesTechniques')]
    private Collection $lesCompetencesTechs;

    public function __construct()
    {
        parent::__construct();
        $this->lesCompetencesTechs = new ArrayCollection();
    }

    /**
     * @return Collection<int, CompetenceTech>
     */
    public function getLesCompetencesTechs(): Collection
    {
        return $this->lesCompetencesTechs;
    }

    public function addLesCompetencesTech(CompetenceTech $lesCompetencesTech): static
    {
        if (!$this->lesCompetencesTechs->contains($lesCompetencesTech)) {
            $this->lesCompetencesTechs->add($lesCompetencesTech);
            $lesCompetencesTech->addLesTechnique($this);
        }

        return $this;
    }

    public function removeLesCompetencesTech(CompetenceTech $lesCompetencesTech): static
    {
        if ($this->lesCompetencesTechs->removeElement($lesCompetencesTech)) {
            $lesCompetencesTech->removeLesTechnique($this);
        }

        return $this;
    }
}
