<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEmploye = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomEmploye = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $emailEmploye = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasseEmploye = null;

    // Implement the getId method
    public function getId(): ?int
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

    

    public function getRoles(): array
    {
        
        return ['Employe'];
    }

    public function getPassword(): ?string
    {
        return $this->motDePasseEmploye;
    }

    public function getSalt(): ?string
    {
        // Not needed when using modern algorithms like bcrypt or argon2i
        return null;
    }

    public function getUsername(): string
    {
        return $this->emailEmploye;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }

    public function getUserIdentifier(): string
    {
        return $this->emailEmploye;
    }
}

