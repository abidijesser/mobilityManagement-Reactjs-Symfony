<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MobiliteRepository::class)]
class Mobilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Candidatures::class, mappedBy: 'mobilite')]
    private Collection $candidatures;

    public function __construct()
    {
        $this->candidatures = new ArrayCollection();
    }

    /**
     * @return Collection|Candidatures[]
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidatures $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures[] = $candidature;
            $candidature->setMobilite($this);
        }

        return $this;
    }

    public function removeCandidature(Candidatures $candidature): self
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getMobilite() === $this) {
                $candidature->setMobilite(null);
            }
        }

        return $this;
    }

    #[ORM\Column(length: 255)]
    private ?string $nomUniversité = null;

    #[ORM\Column(length: 255)]
    private ?string $siteWeb = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column(length: 255)]
    private ?string $optionn = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $dateDeCreation = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbreDePlaceTotal = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbreDePlaceDisponible = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUniversité(): ?string
    {
        return $this->nomUniversité;
    }

    public function setNomUniversité(string $nomUniversité): static
    {
        $this->nomUniversité = $nomUniversité;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(string $siteWeb): static
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getOptionn(): ?string
    {
        return $this->optionn;
    }

    public function setOptionn(string $optionn): static
    {
        $this->optionn = $optionn;

        return $this;
    }

    public function getDateDeCreation(): ?\DateTimeInterface
    {
        return $this->dateDeCreation;
    }

    public function setDateDeCreation(\DateTimeInterface $dateDeCreation): static
    {
        $this->dateDeCreation = $dateDeCreation;

        return $this;
    }

    public function getNbreDePlaceTotal(): ?int
    {
        return $this->nbreDePlaceTotal;
    }

    public function setNbreDePlaceTotal(?int $nbreDePlaceTotal): static
    {
        $this->nbreDePlaceTotal = $nbreDePlaceTotal;

        return $this;
    }

    public function getNbreDePlaceDisponible(): ?int
    {
        return $this->nbreDePlaceDisponible;
    }

    public function setNbreDePlaceDisponible(?int $nbreDePlaceDisponible): static
    {
        $this->nbreDePlaceDisponible = $nbreDePlaceDisponible;

        return $this;
    }
}

