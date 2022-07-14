<?php 
include "./login.dbh.php";
$sql = "SELECT * FROM productdb";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);

$row = json_decode($row['specification'], true);
$row2 = json_decode($row2['specification'], true);
$column1 = array();
foreach ($row as $key => $value) {
	array_push($column1, $value[0]);
}

echo json_encode($column1);
$column2 = array();
foreach ($row2 as $key => $value) {
	array_push($column2, $value[0]);
}
foreach ($column1 as $key => $value) {
	if(in_array($value, $column2)){
		echo $value. ":" .$row2[$value]. "<br>";
	}
}
?>