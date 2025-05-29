<?php
require_once 'partials/header.php';
?>

<!-- Custom styles for thank you page -->
<style>
    body {
        min-height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .thank-you-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 200px);
        padding: 20px;
    }
    .thankyou-container {
        text-align: center;
        background: #ffffff;
        padding: 20px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    h1 {
        color: #28a745;
    }
    p {
        margin: 10px 0 20px;
        color: #333;
    }
    .thankyou-container a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff !important;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
    }
    .thankyou-container a:hover {
        background-color: #218838;
    }
</style>

<div class="thank-you-wrapper">
    <div class="thankyou-container">
        <h1>Ďakujeme za váš odkaz!</h1>
        <p>Vaša správa bola úspešne odoslaná.</p>
        <a href="index.php">Späť na hlavnú stránku</a>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>


