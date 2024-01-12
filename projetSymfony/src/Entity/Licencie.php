<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
#[ORM\Table(name: "licencies")]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column(name: "numero_licencie", nullable: true)]
    private ?int $numeroLicence = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    private ?Contact $contact = null;

   #[ORM\ManyToOne]
    private ?Categorie $categorie = null;

     
     
    //#[ORM\OneToOne(mappedBy: 'licencie_id', cascade: ['persist', 'remove'])]
    private ?Educateur $educateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroLicence(): ?int
    {
        return $this->numeroLicence;
    }

    public function setNumeroLicence(int $numeroLicence): static
    {
        $this->numeroLicence = $numeroLicence;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getContactId(): ?Contact
    {
        return $this->contact;
    }

    public function setContactId(?Contact $contact): static
    {
        $this->contact= $contact;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getEducateur(): ?Educateur
    {
        return $this->educateur;
    }

    public function setEducateur(Educateur $educateur): static
    {
        // set the owning side of the relation if necessary
        if ($educateur->getLicencieId() !== $this) {
            $educateur->setLicencieId($this);
        }

        $this->educateur = $educateur;

        return $this;
    }
}
