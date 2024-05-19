<?php
    session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM `posts` WHERE id='$id'";
        $post_data = mysqli_query($con, $query);
    }

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="app.js"></script>
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


    <div class="container">
        <?php

            while($row = $post_data->fetch_assoc()) {
                $id = $row['id'];
                echo "<div class='product-image'>";
                echo "<img src='Posts/" . $id . "/0.png' alt='da' onclick=\"openModal('Posts/" . $id . "/0.png')\">";
                echo "</div>";
                echo "<div class='product-info'>";
                echo "<h1>" . $row['title'] . "</h1>";
                echo "<p class='price'>". $row['price'] . "$</p>";
                echo "<p class='description'>" . $row['description'] . "</p>";
                echo "<div class='buy-now'>";
                echo "<button>Add to Cart</button>";
                echo "</div>";
                echo "</div>";

            }
        ?>

    </div>
    <br><br><br><br><br>

    <table class="image-table">
        
        <tr>
            <?php
                
                
                echo "<td><img src='Posts/" . $id . "/1.png' alt='da' id='img150' onclick=\"openModal('Posts/" . $id . "/1.png')\"></td>";
                echo "<td><img src='Posts/" . $id . "/2.png' alt='da' id='img150' onclick=\"openModal('Posts/" . $id . "/2.png')\"></td>";
                echo "<td><img src='Posts/" . $id . "/3.png' alt='da' id='img150' onclick=\"openModal('Posts/" . $id . "/3.png')\"></td>";
                

            ?>

        </tr>
    </table>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

</body>