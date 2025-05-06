<?php
include("partials/header.php");
include("db.php");
include("funk/Product.php");

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();
$productManager = new Product($db);

// Načítanie konkrétneho produktu
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = $productManager->getProductById($id);

if (!$product) {
    echo "<p class='text-center text-danger'>Produkt neexistuje.</p>";
    include("partials/footer.php");
    exit;
}
?>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                </div>
            </div>
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?php echo htmlspecialchars($product['name']); ?></h1>
                        <p class="h3 py-2"><?php echo htmlspecialchars($product['price']); ?> €</p>
                        <h6>Description:</h6>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <form action="cart.php" method="GET">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocart">Add To Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<?php include("partials/footer.php"); ?>


</body>

</html>