<?php

namespace App\Entity;

use App\Repository\DonneeSeasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonneeSeasRepository::class)]
class DonneeSeas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $donnee_seas = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Date $date = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $fournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Capteur $capteur = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Echelle $echelle = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicule $vehicule = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Resolution $resolution = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeDeProduit $type_de_produit = null;

    #[ORM\OneToMany(mappedBy: 'donnee_seas', targetEntity: MesThematiques::class)]
    private Collection $mesThematiques;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'donneeSeas')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'mes_contenus', targetEntity: MesContenus::class)]
    private Collection $mesContenuses;

    public function __construct()
    {
        $this->mesThematiques = new ArrayCollection();
        $this->mesContenuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDonneeSeas(): ?string
    {
        return $this->donnee_seas;
    }

    public function setDonneeSeas(string $donnee_seas): self
    {
        $this->donnee_seas = $donnee_seas;

        return $this;
    }

    public function getDate(): ?Date
    {
        return $this->date;
    }

    public function setDate(?Date $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getCapteur(): ?Capteur
    {
        return $this->capteur;
    }

    public function setCapteur(?Capteur $capteur): self
    {
        $this->capteur = $capteur;

        return $this;
    }

    public function getEchelle(): ?Echelle
    {
        return $this->echelle;
    }

    public function setEchelle(?Echelle $echelle): self
    {
        $this->echelle = $echelle;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getResolution(): ?Resolution
    {
        return $this->resolution;
    }

    public function setResolution(?Resolution $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getTypeDeProduit(): ?TypeDeProduit
    {
        return $this->type_de_produit;
    }

    public function setTypeDeProduit(?TypeDeProduit $type_de_produit): self
    {
        $this->type_de_produit = $type_de_produit;

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
            $mesThematique->setDonneeSeas($this);
        }

        return $this;
    }

    public function removeMesThematique(MesThematiques $mesThematique): self
    {
        if ($this->mesThematiques->removeElement($mesThematique)) {
            // set the owning side to null (unless already changed)
            if ($mesThematique->getDonneeSeas() === $this) {
                $mesThematique->setDonneeSeas(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
            $mesContenus->setMesContenus($this);
        }

        return $this;
    }

    public function removeMesContenus(MesContenus $mesContenus): self
    {
        if ($this->mesContenuses->removeElement($mesContenus)) {
            // set the owning side to null (unless already changed)
            if ($mesContenus->getMesContenus() === $this) {
                $mesContenus->setMesContenus(null);
            }
        }

        return $this;
    }
}
