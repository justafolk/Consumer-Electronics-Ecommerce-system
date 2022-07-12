<?php
include 'db.php';
if ($_POST["submit"]) {
    $name = $_POST['productname'];
    $description = $_POST['productdesc'];
    $specs = $_POST['productspecs'];
    $price = $_POST['productprice'];
    $category = $_POST['productcategory'];
    $image1s = "";
    
    try{
        for ($i=1; $i <= 6 ; $i++) { 
            # code...
            $image1 = $_FILES["image$i"]['name'];
            $tmp1 = $_FILES["image$i"]['tmp_name'];
            $target1 = "images/".basename($image1);
            move_uploaded_file($tmp1, $target1);
            echo $i."DOne";
            $image1s .= $image1.",";
        }
        $sql = "INSERT INTO ProductDB ( image_loc, title, Description, Specs, price) VALUES ('$image1s', '$name', '$description', '$category', '$price')";
        $result = mysqli_query($conn, $sql);
    }
    catch(Exception $e){
        echo $e;
    }
    if ($result) {
        echo "Success";
    }
    else{
        echo "Error";
    }

    # code...
}

?>