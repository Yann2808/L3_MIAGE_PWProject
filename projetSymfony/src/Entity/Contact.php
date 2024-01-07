<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\OneToMany(mappedBy: 'contact_id', targetEntity: Licencie::class)]
    private Collection $licencie_id;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailContact::class)]
    private Collection $mailContacts;

    public function __construct()
    {
        $this->licencie_id = new ArrayCollection();
        $this->mailContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection<int, Licencie>
     */
    public function getLicencieId(): Collection
    {
        return $this->licencie_id;
    }

    public function addLicencieId(Licencie $licencieId): static
    {
        if (!$this->licencie_id->contains($licencieId)) {
            $this->licencie_id->add($licencieId);
            $licencieId->setContactId($this);
        }

        return $this;
    }

    public function removeLicencieId(Licencie $licencieId): static
    {
        if ($this->licencie_id->removeElement($licencieId)) {
            // set the owning side to null (unless already changed)
            if ($licencieId->getContactId() === $this) {
                $licencieId->setContactId(null);
            }
        }

        return $this;
    }

   
}
