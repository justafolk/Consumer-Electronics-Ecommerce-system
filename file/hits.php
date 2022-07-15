<?php
include "./login.dbh.php";
if (isset($_GET["trck"])) {
    $sql = "insert into marketing_hits(id, Prod_id, hitdate) values({$_GET["trck"]}, {$_GET["id"]}, now())";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo mysqli_error($conn);
    }
}

$sql = "update productdb set hits = hits + 1 where Prod_id = {$_GET["id"]}";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo mysqli_error($conn);
}
?>