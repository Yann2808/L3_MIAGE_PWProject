<?php
class Categorie
{
    private $id;
    private $nom;
    private $code;

    public function __construct($id, $nom, $code)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->code = $code;
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
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }
}