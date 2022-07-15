<?php 
session_start();
if (!isset($_SESSION["u_id"])){
    header("Location: authentication-signin.php");
}

?>