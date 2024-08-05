<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEmploye = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomEmploye = null;

    #[ORM\Column(length: 255)]
    private ?string $emailEmploye = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasseEmploye = null;

    public function getIdEmploye(): ?int
    {
        return $this->id;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nomEmploye;
    }

    public function setNomEmploye(string $nom): static
    {
        $this->nomEmploye = $nom;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenomEmploye;
    }

    public function setPrenomEmploye(string $prenom): static
    {
        $this->prenomEmploye = $prenom;

        return $this;
    }

    public function getEmailEmploye(): ?string
    {
        return $this->emailEmploye;
    }

    public function setEmailEmploye(string $emailEmploye): static
    {
        $this->emailEmploye = $emailEmploye;

        return $this;
    }

    public function getMotDePasseEmploye(): ?string
    {
        return $this->motDePasseEmploye;
    }

    public function setMotDePasseEmploye(string $motDePasseEmploye): static
    {
        $this->motDePasseEmploye = $motDePasseEmploye;

        return $this;
    }
}
