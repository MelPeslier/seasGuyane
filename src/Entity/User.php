<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Entity\Traits\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['email'], message: 'Il y existe déjà un compte avec cet email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $lastName = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Cour::class)]
    private Collection $cours;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: DonneeSeas::class)]
    private Collection $donneeSeas;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: Vehicule::class)]
    private Collection $vehicules;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: VehiculeSpe::class)]
    private Collection $vehiculeSpes;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: TypeDeProduit::class)]
    private Collection $typeDeProduits;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: Thematique::class)]
    private Collection $thematiques;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: MesContenus::class)]
    private Collection $mesContenuses;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: MesThematiques::class)]
    private Collection $mesThematiques;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->donneeSeas = new ArrayCollection();
        $this->vehicules = new ArrayCollection();
        $this->vehiculeSpes = new ArrayCollection();
        $this->typeDeProduits = new ArrayCollection();
        $this->thematiques = new ArrayCollection();
        $this->mesContenuses = new ArrayCollection();
        $this->mesThematiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, Cour>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cour $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setUser($this);
        }

        return $this;
    }

    public function removeCour(Cour $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getUser() === $this) {
                $cour->setUser(null);
            }
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection<int, donneeSeas>
     */
    public function getDonneeSeas(): Collection
    {
        return $this->donneeSeas;
    }

    public function addDonneeSea(donneeSeas $donneeSea): self
    {
        if (!$this->donneeSeas->contains($donneeSea)) {
            $this->donneeSeas[] = $donneeSea;
            $donneeSea->setUser($this);
        }

        return $this;
    }

    public function removeDonneeSea(donneeSeas $donneeSea): self
    {
        if ($this->donneeSeas->removeElement($donneeSea)) {
            // set the owning side to null (unless already changed)
            if ($donneeSea->getUser() === $this) {
                $donneeSea->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setUser($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getUser() === $this) {
                $vehicule->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VehiculeSpe>
     */
    public function getVehiculeSpes(): Collection
    {
        return $this->vehiculeSpes;
    }

    public function addVehiculeSpe(VehiculeSpe $vehiculeSpe): self
    {
        if (!$this->vehiculeSpes->contains($vehiculeSpe)) {
            $this->vehiculeSpes[] = $vehiculeSpe;
            $vehiculeSpe->setUser($this);
        }

        return $this;
    }

    public function removeVehiculeSpe(VehiculeSpe $vehiculeSpe): self
    {
        if ($this->vehiculeSpes->removeElement($vehiculeSpe)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeSpe->getUser() === $this) {
                $vehiculeSpe->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TypeDeProduit>
     */
    public function getTypeDeProduits(): Collection
    {
        return $this->typeDeProduits;
    }

    public function addTypeDeProduit(TypeDeProduit $typeDeProduit): self
    {
        if (!$this->typeDeProduits->contains($typeDeProduit)) {
            $this->typeDeProduits[] = $typeDeProduit;
            $typeDeProduit->setUser($this);
        }

        return $this;
    }

    public function removeTypeDeProduit(TypeDeProduit $typeDeProduit): self
    {
        if ($this->typeDeProduits->removeElement($typeDeProduit)) {
            // set the owning side to null (unless already changed)
            if ($typeDeProduit->getUser() === $this) {
                $typeDeProduit->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Thematique>
     */
    public function getThematiques(): Collection
    {
        return $this->thematiques;
    }

    public function addThematique(Thematique $thematique): self
    {
        if (!$this->thematiques->contains($thematique)) {
            $this->thematiques[] = $thematique;
            $thematique->setUser($this);
        }

        return $this;
    }

    public function removeThematique(Thematique $thematique): self
    {
        if ($this->thematiques->removeElement($thematique)) {
            // set the owning side to null (unless already changed)
            if ($thematique->getUser() === $this) {
                $thematique->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MesContenus>
     */
    public function getMesContenuses(): Collection
    {
        return $this->mesContenuses;
    }

    public function addMesContenus(MesContenus $mesContenus): self
    {
        if (!$this->mesContenuses->contains($mesContenus)) {
            $this->mesContenuses[] = $mesContenus;
            $mesContenus->setUser($this);
        }

        return $this;
    }

    public function removeMesContenus(MesContenus $mesContenus): self
    {
        if ($this->mesContenuses->removeElement($mesContenus)) {
            // set the owning side to null (unless already changed)
            if ($mesContenus->getUser() === $this) {
                $mesContenus->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MesThematiques>
     */
    public function getMesThematiques(): Collection
    {
        return $this->mesThematiques;
    }

    public function addMesThematique(MesThematiques $mesThematique): self
    {
        if (!$this->mesThematiques->contains($mesThematique)) {
            $this->mesThematiques[] = $mesThematique;
            $mesThematique->setUser($this);
        }

        return $this;
    }

    public function removeMesThematique(MesThematiques $mesThematique): self
    {
        if ($this->mesThematiques->removeElement($mesThematique)) {
            // set the owning side to null (unless already changed)
            if ($mesThematique->getUser() === $this) {
                $mesThematique->setUser(null);
            }
        }

        return $this;
    }
}
