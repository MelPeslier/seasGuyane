<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $theme = null;

    /***************************************************************************
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     */
    #[Vich\UploadableField(mapping: 'cours_images', fileNameProperty: 'imageName')]
    #[Assert\Image(maxSize: "8M")]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', nullable : true)]
    private ?string $imageName = null;

    #[ORM\ManyToMany(targetEntity: SeasData::class, mappedBy: 'theme')]
    private Collection $seasData;

    public function __construct()
    {
        $this->seasData = new ArrayCollection();
    }

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection<int, SeasData>
     */
    public function getSeasData(): Collection
    {
        return $this->seasData;
    }

    public function addSeasData(SeasData $seasData): self
    {
        if (!$this->seasData->contains($seasData)) {
            $this->seasData[] = $seasData;
            $seasData->addTheme($this);
        }

        return $this;
    }

    public function removeSeasData(SeasData $seasData): self
    {
        if ($this->seasData->removeElement($seasData)) {
            $seasData->removeTheme($this);
        }

        return $this;
    }
}
