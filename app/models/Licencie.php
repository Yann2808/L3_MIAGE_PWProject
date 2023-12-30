<?php
require_once 'Contact.php';

class Licencie
{
    private $id;
    private $numeroLicence;
    private $nom;
    private $prenom;
    private $contact; //Utilisation de la classe Contact
    private $categorie; //Utilisation de la classe Catégorie

    public function __construct($id, $numeroLicence, $nom, $prenom, $contact, $categorie)
    {
        $this->id = $id;
        $this->numeroLicence = $numeroLicence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contact = $contact;
        $this->categorie = $categorie;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }

    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
}