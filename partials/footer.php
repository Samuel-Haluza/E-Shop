<!-- Start Footer -->
 <?php
 require_once(__DIR__ . '/../funk/function.php');
 require_once(__DIR__ . '/../funk/SocialLinks.php');
 require_once(__DIR__ . '/../funk/ProductLinks.php');
?>
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        123 Consectetur at ligula 10660
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <?php
                    $productLinks = new ProductLinks();
                    foreach ($productLinks->getProducts() as $item) {
                        echo '<li><a class="text-decoration-none" href="' . $item['link'] . '">' . $item['label'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <?php
                    // Inicializácia objektu triedy Menu
                    include_once("funk/Menu.php"); 
                    $menu = new Menu(); 
                    $menuItems = $menu->index(); 

                    
                    foreach ($menuItems as $item) {
                        echo '<li class="nav-item"><a class="nav-link text-decoration-none" href="' . $item['link'] . '">' . $item['label'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <?php
                    $socialLinks = new SocialLinks();
                    foreach ($socialLinks->getLinks() as $icon => $link) {
                        echo '<li class="list-inline-item">
                                <a class="text-light" href="' . $link . '" target="_blank">
                                    <i class="fab fa-' . $icon . ' fa-fw"></i>
                                </a>
                              </li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; <?php echo date("Y"); ?> Company Name 
                        | Designed by <a rel="sponsored" href="https://templatemo.com/page/1" target="_blank">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    $assetsManager = new AssetsManager();
    $assetsManager->defineScripts();
    foreach ($assetsManager->getScripts() as $script) {
        echo '<script src="' . $script . '"></script>';
    }
    ?>
</footer>
<!-- End Footer -->
