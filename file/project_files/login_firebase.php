<?php

include "./login.dbh.php";
print_r($_GET);

$st = "select * from user where firebase_id = \"".$_GET['firebase_id']."\"";
$result = $conn->query($st);
$norows = $result->num_rows;
if ($norows > 0){
    $row = $result->fetch_assoc();
print_r($row);
$uid = $row['id'];
$fname = $row['firstname'];
$lname = $row['lastname'];


session_start();
$_SESSION["uemail"] = $_GET['email'];
$_SESSION["ufirstname"] = $fname;
$_SESSION["ulastname"] = $lname;
$_SESSION["u_id"] = $uid;
$_SESSION["uimg_url"] = $row["img_url"];


print_r($_SESSION);

header("location: index.php");
exit();
}
else{ 


$name = explode(" ",$_GET['name']);
$stat = "insert into user(firstname, lastname, email, firebase_id, img_url) values(\"".$name[0]."\",\"".$name[1]."\",\"".$_GET['email']."\",\"".$_GET['firebase_id']."\", \"".$_GET['photo']."\")";

// run the mysql statement
if ($conn->query($stat) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stat . "<br>" . $conn->error;
}

$st = "select * from user where firebase_id = \"".$_GET['firebase_id']."\"";
$result = $conn->query($st);
// fetch uid from result
$row = $result->fetch_assoc();
print_r($row);
$uid = $row['id'];

session_start();
$_SESSION["uemail"] = $_GET['email'];
$_SESSION["ufirstname"] = $name[0];
$_SESSION["ulastname"] = $name[1];
$_SESSION["u_id"] = $uid;
$_SESSION["uimg_url"] = $_GET['photo'];
print_r($_SESSION);

header("location: index.php");

}
