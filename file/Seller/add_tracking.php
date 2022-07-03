<?php 
include "../login.dbh.php";
$order_id = $_GET["order_id"];
$tracking = $_GET["tracking"];
$ship_date = date("Y/m/d");
$sql = "update OrderDB set order_status = 'shipped', Tracking_id='$tracking', ship_date='$ship_date' where invoice = '$order_id'";
$result = mysqli_query($conn, $sql);
header("Location: orders.php");

?>