<?php
include "./login.dbh.php"; 
if (isset($_GET["Prod_id"]) & isset($_GET["c_id"]) ){
    $Prod_id = $_GET["Prod_id"];
    $c_id = $_GET["c_id"];
    $sql = "DELETE FROM wishlist WHERE Prod_id = '$Prod_id' AND U_id = '$c_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>