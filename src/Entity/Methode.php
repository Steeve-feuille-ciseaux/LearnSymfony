<?php

namespace App\Entity;

use App\Repository\MethodeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MethodeRepository::class)]
class Methode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $demonstration = null;

    #[ORM\Column(length: 255)]
    private ?string $documentation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $source = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bundle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $packagist = null;

    #[ORM\Column(length: 255)]
    private ?string $projet = null;

    #[ORM\Column(length: 255)]
    private ?string $devReferant = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDemonstration(): ?string
    {
        return $this->demonstration;
    }

    public function setDemonstration(?string $demonstration): self
    {
        $this->demonstration = $demonstration;

        return $this;
    }

    public function getDocumentation(): ?string
    {
        return $this->documentation;
    }

    public function setDocumentation(string $documentation): self
    {
        $this->documentation = $documentation;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getBundle(): ?string
    {
        return $this->bundle;
    }

    public function setBundle(?string $bundle): self
    {
        $this->bundle = $bundle;

        return $this;
    }

    public function getPackagist(): ?string
    {
        return $this->packagist;
    }

    public function setPackagist(?string $packagist): self
    {
        $this->packagist = $packagist;

        return $this;
    }

    public function getProjet(): ?string
    {
        return $this->projet;
    }

    public function setProjet(string $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    public function getDevReferant(): ?string
    {
        return $this->devReferant;
    }

    public function setDevReferant(string $devReferant): self
    {
        $this->devReferant = $devReferant;

        return $this;
    }
}
