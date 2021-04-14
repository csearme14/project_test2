<?php 
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "register_db";

    // เชื่อมต่อฐานข้อมูล
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }
    else
    {
        echo "connet database";
    }

?>

