<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seller Home </title>


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
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">

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
                    <a class="nav-link  " aria-current="page" href="index.html">
                        <span data-feather="home"></span> Home
                    </a>
                </li>
                <li class="nav-item">
                    <!-- Graphs of revenue collected and website hits -->
                    <a class="nav-link active" href="sellers.html">
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

                    <a class="nav-link" href="products.html">
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
                    <a class="nav-link" href="marketing.html">
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
                    <a class="nav-link" href="marketing.html">
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
                    <a class="nav-link" href="marketing.html">
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
                    <a class="nav-link" href="marketing.html">
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

                <li class="nav-item">
                    <a class="nav-link" href="predictions.html">
                        <span data-feather="bar-chart"></span> Predictive Analytics
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
        <!-- tab layout for add seller, seller lookup, inventory requests -->

        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Seller Lookup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Verify Sellers</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">Inventory Requests</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="performanceop-tab" data-bs-toggle="tab" data-bs-target="#performanceop" type="button" role="tab" aria-controls="performanceop" aria-selected="false">Performance
                    Reports</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                    <div class="card-body">


                        <h5>Verification Requests</h5>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Request ID</th>
                                    <th scope="col">Seller Name</th>
                                    <th scope="col">Email ID</th>
                                    <th scope="col">City,State</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Request Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- search bar -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search forhttps://cloudfour.com/examples/img-currentsrc/images/kitten-small.png">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">

                                </div>
                                <div class="col-md-4">
                                    <img src="https://ui-avatars.com/api/name=Avdhut+Kamble?rounded=true" alt="Avatar" class="img-fluid">
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive mx-3">

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Seller ID: </th>
                                            <td>SID194033</td>
                                        </tr>
                                        <tr>
                                            <th>Seller Name: </th>
                                            <td>Avdhut Akash Kamble</td>
                                        </tr>
                                        <tr>
                                            <th>Seller Address: </th>
                                            <td>H-18, Yerwada, Pune, 6</td>
                                        </tr>
                                        <tr>
                                            <th>Seller Phone: </th>
                                            <td>+91 8605677177</td>
                                        </tr>
                                        <tr>
                                            <th>Seller Zip Code: </th>
                                            <td>411006</td>
                                        </tr>
                                        <tr>
                                            <th>Seller Verification Status: </th>
                                            <td style="color: green;">Verified</td>
                                        </tr>
                                        <tr>
                                            <th>Average Customer Rating: </th>
                                            <td style="color: gold;">4.7 <i class="fa-solid fa-star"></i></td>
                                        </tr>
                                        <tr>
                                            <th>Total offline Revenue: </th>
                                            <td>Rs. 132,415,325</td>
                                        </tr>
                                        <tr>
                                            <th>Total offline Revenue: </th>
                                            <td>Rs. 132,415,325</td>
                                        </tr>
                                        <tr>
                                            <th>Total Online Revenue: </th>
                                            <td>Rs. 132,415,325</td>
                                        </tr>
                                        <tr>
                                            <th>Partnership Timeline: </th>
                                            <td>2 years, 4 months</td>
                                        </tr>
                                        <tr>
                                            <th>Total Customers Served: </th>
                                            <td>24135</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="col-md-6" style="justify-content: center; align-items:center">

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color: black;">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="https://cloudfour.com/examples/img-currentsrc/images/kitten-small.png" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="https://www.researchgate.net/profile/Charles-Overstreet/publication/221274472/figure/fig2/AS:451161766535169@1484576755709/Sample-source-code.png" alt="Second slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="https://cloudfour.com/examples/img-currentsrc/images/kitten-small.png" alt="Third slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
                <!-- list inventory requests by sellers -->
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Request ID</th>
                                        <th scope="col">Seller Name</th>
                                        <th scope="col">Email ID</th>
                                        <th scope="col">City,State</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="performanceop" role="tabpanel" aria-labelledby="performanceop-tab">
                <div class="card">
                    <div class="card-body">
                        <h4>Performance Reports</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Seller</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Pune, Maharashtra</option>
                                        <option>Vadodara, Gujarat</option>
                                        <option></option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="idk">Select Month</label>
                                    <br>
                                    <input type="date" class="date form-control" name="idk" id="idk">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="go"> </label>
                                    <br>
                                    <input type="button" class="btn btn-secondary" value="Generate">
                                </div>
                            </div>

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

    </script>
</body>

</html>