<?php

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