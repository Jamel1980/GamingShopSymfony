<?php

namespace App\Entity;

use App\Repository\JeuxCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuxCategoriesRepository::class)]
class JeuxCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'jeuxCategories')]
    private ?JeuxVideo $jeuxVideo = null;

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
}
