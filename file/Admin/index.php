<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seller Home </title>
<link src="https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-regular-webfont.woff"
 rel="stylesheet"   >
</link>

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
                <form class="">
                    <input type="search" class="form-control" placeholder="Search" style="height: 90%;" aria-label="Search">
                </form>
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
                    <a class="nav-link" href="http://localhost:3456/Admin/sellers.php">
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

                    <a class="nav-link" href="http://localhost:3456/Admin/products.php">
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">

        <br>
        <?php
        include './db.php';
        ?>
        <div class="row">
            <div class="col-md-3">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS total FROM Orders";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'];
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-chart-line fa-2x text-gray-300" style="color: green;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Successful Return
                                    Customers </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS total FROM UserDB";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Sellers
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS total FROM SellerDB";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Average Customer
                                    Rating</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT AVG(Ratings) AS total FROM SellerDB";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo round($row['total'], 2);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Signed Up Users
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT COUNT(*) AS total FROM UserDB";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'];
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total E-commerce
                                    revenue
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT SUM(Grand_total) AS total FROM Orders";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    // rupee sign
                                    echo "₹" . $row['total'];
                                    ?>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total In-person
                                    Revenue</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $sql = "SELECT SUM(Grand_total) AS total FROM Orders WHERE Method='In-Store'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    // rupee sign
                                    echo "₹" . $row['total'];
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Revenue
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php

                                    $sql = "SELECT SUM(Grand_total) AS total FROM Orders";
                                    $result = mysqli_query($conn, $sql);
                                    $s = mysqli_fetch_assoc($result);
                                    // rupee sign


                                    $sql = "SELECT SUM(Grand_total) AS total FROM Orders WHERE Method='In-Store'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    // rupee sign
                                    echo $s['total'] + $row['total'];

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>



        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Revenue Collected</h5>
                        <div class="chart-area">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Website Hits</h5>
                        <div class="chart-area">
                            <canvas id="lol"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Visitor Count by Categories</h5>
                        <div class="chart-area">
                            <canvas id="visitors"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Top Sellers</h5>
                        <div class="chart-area">
                            <canvas id="sellers"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../dashboard.js"></script>
    <script>
        (function() {
            'use strict'

            // Graphs
            var ctx = document.getElementById('myChart').getContext('2d');
            // eslint-disable-next-line no-unused-vars
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],

                    datasets: [{
                            label: 'Ecommerce',
                            data:[ <?php
                            // select data for specific dates

                            for ($i=1; $i <= 7 ; $i++) { 
                                # code...
                                $sql = "SELECT Order_Date,SUM(Grand_total) AS total FROM Orders WHERE Order_Date BETWEEN '1930-$i-01' AND '1930-$i-31' GROUP BY Order_Date";

                                $result = mysqli_query($conn, $sql);
                                echo mysqli_fetch_assoc($result);
                                if (mysqli_fetch_assoc($result)) {
                                    
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row['total'] . ",";
                                    print_r($row['total']);
                                }
                                
                            }
                            echo 0;

                                    ?>],
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1,
                            backgroundColor: 'rgb(75, 192, 192)',
                        },
                        {
                            label: 'In-Store Purchase',
                            data: [28, 48, 40, 19, 86, 27, 90],
                            fill: false,
                            borderColor: 'rgb(200, 0,0)',
                            tension: 0.1
                        }
                    ]
                },

                options: {

                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            });

        })
    </script>
</body>

</html>