<?php

    class Educateur extends Licencie {
        private $id_educateur;
        private $numero_licence;
        private $email;
        private $motDePasse;
        private $isAdmin;

        public function __construct($id_educateur, $numero_licence, $email, $motDePasse, $isAdmin) {
            if(is_int($id_educateur))
            {
                $this->id_educateur = $id_educateur;
            }
            $this->numero_licence = $numero_licence;
            $this->email = $email;
            $this->motDePasse = $motDePasse;
            $this->isAdmin = $isAdmin;
        }

        public function addEducateur($numero_licence, $email, $motDePasse, $isAdmin){
            $this->numero_licence = $numero_licence;
            $this->email = $email;
            $this->motDePasse = $motDePasse;
            $this->isAdmin = $isAdmin;
        }

        // Getters et Setters pour les propriétés spécifiques à Educateur

        public function getIdEducateur() { 
            return $this->id_educateur;
        }

        public function setIdEducateur($id_educateur) { 
            $this->id_educateur = $id_educateur;
        }

        public function getNumeroLicence() { 
            return $this->numero_licence;
        }

        public function setNumeroLicence($numero_licence) { 
            $this->numero_licence = $numero_licence;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getMotDePasse() {
            return $this->motDePasse;
        }

        public function setMotDePasse($motDePasse) {
            $this->motDePasse = $motDePasse;
        }

        public function isAdmin() {
            return $this->isAdmin;
        }

        public function setAdministrateur($isAdmin) {
            $this->isAdmin = $isAdmin;
        }
    }
