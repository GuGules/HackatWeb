<?php

namespace App\Entity;

use App\Repository\CompetenceTechRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceTechRepository::class)]
class CompetenceTech
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, coachTechnique>
     */
    #[ORM\ManyToMany(targetEntity: coachTechnique::class, inversedBy: 'lesCompetencesTechs')]
    private Collection $lesTechniques;

    public function __construct()
    {
        $this->lesTechniques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, coachTechnique>
     */
    public function getLesTechniques(): Collection
    {
        return $this->lesTechniques;
    }

    public function addLesTechnique(coachTechnique $lesTechnique): static
    {
        if (!$this->lesTechniques->contains($lesTechnique)) {
            $this->lesTechniques->add($lesTechnique);
        }

        return $this;
    }

    public function removeLesTechnique(coachTechnique $lesTechnique): static
    {
        $this->lesTechniques->removeElement($lesTechnique);

        return $this;
    }
}
