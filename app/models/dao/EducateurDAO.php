<?php
    class EducateurDAO {
        private $connexion;

        public function __construct(Connexion $connexion) {
            $this->connexion = $connexion;
        }

        public function create(Educateur $educateur) {
            try {
                $query = "INSERT INTO educateurs (licencie_id, email, mot_de_passe, isAdmin) VALUES (?, ?, ?, ?)";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$educateur->getEducateurByLicencieId(), $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->isAdmin()]);
                return true;
            } catch (PDOException $e) {
                print_r($e->getMessage());
                return false;
            }
        }

        public function getById($id) {
            try {
                $query = "SELECT * FROM educateurs WHERE id_educateur = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return new Educateur($row['id_educateur'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['isAdmin']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                return null;
            }
        }

        public function getByEmail($email) {
            try {
                $query = "SELECT * FROM educateurs WHERE email = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$email]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return new Educateur($row['id_educateur'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['isAdmin']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                return null;
            }
        }

        public function getAll() {
            try {
                $query = "SELECT * FROM educateurs";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt -> execute();
                $educateurs = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $educateurs[] = new Educateur($row['id'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['isAdmin']);
                }

                return $educateurs;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function update(Educateur $educateur) {
            try {
                $query = "UPDATE educateurs SET id_educateur = ?, licencie_id = ?, email = ?, mot_de_passe = ?, isAdmin = ? 
                            WHERE id_educateur = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$educateur->getId(), $educateur->getEducateurByLicencieId(), $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->isAdmin(), $educateur->getId()]);
                return true;
            } catch (PDOException $e) {
                print_r($e->getMessage());
                return false;
            }
        }

        public function deleteById($id) {
            try {
                $query = "DELETE FROM educateurs WHERE id_educateur = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$id]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
    }