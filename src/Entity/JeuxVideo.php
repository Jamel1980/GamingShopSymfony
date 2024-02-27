<?php

namespace App\Entity;

use App\Repository\JeuxVideoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Table(name:'JeuxVideo')]
#[ORM\Entity(repositoryClass: JeuxVideoRepository::class)]
class JeuxVideo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(length: 50)]
    private ?string $plateforme = null;

    #[ORM\Column(length: 50)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $stock = null;

    #[ORM\OneToMany(targetEntity: DetailCommande::class, mappedBy: 'jeuxVideo')]
    private Collection $detailCommandes;

    #[ORM\OneToMany(targetEntity: Evaluation::class, mappedBy: 'jeuxVideo')]
    private Collection $evaluations;

    #[ORM\OneToMany(targetEntity: JeuxCategories::class, mappedBy: 'jeuxVideo')]
    private Collection $jeuxCategories;

    #[ORM\OneToMany(targetEntity: JeuxEvenement::class, mappedBy: 'jeuxVideo')]
    private Collection $jeuxEvenements;

    #[ORM\OneToMany(targetEntity: JeuxPromotions::class, mappedBy: 'jeuxVideo')]
    private Collection $jeuxPromotions;

    public function __construct()
    {
        $this->detailCommandes = new ArrayCollection();
        $this->evaluations = new ArrayCollection();
        $this->jeuxCategories = new ArrayCollection();
        $this->jeuxEvenements = new ArrayCollection();
        $this->jeuxPromotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPlateforme(): ?string
    {
        return $this->plateforme;
    }

    public function setPlateforme(string $plateforme): static
    {
        $this->plateforme = $plateforme;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * @return Collection<int, DetailCommande>
     */
    public function getDetailCommandes(): Collection
    {
        return $this->detailCommandes;
    }

    public function addDetailCommande(DetailCommande $detailCommande): static
    {
        if (!$this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes->add($detailCommande);
            $detailCommande->setJeuxVideo($this);
        }

        return $this;
    }

    public function removeDetailCommande(DetailCommande $detailCommande): static
    {
        if ($this->detailCommandes->removeElement($detailCommande)) {
            // set the owning side to null (unless already changed)
            if ($detailCommande->getJeuxVideo() === $this) {
                $detailCommande->setJeuxVideo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Evaluation>
     */
    public function getEvaluations(): Collection
    {
        return $this->evaluations;
    }

    public function addEvaluation(Evaluation $evaluation): static
    {
        if (!$this->evaluations->contains($evaluation)) {
            $this->evaluations->add($evaluation);
            $evaluation->setJeuxVideo($this);
        }

        return $this;
    }

    public function removeEvaluation(Evaluation $evaluation): static
    {
        if ($this->evaluations->removeElement($evaluation)) {
            // set the owning side to null (unless already changed)
            if ($evaluation->getJeuxVideo() === $this) {
                $evaluation->setJeuxVideo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, JeuxCategories>
     */
    public function getJeuxCategories(): Collection
    {
        return $this->jeuxCategories;
    }

    public function addJeuxCategory(JeuxCategories $jeuxCategory): static
    {
        if (!$this->jeuxCategories->contains($jeuxCategory)) {
            $this->jeuxCategories->add($jeuxCategory);
            $jeuxCategory->setJeuxVideo($this);
        }

        return $this;
    }

    public function removeJeuxCategory(JeuxCategories $jeuxCategory): static
    {
        if ($this->jeuxCategories->removeElement($jeuxCategory)) {
            // set the owning side to null (unless already changed)
            if ($jeuxCategory->getJeuxVideo() === $this) {
                $jeuxCategory->setJeuxVideo(null);
            }
        }

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
            $jeuxEvenement->setJeuxVideo($this);
        }

        return $this;
    }

    public function removeJeuxEvenement(JeuxEvenement $jeuxEvenement): static
    {
        if ($this->jeuxEvenements->removeElement($jeuxEvenement)) {
            // set the owning side to null (unless already changed)
            if ($jeuxEvenement->getJeuxVideo() === $this) {
                $jeuxEvenement->setJeuxVideo(null);
            }
        }

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
            $jeuxPromotion->setJeuxVideo($this);
        }

        return $this;
    }

    public function removeJeuxPromotion(JeuxPromotions $jeuxPromotion): static
    {
        if ($this->jeuxPromotions->removeElement($jeuxPromotion)) {
            // set the owning side to null (unless already changed)
            if ($jeuxPromotion->getJeuxVideo() === $this) {
                $jeuxPromotion->setJeuxVideo(null);
            }
        }

        return $this;
    }
}
