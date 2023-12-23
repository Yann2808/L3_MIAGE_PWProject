<?php
class CategorieDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->pdo->query($sql);
        $categories = [];
        while ($row = $stmt->fetch()) {
            $categories[] = new Categorie($row['nom'], $row['code']);
        }

        return $categories;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
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
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom', $categorie->nom);
        $stmt->bindParam(':code', $categorie->code);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function update(Categorie $categorie)
    {
        $sql = "UPDATE categories SET nom = :nom, code = :code WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom', $categorie->nom);
        $stmt->bindParam(':code', $categorie->code);
        $stmt->bindParam(':id', $categorie->id);
        $stmt->execute();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
