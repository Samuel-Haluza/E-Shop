<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require(__DIR__ . '/../funk/function.php'); 
require(__DIR__ . '/../funk/Menu.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - About Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $assetsManager = new AssetsManager();
    $assetsManager->defineStyles();
    foreach ($assetsManager->getStyles() as $style) {
        echo '<link rel="stylesheet" href="' . $style . '">';
    }
    ?>
    <style>
        .auth-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .auth-buttons a {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <?php
                        $menu = new Menu();
                        $menuItems = $menu->index();
                        foreach ($menuItems as $item) {
                            echo '<li class="nav-item"><a class="nav-link" href="' . $item['link'] . '">' . $item['label'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="auth-buttons">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php if ($_SESSION['user_role'] == 0): ?>
                            <a href="admin.php" class="nav-link">Admin</a>
                        <?php endif; ?>
                        <a href="logout.php" class="nav-link">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="nav-link">Login</a>
                        <a href="register.php" class="nav-link">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>