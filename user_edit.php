<?php

include('db.php');
include("partials/header.php");

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();

// Získanie ID používateľa z URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Načítanie údajov používateľa
$query = "SELECT * FROM users WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Používateľ s ID $id neexistuje.";
    exit;
}

// Spracovanie formulára
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Aktualizácia údajov používateľa
    $updateQuery = "UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id";
    $updateStmt = $db->prepare($updateQuery);
    $updateStmt->bindParam(':name', $name);
    $updateStmt->bindParam(':email', $email);
    $updateStmt->bindParam(':role', $role);
    $updateStmt->bindParam(':id', $id);

    if ($updateStmt->execute()) {
        header('Location: admin.php');
        exit;
    } else {
        echo "Nepodarilo sa upraviť používateľa.";
    }
}
?>

<section class="user-edit" style="padding: 20px;">
    <div class="container">
        <h2 class="text-center">Upraviť používateľa</h2>
        <form method="POST" style="max-width: 600px; margin: 0 auto;">
            <div class="mb-3">
                <label for="name" class="form-label">Meno:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rola:</label>
                <select name="role" id="role" class="form-select">
                    <option value="0" <?php echo $user['role'] == 0 ? 'selected' : ''; ?>>Admin</option>
                    <option value="1" <?php echo $user['role'] == 1 ? 'selected' : ''; ?>>Používateľ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Uložiť</button>
            <a href="admin.php" class="btn btn-secondary">Späť</a>
        </form>
    </div>
</section>

<?php
include("partials/footer.php");
?>