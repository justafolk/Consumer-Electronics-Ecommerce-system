<?php
    // connection to database 
$conn = mysqli_connect('localhost', 'justafolk', '794613', 'ecommerce2');
    // check connection
    if(mysqli_connect_errno()){
        echo 'Database connection failed with following errors: '. mysqli_connect_error();
    }

?>
