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
            <a href="index.php">MyOnlineStore</a>
        </div>
        <form method="POST" action="products_display.php">
            <div class="search-bar">
                <input type="text" placeholder="Search for products" name="search">
            </div>
        </form>
        <nav>
            <a href="index.php">Home</a>
            
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
        <h1>Welcome to My Online Store</h1>
        <p>Find the best products at unbeatable prices!</p>
    </div>

    <section class="categories">
        <form action="post">
            <div>
                <a href="products_display.php?cat=Cars" class="button"><h3>Cars</h3></a>
            </div>
        </form>
        <form action="post">
            <div>
                <a href="products_display.php?cat=Moto" class="button"><h3>Moto</h3></a>
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



