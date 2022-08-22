<?php

namespace App\Entity;

use App\Repository\ThematiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThematiqueRepository::class)]
class Thematique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $thematique = null;

    #[ORM\Column(length: 255)]
    private ?string $image_name = null;

    #[ORM\OneToMany(mappedBy: 'thematique', targetEntity: MesThematiques::class)]
    private Collection $mesThematiques;

    public function __construct()
    {
        $this->mesThematiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThematique(): ?string
    {
        return $this->thematique;
    }

    public function setThematique(string $thematique): self
    {
        $this->thematique = $thematique;

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
            $mesThematique->setThematique($this);
        }

        return $this;
    }

    public function removeMesThematique(MesThematiques $mesThematique): self
    {
        if ($this->mesThematiques->removeElement($mesThematique)) {
            // set the owning side to null (unless already changed)
            if ($mesThematique->getThematique() === $this) {
                $mesThematique->setThematique(null);
            }
        }

        return $this;
    }
}
