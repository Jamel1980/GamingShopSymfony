<?php

namespace App\Entity;

use App\Repository\PlateformesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlateformesRepository::class)]
class Plateformes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_plateform = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPlateform(): ?string
    {
        return $this->nom_plateform;
    }

    public function setNomPlateform(string $nom_plateform): static
    {
        $this->nom_plateform = $nom_plateform;

        return $this;
    }
}
