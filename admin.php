<?php
/*
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
    header('Location: login.php');
    exit;
}

*/


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

// Načítanie všetkých používateľov
$userQuery = "SELECT * FROM users";
$userStmt = $db->prepare($userQuery);
$userStmt->execute();

$users = $userStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Nadpis -->
<section class="admin-header" style="padding: 20px; background-color: #f8f9fa; text-align: center;">
    <h1>Vitaj Admin</h1>
    <a href="logout.php" class="btn btn-danger" style="margin-top: 10px;">Odhlásiť sa</a>
</section>

<!-- Zobrazenie správ -->
<section class="admin-contacts" style="padding: 20px;">
    <div class="container">
        <div class="row">
            <?php foreach ($contacts as $contact): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 5px; padding: 15px; background-color: #fff;">
                        <h5><strong>Meno:</strong> <?php echo htmlspecialchars($contact['name']); ?></h5>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?></p>
                        <p><strong>Predmet:</strong> <?php echo htmlspecialchars($contact['subject']); ?></p>
                        <p><strong>Správa:</strong> <?php echo nl2br(htmlspecialchars($contact['message'])); ?></p>
                        <div class="actions" style="margin-top: 10px;">
                            <a href="contact_edit.php?id=<?php echo $contact['id']; ?>" class="btn btn-primary" style="margin-right: 5px;">Upraviť</a>
                            <a href="contact_delete.php?id=<?php echo $contact['id']; ?>" class="btn btn-danger" onclick="return confirm('Naozaj chcete túto správu vymazať?')">Vymazať</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Zobrazenie používateľov -->
<section class="admin-users" style="padding: 20px; background-color: #f8f9fa;">
    <div class="container">
        <h2 class="text-center">Zoznam používateľov</h2>
        <div class="row">
            <?php foreach ($users as $user): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 5px; padding: 15px; background-color: #fff;">
                        <h5><strong>Meno:</strong> <?php echo htmlspecialchars($user['name']); ?></h5>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                        <p><strong>Heslo:</strong> <?php echo htmlspecialchars($user['password']); ?></p>
                        <p><strong>Rola:</strong> <?php echo $user['role'] == 0 ? 'Admin' : 'Používateľ'; ?></p>
                        <p><strong>Vytvorený:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
                        <div class="actions" style="margin-top: 10px;">
                            <a href="user_edit.php?id=<?php echo $user['id']; ?>" class="btn btn-primary" style="margin-right: 5px;">Upraviť</a>
                            <a href="user_delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Naozaj chcete vymazať tohto používateľa?')">Vymazať</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
include("partials/footer.php");
?>
