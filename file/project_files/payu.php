<body>
    <form action='https://test.payu.in/_payment' method='post'>
        <input type="hidden" name="key" value="gtKFFx" />
        <input type="hidden" name="productinfo" value="Consumer Electronics" />
        <input type="hidden" name="surl" value="http://localhost:3456/success.php" />
        <input type="hidden" name="furl" value="http://localhost:3456/printpost.php" />
        <input type="hidden" name="phone" value="9988776655" />

        <?php
        include 'login.dbh.php';
        session_start();
        $user_id = $_SESSION['u_id'];
        $sql = "SELECT * FROM cart WHERE U_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        $total = 0;
        $promo = $_GET['promo'];
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['Prod_id'];
                $sql2 = "SELECT * FROM productdb WHERE Prod_id = '$product_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $product_name = $row2['title'];
                $total += $row2['price'];
            }
        }
        $sql = "select * from coupons where coupon_text='$promo'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            if ($row = mysqli_fetch_assoc($result)) {
                $discount = $row['discount'];
                $total = $total - ($total * $discount / 100);
            }
        }
       
        echo "Redirecting to Payment Gateway....";
        $order_id = str_rot13($_SESSION["ufirstname"]). rand(100, 999) . rand(100, 999) . rand(100, 999);
        ?>
        <input type="hidden" name="txnid" value="<?php echo $order_id ?>" />
        <input type="hidden" name="firstname" value="<?php echo $_SESSION["ufirstname"]."_".$_SESSION["ulastname"] ?>" />   

        <input type="hidden" name="amount" value="<?php echo $total ?>" />
        <input type="hidden" name="email" value="<?php echo $_SESSION["uemail"] ?>" />
        <input type="hidden" name="address1" value="<?php echo $_GET["address"] ?>" />
        <input type="hidden" name="udf1" value="<?php echo $_GET["promo"] ?>" />
        

        <?php
        $hash = '';
        $hash = "gtKFFx|$order_id|$total|Consumer Electronics|".$_SESSION["ufirstname"]."_".$_SESSION["ulastname"]."|".$_SESSION["uemail"]."|".$_GET["promo"]."||||||||||wia56q6O";
        $hashValue = hash("sha512", $hash);
        echo "<input type='hidden' name='hash' value='" . $hashValue . "' />";
        ?>
        <input type="hidden" value="submit">
    </form>
</body>
<script>
        document.forms[0].submit();
</script>

</html>