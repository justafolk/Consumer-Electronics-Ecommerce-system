<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    <style>
        .receipt-content .logo a:hover {
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

        .receipt-content {
        background: #ECEEF4; 
        }
        @media (min-width: 1200px) {
        .receipt-content .container {width: 900px; } 
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
        margin-top: 20px; } 
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
        margin-top: 20px; } 
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
        font-size: 13px; } 
        }
        .receipt-content .invoice-wrapper .line-items .items .item .amount {
        letter-spacing: 0.1px;
        color: #84868A;
        font-size: 16px;
        }
        @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .line-items .items .item .amount {
        font-size: 13px; } 
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
        float: none; } 
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

        .receipt-content .footer {
        margin-top: 40px;
        margin-bottom: 110px;
        text-align: center;
        font-size: 12px;
        color: #969CAD; 
        }                    
    </style>
</head>
<body>        
    <?php
        $address = "C/o-209, S.S.Hole, Sant Tukaram Nagar, Bhosari, Pune-411039";
        $address1 = explode(",", $address);
        $count = count($address1);
        print_r($address1);

    ?>
    <div class="receipt-content" id="invoice">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-wrapper">
                        <div class="d-flex justify-content-between">
                            <div class="d-none d-lg-flex col-5">
                                <div class="logo ms-2 col-5" style="text-align: left;">
                                    <h6 class="mb-0">eCommerce Web.</h6>
                                    <h5 class="mb-0">Client Site</h5>
                                </div>
                            </div>
                            
                            <div class="intro col-4" style="text-align: right;">
                                <h5>Purchase Order</h5>
                                <p>Invoice No. #7483793</p>
                                <!-- <p class="text-right" style="text-align:right; margin-bottom:0px;">Hii, <strong>John McClane</strong>,</p> 
                                <p style="margin-top:0px; text-align:right;">This is the receipt for a payment of <strong>Rs. 10,000</strong> of your order</p> -->
                            </div>
                        </div>
                        <div class="payment-info" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Payment No.</span>
                                    <strong>434334343</strong>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment Date</span>
                                    <strong>Jul 09, 2014 - 12:20 pm</strong>
                                </div>
                            </div>
                        </div>

                        <div class="payment-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Client</span>
                                    <strong>
                                        Andres felipe posada
                                    </strong>
                                    <p>
                                        <?php 
                                            for($i=0;$i<$count;$i++){
                                                echo $address1[$i];
                                                ?><br>
                                                <?php
                                            }
                                            ?>
                                        <!-- 989 5th Avenue <br>
                                        City of monterrey <br>
                                        55839 <br>
                                        USA <br> -->
                                        <a href="#">
                                            jonnydeff@gmail.com
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Payment To</span>
                                    <strong>
                                        Juan fernando arias
                                    </strong>
                                    <p>
                                        344 9th Avenue <br>
                                        San Francisco <br>
                                        99383 <br>
                                        USA <br>
                                        <a href="#">
                                            juanfer@gmail.com
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="line-items">
                            <div class="headers clearfix">
                                <div class="d-flex">
                                    <div class="col-1">No</div>
                                    <div class="col-4">Description</div>
                                    <div class="col-2 text-center">Price</div>
                                    <div class="col-3 text-center">Quantity</div>
                                    <div class="col-3 text-left">Total Amount</div>
                                </div>
                            </div>
                            <div class="items">
                                <div class="d-flex mt-2">
                                    <div class="col-1">
                                        1
                                    </div>
                                    <div class="col-4 desc">
                                        Html theme
                                    </div>
                                    <div class="col-2 qty text-center">
                                        Rs. 189333
                                    </div>
                                    <div class="col-3 qty text-center">
                                        3
                                    </div>
                                    <div class="amount">
                                        Rs. 60.00
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <div class="col-1">
                                        2
                                    </div>
                                    <div class="col-4 desc">
                                        Bootstrap snippet
                                    </div>
                                    <div class="col-2 qty text-center">
                                        Rs. 189333
                                    </div>
                                    <div class="col-3 qty text-center">
                                        1
                                    </div>
                                    <div class="amount">
                                        Rs. 20.00
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <div class="col-1">
                                        3
                                    </div>
                                    <div class="col-4 desc">
                                        Snippets on bootdey 
                                    </div>
                                    <div class="col-2 qty text-center">
                                        Rs. 189333
                                    </div>
                                    <div class="col-3 qty text-center">
                                        2
                                    </div>
                                    <div class="amount text-center">
                                        Rs. 38718.00
                                    </div>
                                </div>
                            </div>
                            <div class="total d-flex ">
                                <p class="col-5">
                                    <strong>Thank You<br></strong>
                                    For Shopping with us.<br>
                                    Any Issue with order Contact Us:<br><br>
                                    <strong>Helpline No: </strong>7507738781<br>
                                    <strong>Email Service: </strong>mayur.194029@gmail.com<br>
                                    <strong>Store Helpline No: </strong>1234567890
                                </p>
                                <div class="col-3">

                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-between">
                                        <div class="col-3 text-center">
                                            Subtotal
                                        </div>
                                        <div class="field col-6 text-left" style="font-size: 100%; text-align: right;">
                                            Rs. 352342987
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-3 text-center">
                                            Shipping
                                        </div>
                                        <div class="field col-6 text-left" style="font-size: 100%; text-align: right;">
                                            Rs. 508372.00
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-3 text-center">
                                            Discount
                                        </div>
                                        <div class="field col-6 text-left" style="font-size: 100%; text-align: right;">
                                            4.5%2387
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-3 text-center h4 ">
                                            Total
                                        </div>
                                        <div class="col-7 field grand-total h4" style="margin-top:5px; text-align: right;">
                                            <span style="font-size: 110%;">Rs. 2889739.00</span>
                                        </div>
                                    </div>
                                    <!-- <div class="field">
                                        Shipping <span>$0.00</span>
                                    </div>
                                    <div class="field">
                                        Discount <span>4.5%</span>
                                    </div> -->
                                </div>
                            </div>

                            <div class="print">
                                <button type="submit" name="submit" class="btn btn-dark" onclick="generatePDF()">Print</button>
                            </div>
                        </div>
                    </div>

                    <div class="footer">
                        Copyright © 2022  eCommerce Web. Client Site
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