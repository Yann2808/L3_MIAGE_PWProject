<?php

namespace App\Entity;

use App\Repository\MailEducateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailEducateurRepository::class)]
class MailEducateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_envoi = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\ManyToMany(targetEntity: Educateur::class, inversedBy: 'mailEducateurs')]
    private Collection $educateurs;

    #[ORM\ManyToOne(inversedBy: 'expediteur')]
    private ?Educateur $expediteur = null;

    public function __construct()
    {
        $this->educateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDateEnvoi(\DateTimeInterface $date_envoi): static
    {
        $this->date_envoi = $date_envoi;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): static
    {
        $this->objet = $objet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Collection<int, Educateur>
     */
    public function getEducateurs(): Collection
    {
        return $this->educateurs;
    }

    public function addEducateur(Educateur $educateur): static
    {
        if (!$this->educateurs->contains($educateur)) {
            $this->educateurs->add($educateur);
        }

        return $this;
    }

    public function removeEducateur(Educateur $educateur): static
    {
        $this->educateurs->removeElement($educateur);

        return $this;
    }

    public function getExpediteur(): ?Educateur
    {
        return $this->expediteur;
    }

    public function setExpediteur(?Educateur $expediteur): static
    {
        $this->expediteur = $expediteur;

        return $this;
    }
}
