<?php 
include "./db.php";
$sql = "insert into marketing(name, type, url, secret) values('{$_POST["sourcename"]}', '{$_POST["sourcetype"]}', '{$_POST["sourceurl"]}', '{$_POST["sourceapi"]}')";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo mysqli_error($conn);
}
header("Location: ./marketing.php");


?>