<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasse = null;

    

    #[ORM\Column]
    private ?bool $isAdmin = null;

    #[ORM\OneToOne(inversedBy: 'educateur', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Licencie $licencie_id = null;

    #[ORM\ManyToMany(targetEntity: MailEducateur::class, mappedBy: 'educateurs')]
    private Collection $mailEducateurs;


    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailEducateur::class)]
    private Collection $expediteur;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailContact::class)]
    private Collection $mailContactEnv;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailContact::class)]
    private Collection $mailEducateurEnvoye;

    public function __construct()
    {
        $this->mailEducateurs = new ArrayCollection();
       
        $this->expediteur = new ArrayCollection();
        $this->mailContactEnv = new ArrayCollection();
        $this->mailEducateurEnvoye = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

   
    public function isIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): static
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    public function getLicencieId(): ?Licencie
    {
        return $this->licencie_id;
    }

    public function setLicencieId(Licencie $licencie_id): static
    {
        $this->licencie_id = $licencie_id;

        return $this;
    }

    /**
     * @return Collection<int, MailEducateur>
     */
    public function getMailEducateurs(): Collection
    {
        return $this->mailEducateurs;
    }

    public function addMailEducateur(MailEducateur $mailEducateur): static
    {
        if (!$this->mailEducateurs->contains($mailEducateur)) {
            $this->mailEducateurs->add($mailEducateur);
            $mailEducateur->addEducateur($this);
        }

        return $this;
    }

    public function removeMailEducateur(MailEducateur $mailEducateur): static
    {
        if ($this->mailEducateurs->removeElement($mailEducateur)) {
            $mailEducateur->removeEducateur($this);
        }

        return $this;
    }

    

    /**
     * @return Collection<int, MailEducateur>
     */
    public function getExpediteur(): Collection
    {
        return $this->expediteur;
    }

    public function addExpediteur(MailEducateur $expediteur): static
    {
        if (!$this->expediteur->contains($expediteur)) {
            $this->expediteur->add($expediteur);
            $expediteur->setExpediteur($this);
        }

        return $this;
    }

    public function removeExpediteur(MailEducateur $expediteur): static
    {
        if ($this->expediteur->removeElement($expediteur)) {
            // set the owning side to null (unless already changed)
            if ($expediteur->getExpediteur() === $this) {
                $expediteur->setExpediteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MailContact>
     */
    public function getMailContactEnv(): Collection
    {
        return $this->mailContactEnv;
    }

    public function addMailContactEnv(MailContact $mailContactEnv): static
    {
        if (!$this->mailContactEnv->contains($mailContactEnv)) {
            $this->mailContactEnv->add($mailContactEnv);
            $mailContactEnv->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailContactEnv(MailContact $mailContactEnv): static
    {
        if ($this->mailContactEnv->removeElement($mailContactEnv)) {
            // set the owning side to null (unless already changed)
            if ($mailContactEnv->getExpediteur() === $this) {
                $mailContactEnv->setExpediteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MailContact>
     */
    public function getMailEducateurEnvoye(): Collection
    {
        return $this->mailEducateurEnvoye;
    }

    public function addMailEducateurEnvoye(MailContact $mailEducateurEnvoye): static
    {
        if (!$this->mailEducateurEnvoye->contains($mailEducateurEnvoye)) {
            $this->mailEducateurEnvoye->add($mailEducateurEnvoye);
            $mailEducateurEnvoye->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailEducateurEnvoye(MailContact $mailEducateurEnvoye): static
    {
        if ($this->mailEducateurEnvoye->removeElement($mailEducateurEnvoye)) {
            // set the owning side to null (unless already changed)
            if ($mailEducateurEnvoye->getExpediteur() === $this) {
                $mailEducateurEnvoye->setExpediteur(null);
            }
        }

        return $this;
    }
}
