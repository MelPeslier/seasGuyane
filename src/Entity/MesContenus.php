<?php

namespace App\Entity;

use App\Repository\MesContenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Traits\Timestampable;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MesContenusRepository::class)]
class MesContenus
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'mesContenus', targetEntity: donneeseas::class)]
    private Collection $donnee_seas;

/***************************************************************************
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     */
    #[Vich\UploadableField(mapping: 'contenus_images', fileNameProperty: 'imageName')]
    #[Assert\Image(maxSize: "50M")]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', nullable : true)]
    private ?string $imageName = null;

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
        $this->donnee_seas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, donneeseas>
     */
    public function getDonneeSeas(): Collection
    {
        return $this->donnee_seas;
    }

    public function addDonneeSea(donneeseas $donneeSea): self
    {
        if (!$this->donnee_seas->contains($donneeSea)) {
            $this->donnee_seas[] = $donneeSea;
            $donneeSea->setMesContenus($this);
        }

        return $this;
    }

    public function removeDonneeSea(donneeseas $donneeSea): self
    {
        if ($this->donnee_seas->removeElement($donneeSea)) {
            // set the owning side to null (unless already changed)
            if ($donneeSea->getMesContenus() === $this) {
                $donneeSea->setMesContenus(null);
            }
        }

        return $this;
    }
}
