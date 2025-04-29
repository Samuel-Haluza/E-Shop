<?php

include('db.php');
include("partials/header.php");

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();

// Získanie ID kontaktu z URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Načítanie údajov kontaktu
$query = "SELECT * FROM contact WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$contact = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$contact) {
    echo "Kontakt s ID $id neexistuje.";
    exit;
}

// Spracovanie formulára
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Aktualizácia údajov kontaktu
    $updateQuery = "UPDATE contact SET name = :name, email = :email, message = :message WHERE id = :id";
    $updateStmt = $db->prepare($updateQuery);
    $updateStmt->bindParam(':name', $name);
    $updateStmt->bindParam(':email', $email);
    $updateStmt->bindParam(':message', $message);
    $updateStmt->bindParam(':id', $id);

    if ($updateStmt->execute()) {
        header('Location: admin.php?message=Kontakt bol úspešne upravený');
        exit;
    } else {
        echo "Nepodarilo sa upraviť kontakt.";
    }
}
?>

<section class="contact-edit" style="padding: 20px;">
    <div class="container">
        <h2 class="text-center">Upraviť kontakt</h2>
        <form method="POST" style="max-width: 600px; margin: 0 auto;">
            <div class="mb-3">
                <label for="name" class="form-label">Meno:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($contact['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($contact['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Správa:</label>
                <textarea name="message" id="message" class="form-control" rows="5" required><?php echo htmlspecialchars($contact['message']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Uložiť</button>
            <a href="admin.php" class="btn btn-secondary">Späť</a>
        </form>
    </div>
</section>

<?php
include("partials/footer.php");
?>