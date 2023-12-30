<?php
//require_once '../Licencie.php';
require_once 'ContactDAO.php'; // Assurez-vous d'inclure le DAO pour Contact
require_once 'CategorieDAO.php';//inclure le DAO pour la categorie
class LicencieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function create(Licencie $licencie) {
        $contactDAO = new ContactDAO($this->connexion);
        
        // Ensuite, créer le licencié
        $query = "INSERT INTO licencies (numero_licence, nom, prenom, contact_id,categorie_id) VALUES (:numero_licence, :nom, :prenom, :contact_id, :categorie_id)";
        $stmt = $this->connexion->pdo->prepare($query);
        
        $stmt->bindValue(':numero_licence', $licencie->getNumeroLicence());
        $stmt->bindValue(':nom', $licencie->getNom());
        $stmt->bindValue(':prenom', $licencie->getPrenom());
        $stmt->bindValue(':contact_id',$licencie->getContact()->getId());
        $stmt->bindValue(':categorie_id',$licencie->getCategorie()->getId());
        $stmt->execute();

        // Retourner l'ID du nouveau licencié
        return $this->connexion->pdo->lastInsertId();
    }

    public function update(Licencie $licencie) {
        $contactDAO = new ContactDAO($this->connexion);
        $categorieDAO= new CategorieDAO($this->connexion);

        // Mettre à jour le contact associé
        $contactDAO->update($licencie->getContact());
        
        // Mettre à jour la categorie associé
        $categorieDAO->update($licencie->getCategorie());
        // Mettre à jour le licencié
        $stmt = $this->connexion->pdo->prepare('UPDATE licencies SET numero_licence = ?, nom = ?, prenom = ? WHERE id = ?');
        $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getId()]);
    }

    public function delete($id) {
        // Supprimer d'abord le contact associé
        $stmt = $this->connexion->pdo->prepare('SELECT contact_id FROM licencies WHERE id = ?');
        $stmt->execute([$id]);
        $contactId = $stmt->fetchColumn();

        $contactDAO = new ContactDAO($this->connexion);
        $contactDAO->delete($contactId);
        //supprimer la categorie associé
        $stmt = $this->connexion->pdo->prepare('SELECT categorie_id FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        $categorieId = $stmt->fetchColumn();

        $categorieDAO = new CategorieDAO($this->connexion);
        $categorieDAO->deleteById($categorieId);
        // Ensuite, supprimer le licencié
        $stmt = $this->connexion->pdo->prepare('DELETE FROM licencies WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function getById($id){
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
            if ($row) {
                $licencie[] = new Licencie($row['id'],$row['numero_licence'], $row['nom'], $row['prenom'], $row['contact_id'],$row['categorie_id']);
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
                $licencies[] = new Licencie($row['id'],$row['numero_licence'], $row['nom'], $row['prenom'], $row['contact_id'],$row['categorie_id']);
            }
            return $licencies;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }
}
?>
