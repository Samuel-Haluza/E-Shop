<?php
include('db.php');
include('funk/User.php');
include('funk/Contact.php');
include('funk/Product.php');

$database = new Database();
$db = $database->getConnection();

$userManager = new User($db);
$contactManager = new Contact($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($action === 'edit_user') {
    // Úprava používateľa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        if ($userManager->updateUser($id, $name, $email, $role)) {
            header('Location: admin.php?message=Používateľ bol úspešne upravený');
        } else {
            header('Location: admin.php?error=Nepodarilo sa upraviť používateľa');
        }
        exit;
    }
} elseif ($action === 'delete_user') {
    // Mazanie používateľa
    if ($userManager->deleteUser($id)) {
        header('Location: admin.php?message=Používateľ bol úspešne vymazaný');
    } else {
        header('Location: admin.php?error=Nepodarilo sa vymazať používateľa');
    }
    exit;
} elseif ($action === 'edit_contact') {
    // Úprava kontaktu
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if ($contactManager->updateContact($id, $name, $email, $message)) {
            header('Location: admin.php?message=Kontakt bol úspešne upravený');
        } else {
            header('Location: admin.php?error=Nepodarilo sa upraviť kontakt');
        }
        exit;
    }
} elseif ($action === 'delete_contact') {
    
    if ($contactManager->deleteContact($id)) {
        header('Location: admin.php?message=Kontakt bol úspešne vymazaný');
    } else {
        header('Location: admin.php?error=Nepodarilo sa vymazať kontakt');
    }
    exit;

    
} elseif ($action === 'delete_product') {
    $productManager = new Product($db);
    if ($productManager->deleteProduct($id)) {
        header('Location: admin.php?message=Produkt bol úspešne vymazaný');
    } else {
        header('Location: admin.php?error=Nepodarilo sa vymazať produkt');
    }
    exit;
} else {
    header('Location: admin.php?error=Neplatná akcia');
    exit;
}
?>