<?php
include('db.php');

// Získanie ID správy zo stránky
$id = $_GET['id'];

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();

// Vymazanie správy
$query = "DELETE FROM contact WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header('Location: admin.php');
    exit;
} else {
    echo 'Nepodarilo sa vymazať správu';
}
?>
