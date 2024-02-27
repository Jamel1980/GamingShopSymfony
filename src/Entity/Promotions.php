<?php

namespace App\Entity;

use App\Repository\PromotionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionsRepository::class)]
class Promotions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomPromotion = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $tauxReduction = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\OneToMany(targetEntity: JeuxPromotions::class, mappedBy: 'promotion')]
    private Collection $jeuxPromotions;

    public function __construct()
    {
        $this->jeuxPromotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPromotion(): ?string
    {
        return $this->nomPromotion;
    }

    public function setNomPromotion(?string $nomPromotion): static
    {
        $this->nomPromotion = $nomPromotion;

        return $this;
    }

    public function getTauxReduction(): ?string
    {
        return $this->tauxReduction;
    }

    public function setTauxReduction(?string $tauxReduction): static
    {
        $this->tauxReduction = $tauxReduction;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection<int, JeuxPromotions>
     */
    public function getJeuxPromotions(): Collection
    {
        return $this->jeuxPromotions;
    }

    public function addJeuxPromotion(JeuxPromotions $jeuxPromotion): static
    {
        if (!$this->jeuxPromotions->contains($jeuxPromotion)) {
            $this->jeuxPromotions->add($jeuxPromotion);
            $jeuxPromotion->setPromotion($this);
        }

        return $this;
    }

    public function removeJeuxPromotion(JeuxPromotions $jeuxPromotion): static
    {
        if ($this->jeuxPromotions->removeElement($jeuxPromotion)) {
            // set the owning side to null (unless already changed)
            if ($jeuxPromotion->getPromotion() === $this) {
                $jeuxPromotion->setPromotion(null);
            }
        }

        return $this;
    }
}
