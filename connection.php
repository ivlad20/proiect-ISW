<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "proiect_isw";

    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){

        die("failed to connect");
    }
?>