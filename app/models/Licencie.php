<?php
require_once 'Contact.php';

class Licencie
{
    private $id;
    private $numero_licence;
    private $nom;
    private $prenom;
    private $contact; //Utilisation de la classe Contact
    private $categorie;

    public function __construct($id, $numero_licence, $nom, $prenom, $contact,$categorie)
    {
        $this->id = $id;
        $this->numero_licence = $numero_licence;
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
        return $this->numero_licence;
    }

    public function setNumeroLicence($numero_licence)
    {
        $this->numero_licence = $numero_licence;
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