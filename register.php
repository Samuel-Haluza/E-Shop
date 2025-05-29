<?php
session_start();

// Ak je používateľ už prihlásený, presmeruj ho podľa role
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_role'] == 0) {
        header('Location: admin.php');
    } else {
        header('Location: index.php');
    }
    exit;
}

include('partials/header.php'); 
include('db.php');
include('funk/User.php');

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Nepodarilo sa pripojiť k databáze.");
}

// Inicializácia triedy User
$userManager = new User($db);

// Spracovanie formulára
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = 1; 

    // Overenie, či sú všetky polia vyplnené
    if (!empty($email) && !empty($password)) {
        // Overenie, či užívateľ s týmto emailom už existuje
        $existingUser = $userManager->getUserByEmail($email);
        if ($existingUser) {
            $message = '<div class="alert alert-danger text-center">Používateľ s týmto emailom už existuje.</div>';
        } else {
            // Vytvorenie používateľa
            if ($userManager->createUser($email, $password, $role)) {
                // Po úspešnej registrácii presmerujeme na login
                header('Location: login.php?message=Registrácia bola úspešná. Teraz sa môžete prihlásiť.');
                exit;
            } else {
                $message = '<div class="alert alert-danger text-center">Nepodarilo sa zaregistrovať používateľa. Skúste to znova.</div>';
            }
        }
    } else {
        $message = '<div class="alert alert-danger text-center">Vyplňte všetky polia.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrácia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Registrácia</h2>
            <?php if ($message): ?>
                <?php echo $message; ?>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Heslo:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrovať sa</button>
            </form>
        </div>
    </div>
    <?php include("partials/footer.php"); ?>
</body>
</html>