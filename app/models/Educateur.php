<?php
    // class Educateur extends Licencie
    class Educateur {
        private $id;
        private $licencie_id;
        private $email;
        private $motDePasse;
        private $isAdmin;

        public function __construct($id, $licencie_id, $email, $motDePasse, $isAdmin) {
            if(is_int($id))
            {
                $this->id = $id;
            }
            $this->licencie_id = $licencie_id;
            $this->email = $email;
            $this->motDePasse = $motDePasse;
            $this->isAdmin = $isAdmin;
        }

        public function addEducateur($licencie_id, $email, $motDePasse, $isAdmin){
            $this->licencie_id = $licencie_id;
            $this->email = $email;
            $this->motDePasse = $motDePasse;
            $this->isAdmin = $isAdmin;
        }

        // Getters et Setters pour les propriétés spécifiques à Educateur

        public function getId() { 
            return $this->id;
        }

        public function setId($id) { 
            $this->id = $id;
        }

        public function getEducateurByLicencieId() { 
            return $this->licencie_id;
        }

        public function setEducateurByLicencieId($licencie_id) { 
            $this->licencie_id = $licencie_id;
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
