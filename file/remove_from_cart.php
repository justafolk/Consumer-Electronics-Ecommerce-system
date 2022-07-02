<?php 
include "./login.dbh.php";
$user_id = $_GET['user_id'];
$Prod_id = $_GET['Prod_id'];
$sql = "Delete from cart where U_id = '$user_id' and Prod_id = '$Prod_id'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: cart-up.php");
?>