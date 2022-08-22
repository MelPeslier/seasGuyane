<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $vehicule = null;

    #[ORM\Column(length: 255)]
    private ?string $image_name = null;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: VehiculeSpe::class, orphanRemoval: true)]
    private Collection $mySpe;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: DonneeSeas::class)]
    private Collection $myDonneeSeas;

    public function __construct()
    {
        $this->mySpe = new ArrayCollection();
        $this->myDonneeSeas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?string
    {
        return $this->vehicule;
    }

    public function setVehicule(string $vehicule): self
    {
        $this->vehicule = $vehicule;

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
     * @return Collection<int, VehiculeSpe>
     */
    public function getMySpe(): Collection
    {
        return $this->mySpe;
    }

    public function addMySpe(VehiculeSpe $mySpe): self
    {
        if (!$this->mySpe->contains($mySpe)) {
            $this->mySpe[] = $mySpe;
            $mySpe->setVehicule($this);
        }

        return $this;
    }

    public function removeMySpe(VehiculeSpe $mySpe): self
    {
        if ($this->mySpe->removeElement($mySpe)) {
            // set the owning side to null (unless already changed)
            if ($mySpe->getVehicule() === $this) {
                $mySpe->setVehicule(null);
            }
        }

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
            $myDonneeSea->setVehicule($this);
        }

        return $this;
    }

    public function removeMyDonneeSea(DonneeSeas $myDonneeSea): self
    {
        if ($this->myDonneeSeas->removeElement($myDonneeSea)) {
            // set the owning side to null (unless already changed)
            if ($myDonneeSea->getVehicule() === $this) {
                $myDonneeSea->setVehicule(null);
            }
        }

        return $this;
    }
}
