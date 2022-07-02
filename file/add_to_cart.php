<?php 

include "./login.dbh.php";

session_start();

$uid = $_SESSION["u_id"]; 
$st = "select * from cart where U_id=\"".$uid."\" and Prod_id=\"".$_GET['prod_id']."\"";
$result = $conn->query($st);
$norows = $result->num_rows;
if ($norows > 0){
    $st = "update cart set quantity=quantity+1 where U_id=\"".$uid."\" and Prod_id=\"".$_GET['prod_id']."\"";
    $result = $conn->query($st);

}
else{

    $sql = "insert into cart(U_id, Prod_id, quantity) values(\"".$uid."\",\"".$_GET['prod_id']."\", 1)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
header("location: cart-up.php");

?>