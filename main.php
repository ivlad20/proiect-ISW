<?php
session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OGX</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/cascadia-code" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="main.html" class="navbutton">
                    <img class="icon" src="acasa.png" alt="Home">  Acasa
                </a>
            </li>
            <li>
                <a href="login.php" class="navbutton">
                    <img class="icon" src="cont.png" alt="cont">  Contul tau
                </a>
            </li>
            <li>
                <a href="contact.html" class="navbutton">
                    <img class="icon" src="contact.png" alt="contact">  Contact
                </a>
            </li>
            <li>
                <a href="info.html" class="navbutton">
                    <img class="icon" src="despre.png" alt="despre">  Despre
                </a>
            </li>
            <li id="anunt">Adauga un anunt</li>
        </ul>
    </nav>

    <div class="search_div">
        <form>
            <input type="text" placeholder= "Cauta..." class="search_input">
        </form>
        <button type="submit" class="search_button">Cautare!</button>
    </div>

    <div class="categorii_div">
        <h1>Categorii de produse</h1>
    </div>
</body>
</html>