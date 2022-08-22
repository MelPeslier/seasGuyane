<?php

namespace App\Entity;

use App\Repository\MesThematiquesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MesThematiquesRepository::class)]
class MesThematiques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'mesThematiques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?thematique $thematique = null;

    #[ORM\ManyToOne(inversedBy: 'mesThematiques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?donneeSeas $donnee_seas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThematique(): ?thematique
    {
        return $this->thematique;
    }

    public function setThematique(?thematique $thematique): self
    {
        $this->thematique = $thematique;

        return $this;
    }

    public function getDonneeSeas(): ?donneeSeas
    {
        return $this->donnee_seas;
    }

    public function setDonneeSeas(?donneeSeas $donnee_seas): self
    {
        $this->donnee_seas = $donnee_seas;

        return $this;
    }
}