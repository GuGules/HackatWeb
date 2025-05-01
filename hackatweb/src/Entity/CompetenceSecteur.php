<?php

namespace App\Entity;

use App\Repository\CompetenceSecteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceSecteurRepository::class)]
class CompetenceSecteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, coachMetier>
     */
    #[ORM\ManyToMany(targetEntity: coachMetier::class, inversedBy: 'lesCompetencesSecteurs')]
    private Collection $lesMetiers;

    public function __construct()
    {
        $this->lesMetiers = new ArrayCollection();
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
     * @return Collection<int, coachMetier>
     */
    public function getLesMetiers(): Collection
    {
        return $this->lesMetiers;
    }

    public function addLesMetier(coachMetier $lesMetier): static
    {
        if (!$this->lesMetiers->contains($lesMetier)) {
            $this->lesMetiers->add($lesMetier);
        }

        return $this;
    }

    public function removeLesMetier(coachMetier $lesMetier): static
    {
        $this->lesMetiers->removeElement($lesMetier);

        return $this;
    }
}
