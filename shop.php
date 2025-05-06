<?php
include("partials/header.php");
include("db.php");
include("funk/Product.php");

// Vytvorenie pripojenia k databáze
$database = new Database();
$db = $database->getConnection();
$productManager = new Product($db);

// Načítanie všetkých produktov
$products = $productManager->getAllProducts();
?>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Gender
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul class="collapse show list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="shop.php?category=men">Men</a></li>
                        <li><a class="text-decoration-none" href="shop.php?category=women">Women</a></li>
                    </ul>
                </li>
                <li class="pb-3">
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                        Sale
                        <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                    </a>
                    <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                        <li><a class="text-decoration-none" href="shop.php?category=sport">Sport</a></li>
                        <li><a class="text-decoration-none" href="shop.php?category=luxury">Luxury</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.php?id=<?php echo $product['id']; ?>"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php?id=<?php echo $product['id']; ?>" class="h3 text-decoration-none"><?php echo htmlspecialchars($product['name']); ?></a>
                                <p class="text-center mb-0"><?php echo htmlspecialchars($product['price']); ?> €</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<?php include("partials/footer.php"); ?>