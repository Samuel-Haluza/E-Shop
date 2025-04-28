<?php
include('db.php');

// Získanie ID správy zo stránky
$id = $_GET['id'];

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();

// Načítanie údajov o správe
$query = "SELECT * FROM contact WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

$contact = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Aktualizácia správy v databáze
    $query = "UPDATE contact SET name = :name, email = :email, message = :message WHERE id = :id";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: admin.php');
        exit;
    } else {
        echo 'Nepodarilo sa upravit správu';
    }
}
?>

<!-- Formulár pre úpravu -->
<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($contact['name']); ?>" required><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($contact['email']); ?>" required><br>
    <textarea name="message"><?php echo htmlspecialchars($contact['message']); ?></textarea><br>
    <input type="submit" value="Upraviť">
</form>
