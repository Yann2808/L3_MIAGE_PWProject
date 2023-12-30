<?php
require_once 'Licencie.php';
require_once 'ContactDAO.php'; // Assurez-vous d'inclure le DAO pour Contact

class LicencieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function create(Licencie $licencie) {
        $contactDAO = new ContactDAO($this->connexion);

        // Créer d'abord le contact associé
        $contactId = $contactDAO->create($licencie->getContact());

        // Ensuite, créer le licencié
        $stmt = $this->connexion->pdo->prepare(
            'INSERT INTO licencies (numero_licence, nom, prenom, contact_id) 
            VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([
            $licencie->getNumeroLicence(),
            $licencie->getNom(),
            $licencie->getPrenom(),
            $contactId
        ]);

        // Retourner l'ID du nouveau licencié
        return $this->db->lastInsertId();
    }

    public function update(Licencie $licencie) {
        $contactDAO = new ContactDAO($this->db);

        // Mettre à jour le contact associé
        $contactDAO->update($licencie->getContact());

        // Mettre à jour le licencié
        $stmt = $this->db->prepare('UPDATE licencies SET numero_licence = ?, nom = ?, prenom = ? WHERE id = ?');
        $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getId()]);
    }

    public function delete($id) {
        // Supprimer d'abord le contact associé
        $stmt = $this->db->prepare('SELECT contact_id FROM licencies WHERE id = ?');
        $stmt->execute([$id]);
        $contactId = $stmt->fetchColumn();

        $contactDAO = new ContactDAO($this->db);
        $contactDAO->delete($contactId);

        // Ensuite, supprimer le licencié
        $stmt = $this->db->prepare('DELETE FROM licencies WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare('SELECT * FROM licencies WHERE id = ?');
        $stmt->execute([$id]);
        $licencieData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$licencieData) {
            return null;
        }

        $contactDAO = new ContactDAO($this->connexion->pdo->db);
        $contact = $contactDAO->getId($licencieData['contact_id']);

        $licencie = new Licencie(
            $licencieData['numero_licence'],
            $licencieData['nom'],
            $licencieData['prenom'],
            $contact
        );
        $licencie->setId($licencieData['id']);

        return $licencie;
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM licencies');
        $licencieDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $licencies = [];
        $contactDAO = new ContactDAO($this->db);

        foreach ($licencieDataList as $licencieData) {
            $contact = $contactDAO->getById($licencieData['contact_id']);
            $licencie = new Licencie(
                $licencieData['numero_licence'],
                $licencieData['nom'],
                $licencieData['prenom'],
                $contact
            );
            $licencie->setId($licencieData['id']);
            $licencies[] = $licencie;
        }

        return $licencies;
    }
}
?>
