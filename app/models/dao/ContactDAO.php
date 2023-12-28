<?php
class ContactDAO
{
    private $connexion ;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }

    public function create(Contact $contact)
    {
        $query = "INSERT INTO contacts (nom, prenom, email, numero_tel) VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $this->connexion->pdo->prepare($query);
        
        $stmt->bindValue(':nom', $contact->getNom());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone',$contact->getnumeroTel());
        $stmt->execute();

        return $this->connexion->pdo->lastInsertId();
    }

    public function read($id)
    {
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch();
        if ($row === false) {
            return null;
        }

    }

    public function update(Contact $contact)
    {
        $query = "UPDATE contacts SET nom = :nom, prenom = :prenom, email = :email, telephone = :numeroTel WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $contact->getId());
        $stmt->bindValue(':nom', $contact->getNom());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone', $contact->getnumeroTel());
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->rowCount();
    }

    // Méthode pour supprimer un contact par son ID
    public function deleteById($id) {
        try {
            $query = "DELETE FROM contacts WHERE id = ?";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression ici
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contacts WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Contact($row['id'],$row['nom'], $row['prenom'], $row['email'], $row['numero_tel']);
            } else {
                return null; // Aucun contact trouvé avec cet ID
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération ici
            return null;
        }
    }

    // MÃ©thode pour récupérer la liste de tous les contacts
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contacts");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new Contact($row['id'],$row['nom'], $row['prenom'], $row['email'], $row['numero_tel']);
            }

            return $contacts;
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération ici
            return [];
        }
    }
}