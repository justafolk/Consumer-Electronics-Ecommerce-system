<!DOCTYPE html>
<html>
<body>

<?php
    require_once "login.dbh.php";
    require_once "function.php";
    $id = 1;
    $row = "";
    $sql = "SELECT * FROM productdb WHERE Prod_id=$id;";
    $smt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($smt, $sql)){
        echo "Output not show";
        exit();
    }
    $i = 0;
    mysqli_stmt_execute($smt);
    $resultData = mysqli_stmt_get_result($smt);
    $num_rows = mysqli_num_rows($resultData);
    if($row = mysqli_fetch_assoc($resultData)) {
        $product= $row;
    }
    else
    {
        $product = "Record not Found";
    }
    $row1 = "";
    $reviews = "";
    $sql = "SELECT * FROM review WHERE Prod_id=$id;";
    $smt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($smt, $sql)){
        echo "Output not show";
        exit();
    }
    mysqli_stmt_execute($smt);
    $c=0;
    $resultData1 = mysqli_stmt_get_result($smt);
    $num_rows1 = mysqli_num_rows($resultData1);
    while($row1 = mysqli_fetch_assoc($resultData1)) {
        $review[$c]= $row1;
        $reviews = $review;
        $c++;
    }
    $point = 0;
    $sum = 0;
    $percentage = 0;
    $a=array( 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0);
    $c=array( 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0);
    for($i=0;$i<$num_rows1;$i++){
        if($reviews == "")
        {
            break;
        }
        else
        {
            $point += $reviews[$i]['ratings'];
            $b = $reviews[$i]['ratings'];
            $a[$b] += 1;
        }
    }
    print_r($a);
    foreach ($a as $x => $val){
        $val = $val / $num_rows1;
        $val = $val * 100;
        $c[$x] = $val;
    }
    // print_r($c);
    // foreach($a as $x => $val) {
    //     $val = $val * 10 * $x;
    //     $c[$x] = $val;
    //     }
    print_r($c[4]);
    $sum = $point / $num_rows1;
    if($sum == intval($sum)){
        $sum = $sum . ".0";
        $percentage = $sum * 10 * 2;
        }
    else{
        $percentage = $sum * 10 * 2;
    }
?>
<!-- $a=array( 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0);
$rating = array(4,4,4,4,4);
$count = count($rating);
for($i=0;$i<$count;$i++){
    $b = $rating[$i];
    $a[$b] += 1;
}
print_r($a);
?> -->

</body>
</html>