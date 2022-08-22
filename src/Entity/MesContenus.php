<?php

namespace App\Entity;

use App\Repository\MesContenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MesContenusRepository::class)]
class MesContenus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image_name = null;

    #[ORM\OneToMany(mappedBy: 'mesContenus', targetEntity: donneeseas::class)]
    private Collection $donnee_seas;

    public function __construct()
    {
        $this->donnee_seas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
