<?php
//require_once '../Licencie.php';
//require_once 'ContactDAO.php'; // Assurez-vous d'inclure le DAO pour Contact
//require_once 'CategorieDAO.php';//inclure le DAO pour la categorie
class LicencieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function create(Licencie $licencie) {
        $contactDAO = new ContactDAO($this->connexion);
        $categorieDAO = new CategorieDAO($this->connexion);
        
        // Ensuite, créer le licencié
        $query = "INSERT INTO licencies (numero_licencie, nom, prenom, contact_id,categorie_id) VALUES (:numero_licencie, :nom, :prenom, :contact_id, :categorie_id)";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':numero_licencie', $licencie->getNumeroLicencie());
        $stmt->bindValue(':nom', $licencie->getNom());
        $stmt->bindValue(':prenom', $licencie->getPrenom());
        $stmt->bindValue(':contact_id',$licencie->getContact()->getId());
        $stmt->bindValue(':categorie_id',$licencie->getCategorie()->getId());
        $stmt->execute();
        // Retourner l'ID du nouveau licencié
        return $this->connexion->pdo->lastInsertId();
    }
    public function update(Licencie $licencie) {

        
       // $contactDAO = new ContactDAO($this->connexion);
       // $categorieDAO= new CategorieDAO($this->connexion);

        // Mettre à jour le contact associé
        //$contactDAO->update($licencie->getContact());
        
        // Mettre à jour la categorie associé
       // $categorieDAO->update($licencie->getCategorie());
        // Mettre à jour le licencié
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencies SET numero_licencie=?, nom=?, prenom=?, contact_id=?, categorie_id=? WHERE id=?");
            $stmt->execute([$licencie->getNumeroLicencie(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContact()->getId(), $licencie->getCategorie()->getId(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur
            return false;
        }
    }
 


    public function delete(Licencie $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencies WHERE id = ?");
            $stmt->execute([$licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur
            return false;
        }
    }

    public function getById($id){
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
            if ($row) {
                $licencie = new Licencie($row['id'],$row['numero_licencie'], $row['nom'], $row['prenom'], $row['contact_id'],$row['categorie_id']);
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    public function getAll(){
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies");
            $licencies = [];
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contactDAO = new ContactDAO($this->connexion);
                $categorieDAO = new CategorieDAO($this->connexion);
                $contact = $contactDAO->getById($row['contact_id']);
                $categorie = $categorieDAO->getById($row['categorie_id']);
                $licencies[] = new Licencie($row['id'],$row['numero_licencie'], $row['nom'], $row['prenom'], $contact,$categorie);
                $licencies[] = $licencies;
            }
            return $licencies;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }
}
?>
