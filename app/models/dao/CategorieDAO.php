<?php
class CategorieDAO
{
    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->connexion->pdo->query($sql);
        $categories = [];
        while ($row = $stmt->fetch()) {
            $categories[] = new Categorie($row['nom'], $row['code']);
        }

        return $categories;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch();
            return new Categorie($row['nom'], $row['code']);
        } else {
            return null;
        }
    }

    public function create(Categorie $categorie)
    {
        $sql = "INSERT INTO categories (nom, code) VALUES (:nom, :code)";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':nom', $categorie->getNom());
        $stmt->bindParam(':code', $categorie->getCode());
        $stmt->execute();

        return $this->connexion->pdo->lastInsertId();
    }

    public function update(Categorie $categorie)
    {
        $sql = "UPDATE categories SET nom = :nom, code = :code WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $categorie->getId());
        $stmt->bindParam(':nom', $categorie->getNom());
        $stmt->bindParam(':code', $categorie->getCode());
        $stmt->execute();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
