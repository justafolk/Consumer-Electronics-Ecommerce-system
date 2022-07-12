<?php
$seller="";
$sql = "INSERT INTO seller
(seller_name, 
seller_email, 
seller_phone, 
username, 
password, 
seller_address, 
store_name, 
store_address, 
store_location, 
seller_verification, 
files , 
date, 
rating) 
VALUES(
"$seller['Name']",
'$seller['email']',
'$seller['phone_no']',
'$seller['username']',
'$seller['password']',
'$seller['address']',
'$seller['store_name']',
'$seller['store_address']',
'$seller['co_ordinates']',
'Verified','$seller['files']',
'$seller['date']',
'0.0');";

?>
