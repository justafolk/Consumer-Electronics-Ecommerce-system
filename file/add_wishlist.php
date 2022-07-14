<?php
include "./login.dbh.php"; 
if (isset($_GET["Prod_id"]) & isset($_GET["c_id"]) ){
    $Prod_id = $_GET["Prod_id"];
    $c_id = $_GET["c_id"];
    $sql = "INSERT INTO wishlist (Prod_id, U_id) VALUES ('$Prod_id', '$c_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>