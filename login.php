<?php

session_start();
include('db.php');
include("partials/header.php");
include("funk/User.php");

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();
$userModel = new User($db);

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Prihlásenie</h2>
            <?php if (isset($error)): ?>
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
    <?php
    add_styles();
    ?>
</body>
</html>
<?php
include("partials/footer.php");

?>