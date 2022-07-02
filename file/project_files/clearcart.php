<?php 

include "./login.dbh.php";
session_start();
$uid = $_SESSION["u_id"];
$st = "delete from cart where U_id = $uid";
$result = $conn->query($st);

header("location: cart-up.php");

?>