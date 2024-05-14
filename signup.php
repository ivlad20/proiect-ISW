<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        //something was posted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(((!empty($username) && !empty($password)) && !empty($email)) && !is_numeric($username)) {

            //save to database
            $user_id = random_num(20);
            $query = "insert into signup (user_id, email, username, password) values ('$user_id', '$email', '$username', '$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }
        else {
            echo "Please enter some valid information";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Sign up page</title>
</head>
<body>
    <div id="signup">
        <h1>Sign up form</h1><br><br>

        <form name="signup" method="POST">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email"><br><br>

            <label for="username">Nume de utilizator: </label>
            <input type="text" id="username" name="username"><br><br>

            <label for="password">Parola: </label>
            <input type="text" name="password" id="password"><br><br>

            <input id="button" type="submit" value="Sign up">

            <button id="button">
                <a href="login.php">Login</a>
            </button>
        </form>
    </div>
</body>
</html>