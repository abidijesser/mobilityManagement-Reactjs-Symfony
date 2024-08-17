<?php

namespace App\Entity;

use App\Repository\RegistredStudentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: RegistredStudentsRepository::class)]
class RegistredStudents implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Candidatures::class, mappedBy: 'etudiant')]
    private Collection $candidatures;

    public function __construct()
    {
        $this->candidatures = new ArrayCollection();
    }
    
    /**
     * @ORM\OneToMany(targetEntity=Candidatures::class, mappedBy="mobilite")
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidatures $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures[] = $candidature;
            $candidature->setEtudiant($this);
        }

        return $this;
    }

    public function removeCandidature(Candidatures $candidature): self
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getEtudiant() === $this) {
                $candidature->setEtudiant(null);
            }
        }

        return $this;
    }

    #[ORM\Column(length: 255)]
    private ?string $nomEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $emailUniversitaire = null;

    #[ORM\Column(length: 255)]
    private ?string $emailPersonnel = null;

    #[ORM\Column(length: 255)]
    private ?string $idEtudiantUniversitaire = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasseEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $cin = null;

    public function getIdEtudiant(): ?int
    {
        return $this->id;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nomEtudiant;
    }

    public function setNomEtudiant(string $nom): static
    {
        $this->nomEtudiant = $nom;

        return $this;
    }

    public function getPrenomEtudiant(): ?string
    {
        return $this->prenomEtudiant;
    }

    public function setPrenomEtudiant(string $prenom): static
    {
        $this->prenomEtudiant = $prenom;

        return $this;
    }

    public function getEmailUniversitaire(): ?string
    {
        return $this->emailUniversitaire;
    }

    public function setEmailUniversitaire(string $emailUniversitaire): static
    {
        $this->emailUniversitaire = $emailUniversitaire;

        return $this;
    }

    public function getEmailPersonnel(): ?string
    {
        return $this->emailPersonnel;
    }

    public function setEmailPersonnel(string $emailPersonnel): static
    {
        $this->emailPersonnel = $emailPersonnel;

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

    public function getMotDePasseEtudiant(): ?string
    {
        return $this->motDePasseEtudiant;
    }

    public function setMotDePasseEtudiant(string $motDePasse): static
    {
        $this->motDePasseEtudiant = $motDePasse;

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

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }
}
