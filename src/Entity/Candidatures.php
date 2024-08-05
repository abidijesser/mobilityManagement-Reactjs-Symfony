<?php

namespace App\Entity;

use App\Repository\CandidaturesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidaturesRepository::class)]
class Candidatures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $idEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $idMobilite = null;

    #[ORM\Column(length: 255)]
    private ?string $idEtudiantUniversitaire = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $optionn = null;

    #[ORM\Column(length: 255)]
    private ?string $classe = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $moyenne = null;

    #[ORM\Column(length: 255)]
    private ?string $cv = null;

    #[ORM\Column(length: 255)]
    private ?string $activités = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $certificats = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $langues = null;

    #[ORM\Column]
    private ?float $score = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEtudiant(): ?string
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant(string $idEtudiant): static
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    public function getIdMobilite(): ?string
    {
        return $this->idMobilite;
    }

    public function setIdMobilite(string $idMobilite): static
    {
        $this->idMobilite = $idMobilite;

        return $this;
    }

    public function getIdEtudiantUniversitaire(): ?string
    {
        return $this->idEtudiantUniversitaire;
    }

    public function setIdEtudiantUniversitaire(string $idEtudiantUniversitaire): static
    {
        $this->idEtudiantUniversitaire = $idEtudiantUniversitaire;

        return $this;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nomEtudiant;
    }

    public function setNomEtudiant(string $nomEtudiant): static
    {
        $this->nomEtudiant = $nomEtudiant;

        return $this;
    }

    public function getPrenomEtudiant(): ?string
    {
        return $this->prenomEtudiant;
    }

    public function setPrenomEtudiant(string $prenomEtudiant): static
    {
        $this->prenomEtudiant = $prenomEtudiant;

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

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): static
    {
        $this->classe = $classe;

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

    public function getMoyenne(): ?string
    {
        return $this->moyenne;
    }

    public function setMoyenne(string $moyenne): static
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getActivités(): ?string
    {
        return $this->activités;
    }

    public function setActivités(string $activités): static
    {
        $this->activités = $activités;

        return $this;
    }

    public function getCertificats(): ?string
    {
        return $this->certificats;
    }

    public function setCertificats(?string $certificats): static
    {
        $this->certificats = $certificats;

        return $this;
    }

    public function getLangues(): ?string
    {
        return $this->langues;
    }

    public function setLangues(?string $langues): static
    {
        $this->langues = $langues;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): static
    {
        $this->score = $score;

        return $this;
    }
}
