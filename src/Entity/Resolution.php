<?php

namespace App\Entity;

use App\Repository\ResolutionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResolutionRepository::class)]
class Resolution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'resolution', targetEntity: DonneeSeas::class)]
    private Collection $myDonneeSeas;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $resolution = null;

    public function __construct()
    {
        $this->myDonneeSeas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $myDonneeSea->setResolution($this);
        }

        return $this;
    }

    public function removeDonneeSea(DonneeSeas $donneeSea): self
    {
        if ($this->donneeSeas->removeElement($donneeSea)) {
            // set the owning side to null (unless already changed)
            if ($donneeSea->getResolution() === $this) {
                $donneeSea->setResolution(null);
            }
        }

        return $this;
    }

    public function getResolution(): ?int
    {
        return $this->resolution;
    }

    public function setResolution(int $resolution): self
    {
        $this->resolution = $resolution;

        return $this;
    }
}
