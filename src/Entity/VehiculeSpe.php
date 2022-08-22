<?php

namespace App\Entity;

use App\Repository\VehiculeSpeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeSpeRepository::class)]
class VehiculeSpe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $vehicule_spe = null;

    #[ORM\ManyToOne(inversedBy: 'mySpe')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicule $vehicule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehiculeSpe(): ?string
    {
        return $this->vehicule_spe;
    }

    public function setVehiculeSpe(string $vehicule_spe): self
    {
        $this->vehicule_spe = $vehicule_spe;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}
