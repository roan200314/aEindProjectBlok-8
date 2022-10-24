<?php
require "database.php";
session_start();

if (!empty($_SESSION['userData'])) {
    if ($_SESSION["userData"]["role"] == "medewerker" || "gebruiker") {
        $id = $_SESSION["user_id"];
        $sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
        if ($result = mysqli_query($mysqli, $sql)) {
            $user = mysqli_fetch_assoc($result);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>De Roset</title>
</head>

<body>
    <div class="bg"></div>
    <div class="grid-container">
        <div class="logo">
            <img src="images/logo.webp" id="logo-foto" width="40px" height="50px" alt="">
            <h1 class="topname">De</h1>
            <h1 class="topname2">Roset</h1>
        </div>
        <div class="navbar">
            <a href="index.php">Over ons</a>
            <a href="bestellen.php">Bestellen</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contact</a>
            <a href="winkelmandje.php">Winkelmandje</a>
            <a href="account.php">Account</a>
        </div>
        <div class="popu-smaak">populaire smaken
            <div class="container-fotos">
                <div class="positie">
                    <img src="images/aardbei.jfif" alt="" class="images" style="width:68px">
                </div>
                <div class="positie">
                    <img src="images/chocola.jfif" alt="" class="images" style="width:68px">
                </div>
                <div class="positie">
                    <img src="images/greenTea.jfif" alt="" class="images" style="width:68px">
                </div>
            </div>

        </div>
        <div class="info">
            <h1>Account</h1>
            <thead>

                <?php
                if (!empty($_SESSION['userData'])) {
                    if ($_SESSION["userData"]["role"] == "medewerker" || "gebruiker") {  ?>
            </thead>
            <tbody>
                <tr>
                    First name: <?php echo $user["firstname"] ?><br>
                    last name: <?php echo $user["lastname"] ?><br>
                    email: <?php echo $user["email"] ?><br>
                    password: <td><?php echo $user["password"] ?><br>
                        birthdate: <?php echo $user["date_of_birth"] ?><br>
                        phonenumber:
                    <td><?php echo $user["phonenumber"] ?><br>
                        address:
                    <td><?php echo $user["address"] ?><br>
                        zipcode:
                    <td><?php echo $user["zipcode"] ?><br>
                        city:
                    <td><?php echo $user["city"] ?><br>
                        <br>
                        <a href="delete.php?id=<?php echo $user["id"] ?>" class="btn btn-danger">Delete</a>
                    </td>
                    <a href="logout.php">Logout</a></td>
                    <a href="bewerk-gebruiker.php?id=<?php echo $user["id"] ?>" class="btn btn-warning">Update</a></td>
                </tr>
            </tbody>

    <?php }
                } else {
                    echo "U bent nog niet ingelogt, registreer of log in om wat te zien."; ?>
                    <li><a href="registreren.php">Registreren</a></li>
                    <li><a href="inloggen.php">Inloggen</a></li>
               <?php }  ?>


</body>

</html>
</div>
<div class="smaak-dag">smaak van de dag
    <div class="container-foto">
        <img src="images/smaak-dag.jpg" alt="" class="image" style="width:100px">
        <div class="overlay">
            <a href="#" class="icon" title="">
                Pistache ijsje extra lekker!
            </a>
        </div>
    </div>
    <button id="">Bestel</button>
</div>
<div class="bezorg">bezorgen</div>
</div>
</body>
<footer>
    <li><a href="registreren.php">Registreren</a></li>
    <li><a href="inloggen.php">Inloggen</a></li>
</footer>

</html>