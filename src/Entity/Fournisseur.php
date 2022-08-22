<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $fournisseur = null;

    #[ORM\OneToMany(mappedBy: 'fournisseur', targetEntity: DonneeSeas::class)]
    private Collection $myDonneeSeas;

    public function __construct()
    {
        $this->myDonneeSeas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return Collection<int, DonneeSeas>
     */
    public function getMyDonneeSeas(): Collection
    {
        return $this->myDonneeSeas;
    }

    public function addMyDonneeSea(DonneeSeas $myDonneeSea): self
    {
        if (!$this->myDonneeSeas->contains($myDonneeSea)) {
            $this->myDonneeSeas[] = $myDonneeSea;
            $myDonneeSea->setFournisseur($this);
        }

        return $this;
    }

    public function removeMyDonneeSea(DonneeSeas $myDonneeSea): self
    {
        if ($this->myDonneeSeas->removeElement($myDonneeSea)) {
            // set the owning side to null (unless already changed)
            if ($myDonneeSea->getFournisseur() === $this) {
                $myDonneeSea->setFournisseur(null);
            }
        }

        return $this;
    }
}
