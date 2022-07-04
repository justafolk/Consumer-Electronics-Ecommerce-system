<?php 
session_start();

session_destroy();
$_SESSION = array();

header("location: ../store_login.php");

?>
