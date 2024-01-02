<?php
    class EducateurDAO {
        private $connexion;

        public function __construct(Connexion $connexion) {
            $this->connexion = $connexion;
        }

        public function create(Educateur $educateur) {
            try {
                $query = "INSERT INTO educateur (numero_licence, email, mot_de_passe, est_administrateur)
                             VALUES (?, ?, ?, ?)";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$educateur->getNumeroLicence(), $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->isAdmin()]);
                return true;
            } catch (PDOException $e) {
                print_r($e->getMessage());
                return false;
            }
        }

        public function getById($id) {
            try {
                $query = "SELECT * FROM educateur WHERE id_educateur = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return new Educateur($row['id_educateur'], $row['numero_licence'], $row['email'], $row['mot_de_passe'], $row['isAdmin']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                return null;
            }
        }

        public function getByEmail($email) {
            try {
                $query = "SELECT * FROM educateur WHERE email = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$email]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return new Educateur($row['id_educateur'], $row['numero_licence'], $row['email'], $row['mot_de_passe'], $row['isAdmin']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                return null;
            }
        }

        public function getAll() {
            try {
                $query = "SELECT * FROM educateur";
                $stmt = $this->connexion->pdo->prepare($query);
                $educateurs = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $educateurs[] = new Educateur($row['id_educateur'], $row['numero_licence'], $row['email'], $row['mot_de_passe'], $row['isAdmin']);
                }

                return $educateurs;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function update(Educateur $educateur) {
            try {
                $query = "UPDATE educateur SET id_educateur = ?, numero_licence = ?, email = ?, mot_de_passe = ?, est_administrateur = ? 
                            WHERE id_educateur = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$educateur->getIdEducateur(), $educateur->getNumeroLicence(), $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->isAdmin(), $educateur->getIdEducateur()]);
                return true;
            } catch (PDOException $e) {
                print_r($e->getMessage());
                return false;
            }
        }

        public function deleteById($id) {
            try {
                $query = "DELETE FROM educateur WHERE id_educateur = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$id]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
    }