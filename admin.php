<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
    header('Location: login.php');
    exit;
}

include('db.php');
include('funk/User.php');
include('funk/Contact.php');
include('funk/Product.php');


$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die("Nepodarilo sa pripojiť k databáze.");
}


// Použitie tried
$userManager = new User($db);
$contactManager = new Contact($db);
$productManager = new Product($db);

// Načítanie údajov
$contacts = $contactManager->getAllContacts() ?? [];
$users = $userManager->getAllUsers() ?? [];
$products = $productManager->getAllProducts() ?? [];

// Načítanie údajov na úpravu
$editContact = null;
$editUser = null;
$editProduct = null;

if (isset($_GET['edit_contact_id'])) {
    $editContact = $contactManager->getContactById($_GET['edit_contact_id']);
}

if (isset($_GET['edit_user_id'])) {
    $editUser = $userManager->getUserById($_GET['edit_user_id']);
}

if (isset($_GET['edit_product_id'])) {
    $editProduct = $productManager->getProductById($_GET['edit_product_id']);
}

// Spracovanie formulárov na pridávanie a úpravu kontaktov
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_contact'])) {
        $id = $_POST['contact_id'];
        $name = $_POST['contact_name'];
        $email = $_POST['contact_email'];
        $message = $_POST['contact_message'];

        if ($contactManager->updateContact($id, $name, $email, $message)) {
            header('Location: admin.php?message=Kontakt bol úspešne upravený');
            exit;
        } else {
            echo "<p class='text-danger text-center'>Nepodarilo sa upraviť kontakt.</p>";
        }
    }
}

// Spracovanie formulárov na pridávanie a úpravu používateľov
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_user'])) {
        $id = $_POST['user_id'];
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $role = $_POST['user_role'];

        if ($userManager->updateUser($id, $name, $email, $role)) {
            header('Location: admin.php?message=Používateľ bol úspešne upravený');
            exit;
        } else {
            echo "<p class='text-danger text-center'>Nepodarilo sa upraviť používateľa.</p>";
        }
    }
}

// Spracovanie formulárov na pridávanie a úpravu produktov
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create_product'])) {
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];
        $price = $_POST['product_price'];
        $image = $_POST['product_image'];

        if ($productManager->createProduct($name, $description, $price, $image)) {
            header('Location: admin.php?message=Produkt bol úspešne pridaný');
            exit;
        } else {
            echo "<p class='text-danger text-center'>Nepodarilo sa pridať produkt.</p>";
        }
    } elseif (isset($_POST['update_product'])) {
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $description = $_POST['product_description'];
        $price = $_POST['product_price'];
        $image = $_POST['product_image'];

        if ($productManager->updateProduct($id, $name, $description, $price, $image)) {
            header('Location: admin.php?message=Produkt bol úspešne upravený');
            exit;
        } else {
            echo "<p class='text-danger text-center'>Nepodarilo sa upraviť produkt.</p>";
        }
    }
}

// Spracovanie akcií z GET parametrov pre kontakty
if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'delete_contact') {
    $id = intval($_GET['id']);
    if ($contactManager->deleteContact($id)) {
        header('Location: admin.php?message=Kontakt bol úspešne vymazaný');
        exit;
    } else {
        echo "<p class='text-danger text-center'>Nepodarilo sa vymazať kontakt.</p>";
    }
}

// Spracovanie akcií z GET parametrov pre používateľov
if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'delete_user') {
    $id = intval($_GET['id']);
    if ($userManager->deleteUser($id)) {
        header('Location: admin.php?message=Používateľ bol úspešne vymazaný');
        exit;
    } else {
        echo "<p class='text-danger text-center'>Nepodarilo sa vymazať používateľa.</p>";
    }
}

// Spracovanie akcií z GET parametrov pre produkty
if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'delete_product') {
    $id = intval($_GET['id']);
    if ($productManager->deleteProduct($id)) {
        header('Location: admin.php?message=Produkt bol úspešne vymazaný');
        exit;
    } else {
        echo "<p class='text-danger text-center'>Nepodarilo sa vymazať produkt.</p>";
    }
}
?>

<?php include("partials/header.php"); ?>

<!-- Nadpis -->
<section class="admin-header text-center py-4 bg-light">
    <h1>Vitaj Admin</h1>
    <a href="logout.php" class="btn btn-danger mt-3">Odhlásiť sa</a>
</section>

<!-- Formulár na úpravu kontaktu -->
<?php if ($editContact): ?>
<section class="edit-contact py-4">
    <div class="container">
        <h2 class="text-center mb-4">Upraviť kontakt</h2>
        <form method="POST" action="">
            <input type="hidden" name="contact_id" value="<?php echo $editContact['id']; ?>">
            <div class="mb-3">
                <label for="contact_name" class="form-label">Meno:</label>
                <input type="text" name="contact_name" id="contact_name" class="form-control" value="<?php echo htmlspecialchars($editContact['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="contact_email" class="form-label">Email:</label>
                <input type="email" name="contact_email" id="contact_email" class="form-control" value="<?php echo htmlspecialchars($editContact['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="contact_message" class="form-label">Správa:</label>
                <textarea name="contact_message" id="contact_message" class="form-control" rows="5" required><?php echo htmlspecialchars($editContact['message']); ?></textarea>
            </div>
            <button type="submit" name="update_contact" class="btn btn-success">Uložiť</button>
            <a href="admin.php" class="btn btn-secondary">Späť</a>
        </form>
    </div>
</section>
<?php endif; ?>

<!-- Formulár na úpravu používateľa -->
<?php if ($editUser): ?>
<section class="edit-user py-4">
    <div class="container">
        <h2 class="text-center mb-4">Upraviť používateľa</h2>
        <form method="POST" action="">
            <input type="hidden" name="user_id" value="<?php echo $editUser['id']; ?>">
            <div class="mb-3">
                <label for="user_name" class="form-label">Meno:</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo htmlspecialchars($editUser['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="user_email" class="form-label">Email:</label>
                <input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo htmlspecialchars($editUser['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="user_role" class="form-label">Rola:</label>
                <select name="user_role" id="user_role" class="form-control">
                    <option value="0" <?php echo $editUser['role'] == 0 ? 'selected' : ''; ?>>Admin</option>
                    <option value="1" <?php echo $editUser['role'] == 1 ? 'selected' : ''; ?>>Používateľ</option>
                </select>
            </div>
            <button type="submit" name="update_user" class="btn btn-success">Uložiť</button>
            <a href="admin.php" class="btn btn-secondary">Späť</a>
        </form>
    </div>
</section>
<?php endif; ?>

<!-- Formulár na pridanie alebo úpravu produktu -->
<section class="edit-product py-4">
    <div class="container">
        <h2 class="text-center mb-4"><?php echo $editProduct ? 'Upraviť produkt' : 'Pridať nový produkt'; ?></h2>
        <form method="POST">
            <?php if ($editProduct): ?>
                <input type="hidden" name="product_id" value="<?php echo $editProduct['id']; ?>">
            <?php endif; ?>
            <div class="mb-3">
                <label for="product_name" class="form-label">Názov:</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $editProduct['name'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Popis:</label>
                <textarea name="product_description" id="product_description" class="form-control" rows="5" required><?php echo $editProduct['description'] ?? ''; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Cena (€):</label>
                <input type="number" step="0.01" name="product_price" id="product_price" class="form-control" value="<?php echo $editProduct['price'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="product_image" class="form-label">Obrázok (URL):</label>
                <input type="text" name="product_image" id="product_image" class="form-control" value="<?php echo $editProduct['image'] ?? ''; ?>">
            </div>
            <button type="submit" name="<?php echo $editProduct ? 'update_product' : 'create_product'; ?>" class="btn btn-success">
                <?php echo $editProduct ? 'Uložiť zmeny' : 'Pridať produkt'; ?>
            </button>
        </form>
    </div>
</section>

<!-- Zobrazenie kontaktov -->
<section class="admin-contacts py-4">
    <div class="container">
        <h2 class="text-center mb-4">Správy od kontaktov</h2>
        <div class="row">
            <?php foreach ($contacts as $contact): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Meno:</strong> <?php echo htmlspecialchars($contact['name']); ?></h5>
                            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?></p>
                            <p class="card-text"><strong>Predmet:</strong> <?php echo htmlspecialchars($contact['subject']); ?></p>
                            <p class="card-text"><strong>Správa:</strong> <?php echo nl2br(htmlspecialchars($contact['message'])); ?></p>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="admin.php?edit_contact_id=<?php echo $contact['id']; ?>" class="btn btn-primary btn-sm">Upraviť</a>
                                <a href="admin.php?action=delete_contact&id=<?php echo $contact['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Naozaj chcete túto správu vymazať?')">Vymazať</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Zobrazenie používateľov -->
<section class="admin-users py-4 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Zoznam používateľov</h2>
        <div class="row">
            <?php foreach ($users as $user): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Meno:</strong> <?php echo htmlspecialchars($user['name']); ?></h5>
                            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                            <p class="card-text"><strong>Rola:</strong> <?php echo $user['role'] == 0 ? 'Admin' : 'Používateľ'; ?></p>
                            <p class="card-text"><strong>Vytvorený:</strong> <?php echo htmlspecialchars($user['created_at']); ?></p>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="admin.php?edit_user_id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Upraviť</a>
                                <a href="admin.php?action=delete_user&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Naozaj chcete vymazať tohto používateľa?')">Vymazať</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Zobrazenie produktov -->
<section class="admin-products py-4">
    <div class="container">
        <h2 class="text-center mb-4">Produkty</h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Názov:</strong> <?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><strong>Popis:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="card-text"><strong>Cena:</strong> <?php echo htmlspecialchars($product['price']); ?> €</p>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="admin.php?edit_product_id=<?php echo $product['id']; ?>" class="btn btn-primary btn-sm">Upraviť</a>
                                <a href="admin.php?action=delete_product&id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Naozaj chcete vymazať tento produkt?')">Vymazať</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include("partials/footer.php"); ?>
