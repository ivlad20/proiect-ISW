<?php
    session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        //something was posted
        $username = $_POST['username'];
        $password = $_POST['password'];

        if((!empty($username) && !empty($password)) && !is_numeric($username)) {

            //read from database
            
            $query = "SELECT * FROM signup WHERE username = '$username' LIMIT 1";

            $result = mysqli_query($con, $query);

            
            if($result) {

                if($result && mysqli_num_rows($result) > 0) {
                
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password) {

                        $id = $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: products_display.php");
                        die;
                    }
                }
            }
            echo "wrong username or password";
        }
            
        else {
            echo "wrong username or password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Login page</title>
</head>
<body>
    <div id="signup">
        <h1>Login form</h1><br><br>
        <form name="signup" method="POST">
            <div class="container-signup">

            <div>
            <label for="username">Nume </label>
            <input type="text" id="username" name="username"><br><br>
            </div>

            <div>
            <label for="password">Parola </label>
            <input type="password" name="password" id="password"><br><br>
            </div>

            <div style="display: flex">
                <input id="button" type="submit" value="Login">
                <button id="button">
                    <a href="signup.php">Sign up</a>
                </button>
            </div>
            </div>
        </form>
        
    </div>
</body>
</html>