<?php

namespace App\Entity;

use App\Repository\EvenementSpeciauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementSpeciauxRepository::class)]
class EvenementSpeciaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomEvenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\OneToMany(targetEntity: JeuxEvenement::class, mappedBy: 'evenementSpeciaux')]
    private Collection $jeuxEvenements;

    public function __construct()
    {
        $this->jeuxEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nomEvenement;
    }

    public function setNomEvenement(?string $nomEvenement): static
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
     * @return Collection<int, JeuxEvenement>
     */
    public function getJeuxEvenements(): Collection
    {
        return $this->jeuxEvenements;
    }

    public function addJeuxEvenement(JeuxEvenement $jeuxEvenement): static
    {
        if (!$this->jeuxEvenements->contains($jeuxEvenement)) {
            $this->jeuxEvenements->add($jeuxEvenement);
            $jeuxEvenement->setEvenementSpeciaux($this);
        }

        return $this;
    }

    public function removeJeuxEvenement(JeuxEvenement $jeuxEvenement): static
    {
        if ($this->jeuxEvenements->removeElement($jeuxEvenement)) {
            // set the owning side to null (unless already changed)
            if ($jeuxEvenement->getEvenementSpeciaux() === $this) {
                $jeuxEvenement->setEvenementSpeciaux(null);
            }
        }

        return $this;
    }
}
