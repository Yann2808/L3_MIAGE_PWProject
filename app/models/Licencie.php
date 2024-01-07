<?php


class Licencie
{
    private $id;
    private $numero_licencie;
    private $nom;
    private $prenom;
    private $contact; //Utilisation de la classe Contact
    private $categorie;

    public function __construct($id, $numero_licencie, $nom, $prenom, $contact,$categorie)
    {
        $this->id = $id;
        $this->numero_licencie = $numero_licencie;
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

    public function getNumeroLicencie()
    {
        return $this->numero_licencie;
    }

    public function setNumeroLicencie($numero_licencie)
    {
        $this->numero_licencie = $numero_licencie;
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