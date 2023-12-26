<?php
class ContactDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Contact $contact)
    {
        $query = "INSERT INTO contacts (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':nom', $contact->getNom());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone', $contact->getnumeroTel());
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function read($id)
    {
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
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
        $stmt = $this->pdo->prepare($query);
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
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->rowCount();
    }
}