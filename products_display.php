<?php
    //session_start();
    include("connection.php");
    include("index.php");

    $user_data = check_login($con);
    
    if (!isset($_GET['cat'])) {
        $query = "SELECT * FROM `posts`";
        $posts = mysqli_query($con, $query);
    } else {
        $category = $_GET['cat'];
        $query = "SELECT * FROM `posts` WHERE category = '".$category."'";
        $posts = mysqli_query($con, $query);

    }
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $query = "SELECT * FROM posts WHERE brand LIKE '$search' OR model LIKE '$search'";
        $posts = mysqli_query($con, $query);
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="products_display.css">
    <title>My Online Store</title>
    
</head>
<body>
    <section class="product-list">
        <?php
         while($row = $posts->fetch_assoc()) {
            echo '<a href="post.php?id=' . $row["id"] . '"<div class="product">';
            echo '<img src="' . $row["link_poza"] . '"alt="Product 1" id="display_picture">';
            echo '<div class="product-details">';
            echo '<h3>' . $row["title"] . '</h3>';
            echo '<p>$' . $row["price"] . '</p>';
            echo '<p>' . $row["description"] . '</p>';
            echo '</div>';
            echo '</a></div>';
         }
        ?>
    </section>
</body>
</html>