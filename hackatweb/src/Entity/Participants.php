<?php

namespace App\Entity;

use App\Repository\ParticipantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: ParticipantsRepository::class)]
class Participants implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $URLPortfolio = null;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->Favoris = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getURLPortfolio(): ?string
    {
        return $this->URLPortfolio;
    }

    public function setURLPortfolio(string $URLPortfolio): static
    {
        $this->URLPortfolio = $URLPortfolio;

        return $this;
    }

 /**
 * @ORM\Column(type="json")
 */
 private $roles = [];

    #[ORM\Column(length: 255)]
    private ?string $login = null;

    /**
     * @var Collection<int, Inscription>
     */
    #[ORM\OneToMany(targetEntity: Inscription::class, mappedBy: 'participant')]
    private Collection $inscriptions;

    /**
     * @var Collection<int, Hackathon>
     */
    #[ORM\ManyToMany(targetEntity: Hackathon::class)]
    private Collection $Favoris;

 /**
 * méthode qui renvoie une chaîne avec les informations voulues pour représenter un utilisateur.
 */
 public function getUserIdentifier(): string
                                                       {
                                                       return (string) $this->prenom." ".$this->nom;
                                                       }
 public function getRoles(): array
                                                       {
                                                       $roles = $this->roles;
                                                       // guarantee every user at least has ROLE_USER
                                                       $roles[] = 'ROLE_USER';
                                                       return array_unique($roles);
                                                       }
 public function setRoles(array $roles): self
                                                       {
                                                       $this->roles = $roles;
                                                       return $this;
                                                       }
 public function getPassword(): string
                                                       {
                                                      // à remplacer éventuellement par la propriété contenant le mot de passe
                                                       return $this->password;
                                                       }
 public function setPassword(string $password): self
                                                       {
                                                      // à remplacer éventuellement par la propriété contenant le mot de passe
                                                       $this->password = $password;
                                                       return $this;
                                                       }
 public function eraseCredentials()
                                                       {
                                                       // If you store any temporary, sensitive data on the user, clear it here
                                                       // $this->plainPassword = null;
                                                       }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): static
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->setParticipant($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): static
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getParticipant() === $this) {
                $inscription->setParticipant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Hackathon>
     */
    public function getFavoris(): Collection
    {
        return $this->Favoris;
    }

    public function addFavori(Hackathon $favori): static
    {
        if (!$this->Favoris->contains($favori)) {
            $this->Favoris->add($favori);
        }

        return $this;
    }

    public function removeFavori(Hackathon $favori): static
    {
        $this->Favoris->removeElement($favori);

        return $this;
    }


}
