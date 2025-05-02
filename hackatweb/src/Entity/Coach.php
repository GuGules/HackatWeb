<?php

namespace App\Entity;
use App\Entity\CoachMetier;
use App\Entity\CoachMotivant;
use App\Entity\CoachTechnique;
use App\Repository\CoachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoachRepository::class)]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['metier' => CoachMetier::class, 'motivant' => CoachMotivant::class, 'technique' => CoachTechnique::class])]
class Coach
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedinAccount = null;

    /**
     * @var Collection<int, hackathon>
     */
    #[ORM\ManyToMany(targetEntity: hackathon::class, inversedBy: 'lesCoachs')]
    private Collection $lesHackathons;

    public function __construct()
    {
        $this->lesHackathons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLinkedinAccount(): ?string
    {
        return $this->linkedinAccount;
    }

    public function setLinkedinAccount(string $linkedinAccount): static
    {
        $this->linkedinAccount = $linkedinAccount;

        return $this;
    }

    /**
     * @return Collection<int, hackathon>
     */
    public function getLesHackathons(): Collection
    {
        return $this->lesHackathons;
    }

    public function addLesHackathon(hackathon $lesHackathon): static
    {
        if (!$this->lesHackathons->contains($lesHackathon)) {
            $this->lesHackathons->add($lesHackathon);
        }

        return $this;
    }

    public function removeLesHackathon(hackathon $lesHackathon): static
    {
        $this->lesHackathons->removeElement($lesHackathon);

        return $this;
    }

    public function getLesCompetencesSecteursById($idCollection): bool
    {
        foreach($this->lesHackathons as $leHackathon)
        {
            if($leHackathon->getId() == $idCollection){
                return true;
            }
        }
        return false;
    }
}
