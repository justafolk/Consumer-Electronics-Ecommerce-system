<?php
    $servername = "localhost";
    $dBUsername = "justafolk";
    $dBPassword = "794613";
    $dBname = "ecommerce";
    $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBname);
    if(!$conn)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    ?>
