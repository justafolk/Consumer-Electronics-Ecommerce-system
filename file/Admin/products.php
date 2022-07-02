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

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>

    <style>

    </style>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

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
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
                    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
                    crossorigin="anonymous" referrerpolicy="no-referrer" />

                <!-- mdbootstrap cdn -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                    crossorigin="anonymous"></script>
                <!-- Icons -->


                <!-- Search -->
                <form class="">
                    <input type="search" class="form-control" placeholder="Search" style="height: 90%;"
                        aria-label="Search">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">

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
                    <a class="nav-link " href="sellers.html">
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

                    <a class="nav-link active" href="marketing.html">
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
                    <a class="nav-link" href="promotions.html">
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
                        <button type="button" class="btn btn-primary"
                            style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; margin-top: 10px; width: 100%;">
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
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Add Products</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Update Products</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop"
                    type="button" role="tab" aria-controls="requestop" aria-selected="false">View Products</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="performanceop-tab" data-bs-toggle="tab" data-bs-target="#performanceop"
                    type="button" role="tab" aria-controls="performanceop" aria-selected="false">Public Reviews</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">


                                <h5>Add Products</h5>
                                <p>Add new products to your inventory</p>
                                <form action="addproduct.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="productname">Product Title</label>
                                        <input type="text" class="form-control" id="productname"
                                            aria-describedby="emailHelp" placeholder="Enter Product Name"
                                            name="productname">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="productdesc">Product Description</label>
                                        <textarea type="text" class="form-control" id="productdesc"
                                            aria-describedby="emailHelp" placeholder="Enter Product Description"
                                            name="productdesc">
                                        </textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="productspecs">Product Specifications</label>
                                        <textarea type="text" class="form-control" id="productspecs"
                                            aria-describedby="emailHelp" placeholder="Enter Product Specifications"
                                            name="productspecs">
                                        </textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="productprice">Product Price</label>
                                        <input type="text" class="form-control" id="productprice"
                                            aria-describedby="emailHelp" placeholder="Enter Product Price"
                                            name="productprice" value="(₹)">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="productcategory">Product Category</label>
                                        <input type="text" class="form-control" id="productcategory"
                                            aria-describedby="emailHelp" placeholder="Enter Product Category"
                                            name="productcategory">
                                    </div>
                                    <br>
                                    <script>

                                    </script>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <p>Upload Images</p>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*" class="image1"
                                                    onchange="loadFile1(event)">
                                                <br>

                                                <img id="output1"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*" class="image2"
                                                    onchange="loadFile2(event)">
                                                <br>

                                                <img id="output2"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*" class="image3"
                                                    onchange="loadFile3(event)">
                                                <br>

                                                <img id="output3" 
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file"      class="form-control" accept="image/*" class="image4" name="image4" id="image4"
                                                    onchange="loadFile4(event)">
                                                <br>

                                                <img id="output4"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*" class="image5" name="image5" id="image5"
                                                    onchange="loadFile5(event)">
                                                <br>

                                                <img id="output5"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*" class="image6" name="image6" id="image6"
                                                    onchange="loadFile6(event)">
                                                <br>

                                                <img id="output6"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>

                                </form>

                                <script>
                                    <?php 
                                    for ($i=1; $i <= 6  ; $i++) { 
                                        # code...
                                        echo "var loadFile$i = function (event) {
                                            var output = document.getElementById(\"output$i\");
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function () {
                                                URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };";
                                    }
                                    ?>
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- search bar -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Product ID or title">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">


                                <h5>Update Product Details</h5>
                                <p>Update Existing products in your inventory</p>
                                <form action="addproduct.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="productname">Product Title</label>
                                        <input type="text" class="form-control" id="productname"
                                            aria-describedby="emailHelp" placeholder="Enter Product Name"
                                            name="productname" value="Realme XT">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="productname">Product Description</label>
                                        <textarea type="text" class="form-control" id="productname"
                                            aria-describedby="emailHelp" placeholder="Enter Product Description"
                                            name="productdesc">
                                        </textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="productname">Product Price</label>
                                        <input type="text" class="form-control" id="productname"
                                            aria-describedby="emailHelp" placeholder="Enter Product Price"
                                            name="productprice" value="(₹)">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="productname">Product Category</label>
                                        <input type="text" class="form-control" id="productname"
                                            aria-describedby="emailHelp" placeholder="Enter Product Category"
                                            name="productcategory">
                                    </div>
                                    <br>
                                    <script>

                                    </script>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <p>Upload Images</p>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*"
                                                    onchange="loadFile(event)">
                                                <br>

                                                <img id="output"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*"
                                                    onchange="loadFile(event)">
                                                <br>

                                                <img id="output"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*"
                                                    onchange="loadFile(event)">
                                                <br>

                                                <img id="output"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*"
                                                    onchange="loadFile(event)">
                                                <br>

                                                <img id="output"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*"
                                                    onchange="loadFile(event)">
                                                <br>

                                                <img id="output"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body">
                                                asdmk
                                                <input type="file" class="form-control" accept="image/*"
                                                    onchange="loadFile(event, 'output2')">
                                                <br>
                                                asdjis


                                                <img id="output"
                                                    src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg"
                                                    class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <button type="submit" class="btn btn-primary">Submit</button>

                                </form>

                                <script>
                                    var loadFile = function (event) {
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function () {
                                            URL.revokeObjectURL(output.src) // free memory
                                        }
                                    };
                                </script>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Product ID or title">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Title</th>
                                                <th>Product Description</th>
                                                <th>Product Price</th>
                                                <th>Product Category</th>
                                                <th>Product Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Product 1</td>
                                                <td>Product 1 Description</td>
                                                <td>₹100</td>
                                                <td>Category 1</td>
                                                <td>Active</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">Edit</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Product 2</td>
                                                <td>Product 2 Description</td>
                                                <td>₹200</td>
                                                <td>Category 2</td>
                                                <td>Active</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">Edit</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Product 3</td>
                                                <td>Product 3 Description</td>
                                                <td>₹300</td>
                                                <td>Category 3</td>
                                                <td>Active</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">Edit</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="performanceop" role="tabpanel" aria-labelledby="performanceop-tab">
                <div class="card">
                    <div class="card-body">
                        <h4>Public Reviews</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Product ID or title">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button">Go!</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </main>


    <script src="../dashboard.js"></script>
    <script>

    </script>
</body>

</html>