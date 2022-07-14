<?php 

include './db.php';
$sql = "DELETE FROM productdb WHERE Prod_id = '{$_GET["Prod_id"]}'";
$results = mysqli_query($conn, $sql);
if ($results) {
    
    echo "Product deleted successfully";
    header("Location: ./products.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>