<?php

include('db.php');

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();

// Získanie ID používateľa z URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Vymazanie používateľa z databázy
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: admin.php?message=Používateľ bol úspešne vymazaný');
        exit;
    } else {
        echo "Nepodarilo sa vymazať používateľa.";
    }
} else {
    echo "Neplatné ID používateľa.";
}
?>