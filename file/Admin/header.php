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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top bg-dark navbar-dark " style="height: 3.1rem">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" style="background-color: transparent;" href="#">E-commerce Client Website</a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                <!-- mdbootstrap cdn -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <!-- Icons -->


                <!-- Search -->
                    <input type="search" class="form-control" placeholder="Search" style="height: 90%;" aria-label="Search">
                <ul class="navbar-nav d-flex flex-row me-1">
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="#"><i class="fa-solid fa-bell"></i></a>
                    </li>

                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Profile</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">

                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
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
                    <a class="nav-link" href="http://localhost/shopingohtml-11/shopingohtml-10/main-files/Final-year-project-main/file/Admin/sellers.php">
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

                    <a class="nav-link" href="http://localhost/shopingohtml-10/shopingohtml-10/main-files/Final-year-project-main/file/Admin/products.php">
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
                    <a class="nav-link" href="./promotions.html">
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
                    <a class="nav-link" href="./payments.html">
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
                    <a class="nav-link" href="./orders.html">
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
                    <a class="nav-link" href="./marketing.html">
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
                    <a class="nav-link" href="marketing.html">
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