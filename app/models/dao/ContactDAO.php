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
        $query = "INSERT INTO contacts (nom, prenom, email, numeroTel) VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $this->connexion->pdo->prepare($query);

        $stmt->bindValue(':nom', $contact->getNom());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone',$contact->getnumeroTel());
        $stmt->execute();

        return $this->connexion->pdo->lastInsertId();
    }

    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contacts");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new Contact($row['id'],$row['nom'], $row['prenom'], $row['email'], $row['numeroTel']);
            }

            return $contacts;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
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

    public function delete( $id)
    {
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getById($id){
        $sql = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch();
            return new Contact($row['id'],$row['nom'], $row['prenom'], $row['email'], $row['numeroTel']);
        } else {
            return null;
        }

    }
}