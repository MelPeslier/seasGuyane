<?php

namespace App\Entity;

use App\Repository\DonneeSeasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonneeSeasRepository::class)]
class DonneeSeas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $donne_seas = null;

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

    #[ORM\ManyToOne(inversedBy: 'donneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?resolution $resolution = null;

    #[ORM\ManyToOne(inversedBy: 'myDonneeSeas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?typeDeProduit $type_de_produit = null;

    #[ORM\ManyToOne(inversedBy: 'donnee_seas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MesContenus $mesContenus = null;

    #[ORM\OneToMany(mappedBy: 'donnee_seas', targetEntity: MesThematiques::class)]
    private Collection $mesThematiques;

    public function __construct()
    {
        $this->mesThematiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDonneSeas(): ?string
    {
        return $this->donne_seas;
    }

    public function setDonneSeas(string $donne_seas): self
    {
        $this->donne_seas = $donne_seas;

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

    public function getResolution(): ?resolution
    {
        return $this->resolution;
    }

    public function setResolution(?resolution $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function getTypeDeProduit(): ?typeDeProduit
    {
        return $this->type_de_produit;
    }

    public function setTypeDeProduit(?typeDeProduit $type_de_produit): self
    {
        $this->type_de_produit = $type_de_produit;

        return $this;
    }

    public function getMesContenus(): ?MesContenus
    {
        return $this->mesContenus;
    }

    public function setMesContenus(?MesContenus $mesContenus): self
    {
        $this->mesContenus = $mesContenus;

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
}
