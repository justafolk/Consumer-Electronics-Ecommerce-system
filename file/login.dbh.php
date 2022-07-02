<?php
    $servername = "localhost";
    $dBUsername = "justafolk";
    $dBPassword = "794613";
    $dBname = "ecommerce";
    $conn = new mysqli($servername, $dBUsername, $dBPassword, $dBname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

    $conn=mysqli_connect($servername, $dBUsername, $dBPassword, $dBname);
   
    ?>
