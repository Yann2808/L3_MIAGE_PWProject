<?php

require_once 'Licencie.php';


class Educateur extends Licencie
{
    //private $specialite;
    private $email;
    private $motDePasse;
    private $administrateur;

    public function __construct($numeroLicence, $nom, $prenom, Contact $contact, $email, $motDePasse, $administrateur)
    {
        parent::__construct($numeroLicence, $nom, $prenom, $contact);
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->administrateur = $administrateur;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    public function setAdministrateur($administrateur)
    {
        $this->administrateur = $administrateur;
    }
}