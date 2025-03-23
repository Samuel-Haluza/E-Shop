<?php
// Funkcia na na header
function get_meno($pages) {
    $menu = "";
    foreach ($pages as $name => $link) {
        $menu .= "<li class='nav-item'><a class='nav-link' href='$link'>$name</a></li>";
    }
    return $menu;
}

// Funkcia na footer
function get_menu_items($items) {
    $menu = "";
    foreach ($items as $name => $link) {
        $menu .= "<li><a class='text-decoration-none' href='$link'>$name</a></li>";
    }
    return $menu;
}
// Funkcia na dynamickych ikoniek dole vo footeri
function get_social_icons($icons) {
    $html = "";
    foreach ($icons as $icon => $link) {
        $html .= "<li class='list-inline-item border border-light rounded-circle text-center'>
                    <a class='text-light text-decoration-none' target='_blank' href='$link'>
                        <i class='fab fa-$icon fa-lg fa-fw'></i>
                    </a>
                  </li>";
    }
    return $html;
}

// Funkcia na pridanie skriptov
function add_scripts() {
    $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");

    // Predvolené skripty, ktoré budú načítané na každej stránke
    echo '<script src="assets/js/jquery-1.11.0.min.js"></script>';
    echo '<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>';
    echo '<script src="assets/js/bootstrap.bundle.min.js"></script>';
    echo '<script src="assets/js/templatemo.js"></script>';
    echo '<script src="assets/js/custom.js"></script>';
    echo '<script src="assets/js/menu.js"></script>';

}

// Funkcia na pridanie štýlov
function add_styles() {
    $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");

    // Predvolené štýly, ktoré budú načítané na každej stránke
    echo '<link rel="stylesheet" href="assets/css/style.css">';  // Hlavný štýl
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';  // Font Awesome
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">';  // Google Fonts
    echo '<link rel="stylesheet" href="assets/css/fontawesome.min.css">';  // Font Awesome štýl (ak je vlastný)

    // Ďalšie predvolené štýly, ktoré budú načítané na každej stránke
    echo '<link rel="stylesheet" href="assets/css/bootstrap.min.css">';  // Bootstrap
    echo '<link rel="stylesheet" href="assets/css/templatemo.css">';  // Templatemo štýl (ak používaš)
    echo '<link rel="stylesheet" href="assets/css/custom.css">';  // Vlastné CSS pre prispôsobenie

    // Ak používaš mapu, pridaj aj tento štýl
    echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />';  // Mapové štýly (ak používaš Leaflet)

    // Štýly špecifické pre jednotlivé stránky
    switch ($page_name) {
        case "index":
            echo '<link rel="stylesheet" href="assets/css/slider.css">';  // Štýl pre slider na index stránke
            break;
        case "portfolio":
            echo '<link rel="stylesheet" href="assets/css/portfolio.css">';  // Portfolio stránka
            break;
        case "qna":
            echo '<link rel="stylesheet" href="assets/css/accordion.css">';  // Accordion pre Q&A stránku
            break;
        case "kontakt":
            echo '<link rel="stylesheet" href="assets/css/form.css">';  // Formulár pre kontaktnú stránku
            break;
        case "thankyou":
            // Môžeš pridať štýly pre stránku vďaky, ak existujú
            break;
    }
}



?>