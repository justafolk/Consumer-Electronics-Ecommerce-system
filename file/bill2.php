<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }

        /* .receipt-content .logo a:hover {
            text-decoration: none;
            color: #7793C4;
        }

        .receipt-content .invoice-wrapper {
            background: #FFF;
            border: 1px solid #CDD3E2;
            box-shadow: 0px 0px 1px #CCC;
            padding: 40px 40px 60px;
            margin-top: 40px;
            border-radius: 4px;
        }

        .receipt-content .invoice-wrapper .payment-details span {
            color: #A9B0BB;
            display: block;
        }

        .receipt-content .invoice-wrapper .payment-details a {
            display: inline-block;
            margin-top: 5px;
        }

        .receipt-content .invoice-wrapper .line-items .print a {
            display: inline-block;
            border: 1px solid #9CB5D6;
            padding: 13px 13px;
            border-radius: 5px;
            color: #708DC0;
            font-size: 13px;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -ms-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .receipt-content .invoice-wrapper .line-items .print a:hover {
            text-decoration: none;
            border-color: #333;
            color: #333;
        }

        .receipt-content .logo {
            text-align: center;
            margin-top: 0px;
        }

        .receipt-content .logo a {
            font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
            font-size: 36px;
            letter-spacing: .1px;
            color: #555;
            font-weight: 300;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -ms-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .receipt-content .invoice-wrapper .intro {
            line-height: 25px;
            color: #444;
        }

        .receipt-content .invoice-wrapper .payment-info {
            margin-top: 25px;
            padding-top: 15px;
        }

        .receipt-content .invoice-wrapper .payment-info span {
            color: #A9B0BB;
        }

        .receipt-content .invoice-wrapper .payment-info strong {
            display: block;
            color: #444;
            margin-top: 3px;
        }

        .receipt-content .invoice-wrapper .payment-info .text-right {
            text-align: right;
            margin-top: 0px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .payment-info .text-right {
                text-align: right;
                margin-top: 20px;
            }
        }

        .receipt-content .invoice-wrapper .payment-details {
            border-top: 2px solid #EBECEE;
            margin-top: 30px;
            padding-top: 20px;
            line-height: 22px;
        }

        .receipt-content .invoice-wrapper .payment-details .text-right {
            text-align: right;
            margin-top: 0px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .payment-details .text-right {
                text-align: right;
                margin-top: 20px;
            }
        }

        .receipt-content .invoice-wrapper .line-items {
            margin-top: 40px;
        }

        .receipt-content .invoice-wrapper .line-items .headers {
            color: #A9B0BB;
            font-size: 13px;
            letter-spacing: .3px;
            border-bottom: 2px solid #EBECEE;
            padding-bottom: 4px;
        }

        .receipt-content .invoice-wrapper .line-items .items {
            margin-top: 8px;
            border-bottom: 2px solid #EBECEE;
            padding-bottom: 8px;
        }

        .receipt-content .invoice-wrapper .line-items .items .item {
            padding: 10px 0;
            color: #696969;
            font-size: 15px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .line-items .items .item {
                font-size: 13px;
            }
        }

        .receipt-content .invoice-wrapper .line-items .items .item .amount {
            letter-spacing: 0.1px;
            color: #84868A;
            font-size: 16px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .line-items .items .item .amount {
                font-size: 13px;
            }
        }

        .receipt-content .invoice-wrapper .line-items .total {
            margin-top: 30px;
        }

        .receipt-content .invoice-wrapper .line-items .total .extra-notes {
            float: left;
            width: 40%;
            text-align: left;
            font-size: 13px;
            color: #7A7A7A;
            line-height: 20px;
        }

        @media (max-width: 767px) {
            .receipt-content .invoice-wrapper .line-items .total .extra-notes {
                width: 100%;
                margin-bottom: 30px;
                float: none;
            }
        }

        .receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
            display: block;
            margin-bottom: 5px;
            color: #454545;
        }

        .receipt-content .invoice-wrapper .line-items .total .field {
            margin-bottom: 7px;
            font-size: 14px;
            color: #555;
        }

        .receipt-content .invoice-wrapper .line-items .total .field.grand-total {
            margin-top: 10px;
            font-size: 16px;
            font-weight: 500;
        }

        .receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
            color: #20A720;
            font-size: 16px;
        }

        .receipt-content .invoice-wrapper .line-items .total .field span {
            display: inline-block;
            margin-left: 20px;
            min-width: 85px;
            color: #84868A;
            font-size: 15px;
        }

        .receipt-content .invoice-wrapper .line-items .print {
            margin-top: 50px;
            text-align: center;
        }



        .receipt-content .invoice-wrapper .line-items .print a i {
            margin-right: 3px;
            font-size: 14px;
        }

       */
        .receipt-content .footer {
            margin-top: 40px;
            margin-bottom: 110px;
            text-align: center;
            font-size: 12px;
            color: #969CAD;
        }

        .card-body {
            padding: 0px 0px !important;
        }
    </style>
</head>

<body>
    <?php


    ?>
    <div class="receipt-content" id="invoice">
        <div class=" bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-wrapper border-bottom">
                        <div class="row">
                            <?php
                            include "login.dbh.php";
                            $order_id = $_GET['order_id'];
                            $sql = "select * from OrderDB where invoice='$order_id'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_error($conn)) {
                                echo mysqli_error($conn);
                            }
                            $row = mysqli_fetch_assoc($result);
                            $prods = explode(";", $row["Prod_id"]);
                            $total = 0;
                            ?>
                            <div class="col-3">
                                <h6 class="mb-0">eCommerce Web.</h6>
                                <h5 class="mb-0">Client Site</h5>
                            </div>
                            <div class="col-9" style="align-items: right; text-align:right">
                                <h5>Invoice No. #<?php echo $_GET["order_id"] ?></h5>
                                <p>Date : <?php echo $row["Order_date"] ?></p>

                            </div>
                        </div>


                        <div class="intro col-4" style="text-align: right;">
                            <!-- <p class="text-right" style="text-align:right; margin-bottom:0px;">Hii, <strong>John McClane</strong>,</p> 
                                <p style="margin-top:0px; text-align:right;">This is the receipt for a payment of <strong>Rs. 10,000</strong> of your order</p> -->
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-6">
                            <div class="card" style="width:100%; height:100%;">
                                <div class="card-body">

                                    <h5 class="">Billing Address:</h5>

                                    <?php
                                    $ad = $row["address"];
                                    $user_id = $row["c_id"];
                                    $sql = "SELECT address$ad FROM user WHERE id = '$user_id'";
                                    $s = mysqli_query($conn, $sql);
                                    $row2 = mysqli_fetch_array($s);
                                    $address1 = $row2["address$ad"];
                                    $jsonData = rtrim($address1, "\0");
                                    $address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
                                    ?>
                                    <h5 class=""><?php echo str_replace("_", " ", $address_f["fname"] . " " . $address_f["lname"]) ?></h5>
                                    <?php
                                    echo $address_f["address1"] . "<br>";
                                    echo $address_f["address2"];
                                    echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
                                    echo $address_f["state"] . "<br>";
                                    echo $address_f["phoneno"] . "<br>";
                                    $json_string = stripslashes(html_entity_decode($address1));
                                    echo json_decode($json_string, true);

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card" style="width:100%; height:100%;">
                                <div class="card-body">
                                    <h5>
                                        Payment Details:
                                    </h5>
                                    <table class="table-borderless" style="width:100% ;">
                                        <tbody>
                                            <tr>
                                                <th>Payment Method</th>
                                                <td><?php
                                                    $sq = "select * from transactions where order_id='$order_id'";
                                                    $res = mysqli_query($conn, $sq);
                                                    $ro = mysqli_fetch_assoc($res);
                                                    echo $ro["method"];
                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <th>Paid Amount</th>
                                                <td>Rs. <?php echo $row["amount"] ?> </td>
                                            </tr>
                                            <tr>
                                                <th>Payment Status</th>
                                                <td style="color:green">Success</td>
                                            </tr>
                                            <tr>
                                                <th>Order Status</th>
                                                <td>Confirmed</td>
                                            </tr>
                                            <tr>
                                                <th>Method ID:</th>
                                                <td><?php echo $ro["method_id"] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="table-responsive">

                                        <table class="table ">
                                            <thead>
                                                <th>#</th>
                                                <th>Product Details</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th colspan=2>Totals</th>
                                            </thead>
                                            <tbody>
                                                <?php

                                                for ($i = 0; $i < count($prods) - 1; $i++) {
                                                    $sql = "select * from productdb where Prod_id='" . explode("x", $prods[$i])[0] . "'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_error($conn)) {
                                                        echo mysqli_error($conn);
                                                    }
                                                    $row2s = mysqli_fetch_assoc($result);

                                                    # code...

                                                ?>
                                                    <tr>
                                                        <td><?php echo $i + 1 ?></td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <img src="../<?php echo explode("&", $row2s["image_loc"])[0]  ?>" style="width:60px ;" alt="">

                                                                </div>
                                                                <div class="col-9">
                                                                    <?php echo $row2s["title"] ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php echo explode("x", $prods[$i])[1]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row2s["price"] ?>
                                                        </td>
                                                        <th>
                                                            <?php echo $row2s["price"] * explode("x", $prods[$i])[1];
                                                            $total += $row2s["price"] * explode("x", $prods[$i])[1]; ?>
                                                        </th>
                                                    </tr>
                                                <?php } ?>

                                                <thead>
                                                    <tr>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td><strong>
                                                                Subtotal :
                                                            </strong> </td>
                                                        <th>Rs <?php echo number_format($total); ?> </th>

                                                    </tr>
                                                    <tr>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td>
                                                            <strong>

                                                                Discount <?php ?> :
                                                            </strong>
                                                        </td>
                                                        <th> 6700 </th>

                                                    </tr>
                                                    <tr>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td style="border-bottom: 0px;"></td>
                                                        <td style="border-bottom: 0px;"> </td>
                                                        <td>
                                                            <strong>

                                                                Grand Total
                                                            </strong>
                                                        </td>
                                                        <th>Rs. <?php echo number_format($row["amount"]) ?> </th>

                                                    </tr>
                                                </thead>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="footer">
                    <strong>Thank You<br></strong>
                    For Shopping with us.<br>
                    Any Issue with order Contact Us:<br><br>
                    <strong>Helpline No: </strong>7507738781<br>
                    <strong>Email Service: </strong>mayur.194029@gmail.com<br>
                    <strong>Store Helpline No: </strong>1234567890
                    Copyright © 2022 eCommerce Web. Client Site
                    <div class="print">
                        <br>x
                        <button type="submit" name="submit" class="btn btn-dark" id="printPageButton" onClick="window.print();">Print</button>
                    </div>
                    <br>
                    <img src="http://bwipjs-api.metafloor.com/?bcid=code128&text=<?php echo $_GET["order_id"] ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function generatePDF() {
            const element = document.getElementById('invoice');
            html2pdf()
                .from(element)
                .save();
        }
    </script>
</body>

</html>