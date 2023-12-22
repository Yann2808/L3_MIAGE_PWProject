<?php
class Categorie
{
    private $id;
    private $nom;
    private $codeRaccourci;

    public function __construct($nom, $codeRaccourci)
    {
        $this->nom = $nom;
        $this->codeRaccourci = $codeRaccourci;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getCode()
    {
        return $this->codeRaccourci;
    }

    public function setCode($codeRaccourci)
    {
        $this->codeRaccourci = $codeRaccourci;
    }
}