<?php
class Contact {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllContacts() {
        $query = "SELECT * FROM contact";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id) {
        $query = "SELECT * FROM contact WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createContact($name, $email, $subject, $message) {
        $query = "INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        return $stmt->execute();
    }

    public function updateContact($id, $name, $email, $message) {
        $query = "UPDATE contact SET name = :name, email = :email, message = :message WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteContact($id) {
        $query = "DELETE FROM contact WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>