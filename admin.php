<?php
include('db.php');
include("partials/header.php");

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();

// Načítanie všetkých správ
$query = "SELECT * FROM contact";
$stmt = $db->prepare($query);
$stmt->execute();

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Zobrazenie všetkých správ
foreach ($contacts as $contact) {
    echo '<div class="contact-item">';
    echo '<p><strong>Name:</strong> ' . htmlspecialchars($contact['name']) . '</p>';
    echo '<p><strong>Email:</strong> ' . htmlspecialchars($contact['email']) . '</p>';
    echo '<p><strong>Subject:</strong> ' . htmlspecialchars($contact['subject']) . '</p>';
    echo '<p><strong>Message:</strong> ' . nl2br(htmlspecialchars($contact['message'])) . '</p>';
    echo '<div class="actions">';
    echo '<a href="contact_edit.php?id=' . $contact['id'] . '" class="btn btn-primary">Upraviť</a> ';
    echo '<a href="contact_delete.php?id=' . $contact['id'] . '" class="btn btn-danger" onclick="return confirm(\'Naozaj chcete túto správu vymazať?\')">Vymazať</a>';
    echo '</div>';
    echo '<hr>';
}

include("partials/footer.php");
?>
