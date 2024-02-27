<?php

namespace App\Entity;

use App\Repository\JeuxEvenementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuxEvenementRepository::class)]
class JeuxEvenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'jeuxEvenements')]
    private ?JeuxVideo $jeuxVideo = null;

    #[ORM\ManyToOne(inversedBy: 'jeuxEvenements')]
    private ?EvenementSpeciaux $evenementSpeciaux = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJeuxVideo(): ?JeuxVideo
    {
        return $this->jeuxVideo;
    }

    public function setJeuxVideo(?JeuxVideo $jeuxVideo): static
    {
        $this->jeuxVideo = $jeuxVideo;

        return $this;
    }

    public function getEvenementSpeciaux(): ?EvenementSpeciaux
    {
        return $this->evenementSpeciaux;
    }

    public function setEvenementSpeciaux(?EvenementSpeciaux $evenementSpeciaux): static
    {
        $this->evenementSpeciaux = $evenementSpeciaux;

        return $this;
    }
}
