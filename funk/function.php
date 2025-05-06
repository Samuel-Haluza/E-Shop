<?php


function add_scripts() {
    $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");

    
    echo '<script src="assets/js/jquery-1.11.0.min.js"></script>';
    echo '<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>';
    echo '<script src="assets/js/bootstrap.bundle.min.js"></script>';
    echo '<script src="assets/js/templatemo.js"></script>';
    echo '<script src="assets/js/custom.js"></script>';
    echo '<script src="assets/js/menu.js"></script>';

}


function add_styles() {
    $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");


    echo '<link rel="stylesheet" href="assets/css/style.css">';  
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';  
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">'; 
    echo '<link rel="stylesheet" href="assets/css/fontawesome.min.css">';  

    
    echo '<link rel="stylesheet" href="assets/css/bootstrap.min.css">';  
    echo '<link rel="stylesheet" href="assets/css/templatemo.css">';  
    echo '<link rel="stylesheet" href="assets/css/custom.css">';  

    
    echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />';  // Mapové štýly (ak používaš Leaflet)

    
    switch ($page_name) {
        case "index":
            echo '<link rel="stylesheet" href="assets/css/slider.css">';  
            break;
        case "portfolio":
            echo '<link rel="stylesheet" href="assets/css/portfolio.css">';  
            break;
        case "qna":
            echo '<link rel="stylesheet" href="assets/css/accordion.css">';  
            break;
        case "kontakt":
            echo '<link rel="stylesheet" href="assets/css/form.css">'; 
            break;
        case "thankyou":
            
            break;
    }
}



?>