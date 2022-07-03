    <?php 
include "../login.dbh.php";
$order_id = $_GET["order_id"];
$sql = "update OrderDB set order_status = 'confirmed' where invoice = '$order_id'";
$result = mysqli_query($conn, $sql);
header("Location: orders.php");

?>