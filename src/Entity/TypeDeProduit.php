<?php

namespace App\Entity;

use App\Repository\TypeDeProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeDeProduitRepository::class)]
class TypeDeProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $type_de_produit = null;

    #[ORM\Column(length: 255)]
    private ?string $image_name = null;

    #[ORM\OneToMany(mappedBy: 'type_de_produit', targetEntity: DonneeSeas::class)]
    private Collection $myDonneeSeas;

    public function __construct()
    {
        $this->myDonneeSeas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDeProduit(): ?string
    {
        return $this->type_de_produit;
    }

    public function setTypeDeProduit(string $type_de_produit): self
    {
        $this->type_de_produit = $type_de_produit;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(string $image_name): self
    {
        $this->image_name = $image_name;

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
            $myDonneeSea->setTypeDeProduit($this);
        }

        return $this;
    }

    public function removeMyDonneeSea(DonneeSeas $myDonneeSea): self
    {
        if ($this->myDonneeSeas->removeElement($myDonneeSea)) {
            // set the owning side to null (unless already changed)
            if ($myDonneeSea->getTypeDeProduit() === $this) {
                $myDonneeSea->setTypeDeProduit(null);
            }
        }

        return $this;
    }
}
