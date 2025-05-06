<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM products ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $description, $price, $image) {
        $query = "INSERT INTO products (name, description, price, image) VALUES (:name, :description, :price, :image)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    public function updateProduct($id, $name, $description, $price, $image) {
        $query = "UPDATE products SET name = :name, description = :description, price = :price, image = :image WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>