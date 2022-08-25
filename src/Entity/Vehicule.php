<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Traits\Timestampable;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
class Vehicule
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $vehicule = null;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: VehiculeSpe::class, orphanRemoval: true)]
    private Collection $mySpe;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: DonneeSeas::class)]
    private Collection $myDonneeSeas;

/***************************************************************************
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     */
    #[Vich\UploadableField(mapping: 'vehicule_images', fileNameProperty: 'imageName')]
    #[Assert\Image(maxSize: "8M")]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', nullable : true)]
    private ?string $imageName = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

// **************************************************************

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

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
