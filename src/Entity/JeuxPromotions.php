<?php

namespace App\Entity;

use App\Repository\JeuxPromotionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuxPromotionsRepository::class)]
class JeuxPromotions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'jeuxPromotions')]
    private ?JeuxVideo $jeuxVideo = null;

    #[ORM\ManyToOne(inversedBy: 'jeuxPromotions')]
    private ?Promotions $promotion = null;

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

    public function getPromotion(): ?Promotions
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotions $promotion): static
    {
        $this->promotion = $promotion;

        return $this;
    }
}
