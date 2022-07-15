<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seller Home </title>
<link src="https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-regular-webfont.woff"
 rel="stylesheet"   >
</link>
<link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
  <!-- Google Fonts -->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />


  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>  
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .sidebartabs {}

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 10%;
            background-color: #24252a;
        }

        .logo {
            cursor: pointer;
            order: 3;
            margin-left: auto;
        }

        nav {
            order: 1;
        }

        .nav__links a,
        .cta,
        .overlay__content a {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            color: #edf0f1;
            text-decoration: none;
        }

        .nav__links {
            list-style: none;
            display: flex;
            font-size: 16px;
        }

        .nav__links li {
            padding: 0px 20px;
        }

        .nav__links li:nth-child(1) {
            padding: 0 20px 0 0;
        }

        .nav__links li a {
            transition: all 0.3s ease 0s;
        }

        .nav__links li a:hover {
            color: #0088a9;
        }

        .cta {
            order: 2;
            margin-left: 20px;
            padding: 9px 25px;
            background-color: rgba(0, 136, 169, 1);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease 0s;
        }

        .cta:hover {
            background-color: rgba(0, 136, 169, 0.8);
        }

        /* Mobile Nav */

        .menu {
            display: none;
        }

        .overlay {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            background-color: #24252a;
            overflow-x: hidden;
            transition: all 0.5s ease 0s;
        }

        .overlay--active {
            width: 100%;
        }

        .overlay__content {
            display: flex;
            height: 100%;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .overlay a {
            padding: 15px;
            font-size: 36px;
            display: block;
            transition: all 0.3s ease 0s;
        }

        .overlay a:hover,
        .overlay a:focus {
            color: #0088a9;
        }

        .overlay .close {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
            color: #edf0f1;
        }

        @media screen and (max-height: 450px) {
            .overlay a {
                font-size: 20px;
            }

            .overlay .close {
                font-size: 40px;
                top: 15px;
                right: 35px;
            }
        }

        @media only screen and (max-width: 800px) {

            .nav__links,
            .cta {
                display: none;
            }

            .menu {
                display: initial;
            }
        }
    </style>

    <link href="../dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg sticky-top bg-dark navbar-dark bg-dark" style="height:50px">
    <a class="navbar-brand" style="margin-left:5px;" href="#">Ecommerce Client Website</a>
   
    <div class="pos-f-t">
    <div class="collapse navbar-collapse" id="navbarColor01">
  
      <form class="form-inline">
          <div class="row">
              <div class="col-9">
                  <input class="form-control mr-sm-2" style="" type="search" placeholder="Search" aria-label="Search">
              </div>
          </div>
      </form>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>
    <!-- Navbar -->
   
    <!-- Navbar -->


    <div class="container-fluid">

    </div>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse" style="overflow-y:auto">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="index.php">
                        <span data-feather="home"></span> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sellers.php">
                        <span data-feather="users"></span> Manage Sellers
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Add / Verify Sellers
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Inventory Requests
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Seller Lookup
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Performance Reports
                        </div>
                    </a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="products.php">
                        <span data-feather="bar-chart"></span> Manage Products
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Add / Verify Products
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Review Product Sales
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Customer Reviews
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Traffic Sources
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="promotions.php">
                        <span data-feather="users"></span> Manage Promotions
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Add / Verify Promotions
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Update / Remove Promotions
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">

                            Response Analytics
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./payments.php">
                        <span data-feather="layers"></span> Manage Payments
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">
                            View Payments
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">
                            Manage Seller Payouts
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">
                            View Payout Requests
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./orders.php">
                        <span data-feather="layers"></span> Manage Orders
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">
                            View Orders
                        </div>
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">
                            Manage Order Requests
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./marketing.php">
                        <span data-feather="users"></span> Marketing
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">
                            Add Marketing Source
                        </div>
                        <div class="borderop">
                            Update / Remove Marketing Source
                        </div>
                        <div class="borderop">
                            View Marketing Results
                        </div>
                        <div class="borderop">

                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="analysis.php">
                        <span data-feather="users"></span> Analytics
                    </a>
                    <a class=" nav-link sub-links">
                        <div class="borderop">
                            Customer Analysis
                        </div>
                        <div class="borderop">
                            Seller Analysis
                        </div>
                        <div class="borderop">
                            Product Analysis
                        </div>
                        <div class="borderop">
                            Marketing Analysis
                        </div>
                        <div class="borderop">
                            Revenue Analysis
                        </div>

                    </a>
                </li>


                <li class="nav-item ">
                    <a class="nav-link " href="statics.html">
                        <span data-feather="layers"></span> Edit Static Content
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <button type="button" class="btn btn-primary" style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; margin-top: 10px; width: 100%;">
                            Log out
                        </button>
                    </a>
                </li>
            </ul>



        </div>
    </nav>