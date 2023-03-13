<?php

namespace App\Entity;

use App\Repository\FeatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeatureRepository::class)]
class Feature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nbSolution = null;

    #[ORM\OneToMany(mappedBy: 'feature', targetEntity: Methode::class)]
    private Collection $methodes;

    public function __construct()
    {
        $this->methodes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbSolution(): ?int
    {
        return $this->nbSolution;
    }

    public function setNbSolution(int $nbSolution): self
    {
        $this->nbSolution = $nbSolution;

        return $this;
    }

    /**
     * @return Collection<int, Methode>
     */
    public function getMethodes(): Collection
    {
        return $this->methodes;
    }

    public function addMethode(Methode $methode): self
    {
        if (!$this->methodes->contains($methode)) {
            $this->methodes->add($methode);
            $methode->setFeature($this);
        }

        return $this;
    }

    public function removeMethode(Methode $methode): self
    {
        if ($this->methodes->removeElement($methode)) {
            // set the owning side to null (unless already changed)
            if ($methode->getFeature() === $this) {
                $methode->setFeature(null);
            }
        }

        return $this;
    }
}
