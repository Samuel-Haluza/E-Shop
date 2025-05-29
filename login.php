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

require('db.php');
require("partials/header.php");
require("funk/User.php");
require_once("funk/function.php"); 

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();
$userModel = new User($db);
$assetsManager = new AssetsManager(); 

$error = '';
$message = '';

// Kontrola správy z registrácie
if (isset($_GET['message'])) {
    $message = '<div class="alert alert-success text-center">' . htmlspecialchars($_GET['message']) . '</div>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Načítanie používateľa podľa e-mailu
    $user = $userModel->getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        // Prihlásenie úspešné
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_name'] = $user['name'];

        // Presmerovanie podľa role
        if ($user['role'] == 0) { 
            header('Location: admin.php');
        } else { 
            header('Location: index.php');
        }
        exit;
    } else {
        $error = "Nesprávny e-mail alebo heslo.";
    }
}
?>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Prihlásenie</h2>
            <?php 
            if ($message) echo $message;
            if ($error): ?>
                <div class="alert alert-danger text-center"><?php echo $error; ?></div>
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
                <button type="submit" class="btn btn-primary w-100">Prihlásiť sa</button>
            </form>
        </div>
    </div>
</body>
<?php
include("partials/footer.php");
?>