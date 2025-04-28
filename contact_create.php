<?php
include('db.php'); // Pripojenie k databáze

$database = new Database();
$db = $database->getConnection(); // Vytvorenie pripojenia



// Získanie údajov zo formulára
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Vytvorenie pripojenia k databáze
    $database = new Database();
    $db = $database->getConnection();

    // SQL dotaz na vloženie dát do databázy
    $query = "INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
    $stmt = $db->prepare($query);

    // Bindovanie hodnôt
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);

    // Vykonanie dotazu a presmerovanie na admin stránku po úspechu
    if ($stmt->execute()) {
        header('Location: thankyou.php');  // Presmerovanie na stránku thankyou.php
        exit;
    } else {
        echo 'Nepodarilo sa odoslať formulár';
    }
}
?>
