<?php
require "database.php";
session_start();
$sql = "SELECT * FROM users ";
$sql2 = "SELECT * FROM products WHERE IS_FLAVOR_OF_WEEK = '1' LIMIT 1";

if ($result = mysqli_query($mysqli, $sql)) {
    $user = mysqli_fetch_assoc($result);
}
if ($result2 = mysqli_query($mysqli, $sql2)) {
    $pics = mysqli_fetch_assoc($result2);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a333f4247d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/main.js" async></script>
    <title>De Roset</title>
</head>
<header class="text">
    <div class="topnav">
        <a href="winkelmandje.php">Winkelmandje</a>
        <a href="account.php">Account</a>
        <a href="registreren.php">Registreren</a>
        <a href="inloggen.php">Inloggen</a>
        <?php
        if (!empty($_SESSION['userData'])) {
            if ($_SESSION["userData"]["role"] == "medewerker") {
        ?>
                <a href="bestellingen.php">bestellingen</a>
        <?php
            }
        } ?>
    </div>
</header>

<body>
    <div class="bg"></div>
    <div class="grid-container">
        <div class="logo">
            <img src="images/logo.webp" id="logo-foto" width="20px" height="50px" alt="">
            <h1 class="topname">De </h1>
            <h1 class="topname2"> Roset</h1>
        </div>
        <div class="navbar">
            <a href="index.php">Over ons</a>
            <a href="bestellen.php">Bestellen</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contact</a>
            <?php
            if (!empty($_SESSION['userData'])) {
                if ($_SESSION["userData"]["role"] == "medewerker") {
            ?>
                    <a href="producten.php">Producten overzicht </a> <?php
                                                                    }
                                                                } ?>
            <a href="winkelmandje.php"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <div class="popu-smaak">
            <h3>Populaire smaken<h3>
                    <div class="container-fotos">
                        <img src="images/aardbei.png">
                        <div></div>
                        <img src="images/hazelnoot.png">
                        <div></div>
                        <img src="images/cookie.png">
                    </div>

        </div>
        <div class="smaak-dag">Smaak van de dag
            <div class="container-foto">
                <img src="images/svdd.png" alt="" class="image" style="width:100px">
                <div class="overlay">
                    <a href="#" class="icon" title="">
                        <?php echo $pics["descrip"] ?>
                    </a>
                </div>
            </div>
            <button id="svdd-bestel" onclick="zetIn('<?php echo $pics['name'] ?>', '<?php echo $pics['price_per_kg'] ?>', '<?php echo $pics['id'] ?>')">Bestel</button>
        </div>
        <div class="main">
            <h1 id="kop-tekst">Contact</h1>
            <div class="textContact">
                Altijd op zoek naar nieuw talent
                Dynamisch ondernemen betekent dynamisch in de arbeidsmarkt staan. De Roset is daarom regelmatig op zoek naar nieuw talent. Naar vakmensen met liefde voor patisserie, chocolaterie en ambachtelijk ijs naar commerciële mensen die van een uitdaging houden of naar servicegerichte mensen met oog voor de klant.
            </div>
            <div class="fotoContact">

            </div>
        </div>
        <div class="bezorg">
            <h3>bezorgen</h3>
            Wij bezorgen in: Castricum, Akersloot en Uitgeest.
        </div>
    </div>
</body>
<footer>

</footer>

</html>