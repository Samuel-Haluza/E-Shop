
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name'] ?? '');
} else {
    header("Location: index.php"); // presmerovanie, ak nie je POST To znamená, 
                                    // že ak niekto skúsi otvoriť stránku thankyou.php priamo do 
                                    // prehliadača bez odoslania formulára, nebude mu to dovolené a vráti sa späť na hlavnú stránku.
    exit();
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ďakujeme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color:rgb(5, 139, 36);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color:rgb(0, 179, 3);
        }
    </style>
</head>
<body>
    <h1>Ďakujem za vyplnenie, <?php echo $name; ?>!</h1>
    <a href="index.php" class="button">Späť na hlavnú stránku</a>
</body>
</html>
