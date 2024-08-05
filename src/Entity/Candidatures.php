<?php

namespace App\Entity;

use App\Repository\CandidaturesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidaturesRepository::class)]
class Candidatures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: RegistredStudents::class, inversedBy: 'candidatures')]
    #[ORM\JoinColumn(name: 'id_etudiant', referencedColumnName: 'id', nullable: false)]
    private ?RegistredStudents $etudiant = null;

    #[ORM\ManyToOne(targetEntity: Mobilite::class, inversedBy: 'candidatures')]
    #[ORM\JoinColumn(name: 'id_mobilite', referencedColumnName: 'id', nullable: false)]
    private ?Mobilite $mobilite = null;

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

    public function getEtudiant(): ?RegistredStudents
    {
        return $this->etudiant;
    }

    public function setEtudiant(?RegistredStudents $etudiant): self
    {
        $this->etudiant = $etudiant;
        return $this;
    }

    public function getMobilite(): ?Mobilite
    {
        return $this->mobilite;
    }

    public function setMobilite(?Mobilite $mobilite): self
    {
        $this->mobilite = $mobilite;
        return $this;
    }

    public function getIdEtudiantUniversitaire(): ?string
    {
        return $this->idEtudiantUniversitaire;
    }

    public function setIdEtudiantUniversitaire(string $idEtudiantUniversitaire): self
    {
        $this->idEtudiantUniversitaire = $idEtudiantUniversitaire;
        return $this;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nomEtudiant;
    }

    public function setNomEtudiant(string $nomEtudiant): self
    {
        $this->nomEtudiant = $nomEtudiant;
        return $this;
    }

    public function getPrenomEtudiant(): ?string
    {
        return $this->prenomEtudiant;
    }

    public function setPrenomEtudiant(string $prenomEtudiant): self
    {
        $this->prenomEtudiant = $prenomEtudiant;
        return $this;
    }

    public function getOptionn(): ?string
    {
        return $this->optionn;
    }

    public function setOptionn(string $optionn): self
    {
        $this->optionn = $optionn;
        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;
        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;
        return $this;
    }

    public function getMoyenne(): ?string
    {
        return $this->moyenne;
    }

    public function setMoyenne(string $moyenne): self
    {
        $this->moyenne = $moyenne;
        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;
        return $this;
    }

    public function getActivités(): ?string
    {
        return $this->activités;
    }

    public function setActivités(string $activités): self
    {
        $this->activités = $activités;
        return $this;
    }

    public function getCertificats(): ?string
    {
        return $this->certificats;
    }

    public function setCertificats(?string $certificats): self
    {
        $this->certificats = $certificats;
        return $this;
    }

    public function getLangues(): ?string
    {
        return $this->langues;
    }

    public function setLangues(?string $langues): self
    {
        $this->langues = $langues;
        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;
        return $this;
    }
}

