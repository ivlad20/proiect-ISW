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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>My Online Store</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="products_display.php">MyOnlineStore</a>
        </div>
        <form method="POST" action="products_display.php">
            <div class="search-bar">
                <input type="text" placeholder="Cauta produse..." name="search">
            </div>
        </form>
        <nav>
            <a href="products_display.php">Acasa</a>
            
            <?php
                if(isset($user_data)) {
                    echo "<a href=''>";
                    echo $user_data['username'];
                    echo "</a>";
                    echo "<a href='logout.php'>Logout</a>";
                }
                else {
                    echo "<a href='login.php'>Login</a>";
                }
            ?>
            
            
            
            
        </nav>
    </header>

    <div class="banner">
        <?php
            if(isset($user_data)) {
                echo "<h1>Bine ai venit, " . $user_data['username'] . "!</h1>";
            }
            else {
                echo "<h1>Bine ai venit!</h1>";
            }
        ?>
        <p>Gaseste cele mai bune produse la cele mai bune preturi!</p>
    </div>

    <section class="categories">
        <form action="post">
            <div>
                <a href="products_display.php?cat=Cars" class="button"><h3>Masini</h3></a>
            </div>
        </form>
        <form action="post">
            <div>
                <a href="products_display.php?cat=Moto" class="button"><h3>Motociclete</h3></a>
            </div>
        </form>
        <form action="post">
            <div>
                <a href="products_display.php?cat=Appliance" class="button"><h3>Electrocasnice</h3></a>
            </div>
        </form>
        <form action="post">
            <div>
                <a href="products_display.php?cat=Smartphone" class="button"><h3>Telefoane</h3></a>
            </div>
        </form>
        <form action="post">
            <div>
                <a href="products_display.php" class="button"><h3>Toate</h3></a>
            </div>
        </form>

    </section>

</body>
</html>



