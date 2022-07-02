<?php
$creds = $_POST["credential"];
$gscrf = $_POST["g_csrf_token"];

$ar =  json_decode(`python3 ./googleouth.py $creds $gscrf`, true);
$name = $ar["name"];
$email = $ar["email"];
$photo = $ar["picture"];

header("location: http://localhost:3456/login_firebase.php?name=$name&email=$email&photo=$photo");

?>
