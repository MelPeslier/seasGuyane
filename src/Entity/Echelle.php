<?php

namespace App\Entity;

use App\Repository\EchelleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EchelleRepository::class)]
class Echelle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $echelle = null;

    #[ORM\OneToMany(mappedBy: 'echelle', targetEntity: DonneeSeas::class)]
    private Collection $myDonneeSeas;

    public function __construct()
    {
        $this->myDonneeSeas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEchelle(): ?string
    {
        return $this->echelle;
    }

    public function setEchelle(string $echelle): self
    {
        $this->echelle = $echelle;

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
            $myDonneeSea->setEchelle($this);
        }

        return $this;
    }

    public function removeMyDonneeSea(DonneeSeas $myDonneeSea): self
    {
        if ($this->myDonneeSeas->removeElement($myDonneeSea)) {
            // set the owning side to null (unless already changed)
            if ($myDonneeSea->getEchelle() === $this) {
                $myDonneeSea->setEchelle(null);
            }
        }

        return $this;
    }
}
