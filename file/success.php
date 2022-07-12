<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/nouislider/nouislider.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>EcommerceWeb</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['search'];
        header("location: search.php?id=$name");
    }
    session_start();
    $firstname = "";
    $lastname = "";
    $email = "";
    $user_id = "";
    if (isset($_SESSION['uemail']) && isset($_SESSION['ufirstname']) && isset($_SESSION['ulastname']) && isset($_SESSION['u_id'])) {
        $firstname = $_SESSION["ufirstname"];
        $lastname = $_SESSION["ulastname"];
        $email = $_SESSION["uemail"];
        $user_id = $_SESSION["u_id"];
    }

    if (isset($_POST["udf1"])) {
        $ss = $_POST["udf1"];
        $sql = "select * from coupons where coupon_text = '$ss'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $coupon_id = $row['coupon_id'];
        $percent = $row['discount'];
    } 
    ?>


    <?php

    ?>
    <!--end top header wrapper-->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->

            <!--end breadcrumb-->
            <!--start shop cart-->
            <section class="py-4">
                <div class="container">
                    <div class="shop-cart">
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="checkout-details">
                                            <div class="card bg-transparent rounded-0 shadow-none">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
                                                        </div>
                                                        <div class="logo d-none d-lg-flex">
                                                            <a href="index.php">
                                                                <div class="ms-2">
                                                                    <h6 class="mb-0">eCommerce Web.</h6>
                                                                    <h5 class="mb-0">Client Site</h5>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="steps steps-light">
                                                        <a class="step-item active" href="shop-cart.html">
                                                            <div class="step-progress"><span class="step-count">1</span>
                                                            </div>
                                                            <div class="step-label"><i class='bx bx-cart'></i>Cart</div>
                                                        </a>
                                                        <a class="step-item active " href="checkout-details.html">
                                                            <div class="step-progress"><span class="step-count">2</span>
                                                            </div>
                                                            <div class="step-label active"><i class='bx bx-user-circle'></i>Details</div>
                                                        </a>
                                                        <a class="step-item active " href="checkout-review.html">
                                                            <div class="step-progress"><span class="step-count">3</span>
                                                            </div>
                                                            <div class="step-label"><i class='bx bx-credit-card '></i>Payment Method</div>
                                                        </a>
                                                        <a class="step-item active current" href="checkout-payment.html">
                                                            <div class="step-progress"><span class="step-count">4</span>
                                                            </div>
                                                            
                                                            <div class="step-label"><i class='bx bx-check-circle'></i>Place Order</div>
                                                        </a>
                                                        <a class="step-item active" href="checkout-payment.html">
                                                            <div class="step-progress"><span class="step-count">5</span>
                                                            </div>
                                                            <div class="step-label"><i class='bx bx-credit-card'></i>Complete Payment</div>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>


                                </div>


                            </div>

                        </div>
                    </div>
                    <!--end row-->
                    <!-- Start op -->
                    <div class="card-rounded border shadow-none">
                        <div class="card-body">
                            <div class="container">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h2>Thank you for your order!!!</h2>
                                        <h5>Your Order has been awaiting Confirmation.</h5>

                                    </div>
                                    <div class="col-md-6" style="text-align:right">
                                        <h5>Invoice ID: <?php echo $_POST["txnid"] ?></h5>
                                        <h6>Date : <?php echo $_POST["addedon"] ?></h6>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="">Billing Address:</h5>
                                        
                                        <?php 
                                        include "./login.dbh.php";
                                        $ad = $_POST["address1"];
                                            $sql = "SELECT address$ad FROM user WHERE id = '$user_id'";
                                        $s = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($s);
                                        $address1 = $row["address$ad"];
                                        $jsonData = rtrim($address1, "\0");
                                        $address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
                                        ?>
                                        <h4 class=""><?php  echo str_replace("_", " ", $address_f["fname"] . " " . $address_f["lname"]) ?></h4>
                                        <?php
                                        echo $address_f["address1"] . "<br>";
                                        echo $address_f["address2"];
                                        echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
                                        echo $address_f["state"] . "<br>";
                                        echo $address_f["phoneno"] . "<br>";
                                        $json_string = stripslashes(html_entity_decode($address1));
                                        echo json_decode($json_string, true);
                                        $pay = array();

                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>
                                            Payment Details:
                                        </h5>
                                        <table class="table-borderless" style="width:100% ;">
                                            <tbody>
                                                <tr>
                                                    <th>Payment Method</th>
                                                    <td><?php echo $_POST["mode"]; $pay["mode"] = $_POST["mode"];  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Paid Amount</th>
                                                    <td>Rs. <?php echo $_POST["amount"]; $pay = $_POST["amount"]; ?>   /-</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Status</th>
                                                    <td style="color:green"><?php echo $_POST["status"]; $pay = $_POST["status"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Order Status</th>
                                                    <td>Confirmed</td>
                                                </tr>
                                                <tr>
                                                    <th>Method ID:</th>
                                                    <td><?php echo $_POST["field1"]; $pay = $_POST["field1"]; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3" >
                                        <h5>Total Savings :</h5>
                                        <h4 style="color: green;">₹ 
                                        <?php 
                                            include './login.dbh.php';
                                            $sql = "SELECT * FROM coupons where coupon_text='".$_POST["udf1"]."'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);
                                            $percent = $row["discount"];
                                            echo $_POST["amount"]+($_POST["amount"]*$percent); 
                                        
                                        ?> /-</h4>
                                        <h5>Total Amount :</h5>
                                        <h4>₹ <?php echo $_POST["amount"]  ?>/-</h4>

                                    </div>
                                </div>
                                    <br>
                                    <hr>
                                    <div class="card-body">
                                        <h5>Order Summary</h5>
                                        <?php
                                        include 'login.dbh.php';
                                        session_start();
                                        $user_id = $_SESSION['u_id'];
                                        $sql = "SELECT * FROM cart WHERE U_id = '$user_id'";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        $total = 0;
                                        if ($resultCheck > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $product_id = $row['Prod_id'];
                                                $sql2 = "SELECT * FROM productdb WHERE Prod_id = '$product_id'";
                                                $result2 = mysqli_query($conn, $sql2);
                                                $row2 = mysqli_fetch_assoc($result2);
                                                $product_name = $row2['title'];
                                        ?>
                                                <div class="my-3 border-top"></div>
                                                <div class="d-flex align-items-center">
                                                    <a class="d-block flex-shrink-0" href="javascript:;">
                                                        <img src="
															<?php echo explode('&', $row2["image_loc"])[0]; ?>" width="75" alt="Product">
                                                    </a>
                                                    <div class="ps-2">
                                                        <h6 class="mb-1"><a href="javascript:;" class="text-dark">
                                                                <?php echo $row2['title']; ?>
                                                            </a></h6>
                                                        <div class="widget-product-meta"><span class="me-2">Rs.
                                                                <?php echo $row2['price']; ?>
                                                                <small>.00</small></span><span class="">
                                                                x <?php echo $row['quantity']; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $total += $row2["price"] * $row["quantity"] ?>
                                        <?php }
                                        } ?>

                                    </div>
                                </div>

                                <?php 
                                    include './login.dbh.php';
                                    $sql = "insert into transactions (method, amount, transac_date, status, method_id, c_id, promo) values ('".$_POST['mode']."', '".$_POST['amount']."', '".$_POST["addedon"]."', '".$_POST["status"]."', '".$_POST["field1"]."', '".$_SESSION["u_id"]."', '".$_POST["udf1"]."')";
                                    $result = mysqli_query($conn, $sql);

                                ?>

                                <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                    <div class="card-body">
                                        <p class="mb-2">Subtotal: <span class="float-end">Rs. <?php echo $total;  ?></span>
                                        </p>
                                        <p class="mb-2">Shipping: <span class="float-end" style="color: green">Free!</span>
                                        </p>
                                        <p class="mb-2">Taxes (2.5% CGST + 2.5% SGST): <span class="float-end">Rs. <?php echo $total * (5 / 100);  ?></span>
                                        </p>
                                        <p class="mb-0">Discount: <span class="float-end" style="color:green">Rs <?php echo $total * ($percent / 100) ?></span>
                                        </p>
                                        <div class="my-3 border-top"></div>
                                        <h5 class="mb-0">Order Total: <span class="float-end">Rs.
                                                <?php echo $total - $total * ($percent / 100) ?>
                                            </span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php  
                        include './login.dbh.php';
                        $date = $_POST["addedon"];
                        echo $user_id;
                        $st = "select * from cart where U_id = '$user_id' ";
                        $result = mysqli_query($conn, $st);
                        $products = "";
                        while ($row = mysqli_fetch_array($result)){
                            $products .= $row["Prod_id"]."x".$row["quantity"].";";
                        }
                        function distance($lat1, $lon1, $lat2, $lon2, $unit) {

                            $theta = $lon1 - $lon2;
                            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                            $dist = acos($dist);
                            $dist = rad2deg($dist);
                            $miles = $dist * 60 * 1.1515;
                            $unit = strtoupper($unit);
                          
                            if ($unit == "K") {
                                return ($miles * 1.609344);
                            } else if ($unit == "N") {
                                return ($miles * 0.8684);
                            } else {
                                return $miles;
                            }
                          }
                          $co_ordinate_user = "grep -i '". $address_f['zipcode']."' ./IN.txt";
                            $co_ordinate_users = shell_exec($co_ordinate_user);
                            $co_ordinate_user = explode("\t", explode("\n",`$co_ordinate_user`)[0]);
                            $lat = $co_ordinate_user[9];
                            $lon = $co_ordinate_user[10];
                        $sql = "select * from sellerDB where status='verified'";
                        $result = mysqli_query($conn, $sql);
                        $ogdistance = 100000000000000000;
                          while ($row = mysqli_fetch_assoc($result)){
                              $co_ords = explode(",", $row["co_ordinates"]);
                                $distance = distance($lat, $co_ords[0],$lon, $co_ords[1], $unit="K");
                                if ($distance < $ogdistance){
                                    $ogdistance = $distance;
                                    $ogsellerid = $row["id"];
                                    echo $distance."<br>";

                                    $ogsellermail = $row["email"];
                                    echo $ogsellermail;

                                }
                          }
                        


                        $sql = "insert into OrderDB ( invoice, amount, c_id, Prod_id, s_id, s_mail,Order_date, Order_status, address) values('".$_POST["txnid"]."','".$_POST["amount"]."','".$user_id."','".$products."','".$ogsellerid."','".$ogsellermail."','".$_POST["addedon"]."','Placed', '".$_POST["address1"]."')";
                        $result = mysqli_query($conn, $sql);
                        echo mysqli_error($conn);
                       
                        $sql = "delete from cart where U_id = '$user_id'";
                        $result = mysqli_query($conn, $sql);

                    ?>


                </div>
            </section>
            <!--end shop cart-->
        </div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/include-html.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
    <script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>