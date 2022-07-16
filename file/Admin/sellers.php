<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <title>Seller Side</title>
    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/plugins/standard/multi-carousel.min.css">   
    <style>

    </style>
</head>

<body>
    <?php
    require_once "db.php";
    $row = "";
    $num_rows = 0;
    $seller1 = "";
    $sql = "SELECT * FROM seller";
    $smt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($smt, $sql)) {
        echo "Output not show";
        exit();
    }
    mysqli_stmt_execute($smt);
    $c = 0;
    $resultData = mysqli_stmt_get_result($smt);
    $num_rows = mysqli_num_rows($resultData);
    while ($row = mysqli_fetch_assoc($resultData)) {
        $seller[$c] = $row;
        $seller1 = $seller;
        $c++;
    }
    ?>
    <?php include 'header.php' ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
        <h1 class="h2">Manage Sellers </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                This week
            </button>
        </div>
    </div>
        <br>
        <!-- tab layout for add seller, seller lookup, inventory requests -->


        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Seller Lookup</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Verify Sellers</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">Inventory Requests</button>
                    </li>

              
                </ul>
                <?php
                require_once "db.php";
                $row1 = "";
                $num_rows1 = 0;
                $store = "";
                $sql = "SELECT * FROM store_request";
                $smt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($smt, $sql)) {
                    echo "Output not show";
                    exit();
                }
                mysqli_stmt_execute($smt);
                $c1 = 0;
                $resultData1 = mysqli_stmt_get_result($smt);
                $num_rows1 = mysqli_num_rows($resultData1);
                while ($row1 = mysqli_fetch_assoc($resultData1)) {
                    $store_request[$c1] = $row1;
                    $store = $store_request;
                    $c1++;
                }

                function accept($conn, $id)
                {
                    $row1 = "";
                    $sql = "SELECT * FROM store_request WHERE id=$id;";
                    $smt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($smt, $sql)) {
                        echo "Output not show";
                        exit();
                    }
                    mysqli_stmt_execute($smt);
                    $c = 0;
                    $resultData1 = mysqli_stmt_get_result($smt);
                    $num_rows1 = mysqli_num_rows($resultData1);
                    while ($row1 = mysqli_fetch_assoc($resultData1)) {
                        $sellers[$c] = $row1;
                        $seller = $sellers;
                        $c++;
                    }
                    $error = "";
                    $name = $seller[0]['Name'];
                    $email = $seller[0]['email'];
                    $phone_no = $seller[0]['phone_no'];
                    $username = $seller[0]['username'];
                    $password = $seller[0]['password'];
                    $address = $seller[0]['address'];
                    $store_name = $seller[0]['store_name'];
                    $store_address = $seller[0]['store_address'];
                    $location = $seller[0]['co_ordinates'];
                    $files = $seller[0]['files'];
                    $date = $seller[0]['date'];
                    $sql = "INSERT INTO seller(seller_name, seller_email, seller_phone, username, password, seller_address, store_name, store_address, store_location, seller_verification, files , date, rating) VALUES 
                                                ('$name','$email' '$phone_no','$username','$password','$address','$store_name','$store_address,'$location','Verified','$files','$date','0.0');";
                    if ($conn->query($sql) === TRUE) {
                        $error .= "<br>Accept Successfully";
                    } else {
                        $error .= "<br>Error creating table1: " . $conn->error;
                    }
                    return $error;
                }
                function remove($conn, $id)
                {
                    require_once "db.php";
                    $sql = "delete from store_request WHERE id = ?;";
                    $smt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($smt, $sql)) {
                        exit();
                    }
                    mysqli_stmt_execute($smt);
                    $resultData = mysqli_stmt_get_result($smt);
                    if ($row = mysqli_fetch_assoc($resultData)) {
                        return $row;
                    } else {
                        $result = false;
                        return $result;
                    }
                }
                if (isset($_POST["remove"])) {
                    $id = $_POST["id"];
                    $error = remove($conn, $id);
                }
                if (isset($_POST["accept"])) {
                    $id = $_POST["id"];
                    $error = accept($conn, $id);
                    echo $error;
                }

                ?>
                <div class="tab-content my-3" id="myTabContent">

                    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h5>Verification Requests</h5>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Req. ID</th>
                                    <th scope="col">Seller Name</th>
                                    <th scope="col">Email ID</th>
                                    <th scope="col">Store Address</th>
                                    <th scope="col">Store Name</th>
                                    <th scope="col">Request Date</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < $num_rows1; $i++) {
                                ?>
                                    <tr>
                                        <th scope="row">SID <?php echo $store[$i]['id'] ?> </th>
                                        <td><?php echo $store[$i]['Name']; ?></td>
                                        <td><?php echo $store[$i]['email'] ?></td>
                                        <td><?php echo $store[$i]['store_address'] ?></td>
                                        <td><?php echo $store[$i]['store_name'] ?></td>
                                        <td><?php echo $store[$i]['date'] ?></td>
                                        <td><button class="btn btn-primary btn-dark" id="store<?php echo $i; ?>">View</button></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    for ($i = 0; $i < $num_rows; $i++) {
                    ?>
                        <div class="tab-pane fade show" id="store_request<?php echo $i; ?>" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <button class="btn btn-secondary" onclick="back1()"><i class='bx bx-arrow-back'></i></button>
                                        <input type="text" class="form-control" placeholder="Search for ....">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button">Go!</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row my-3">
                                            <div class="col-md-5">

                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                $array = $store[$i]['Name'];
                                                $split = explode(" ", $array);
                                                ?>
                                                <img src="https://ui-avatars.com/api/name=<?php echo $split[0]; ?>+<?php echo $split[1]; ?>?rounded=true" alt="Avatar" class="img-fluid">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="table-responsive mx-3">
                                            <form action="" method="post">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Seller ID: </th>
                                                            <td>SID <?php echo $store[$i]['id']; ?></td>
                                                            <input type="hidden" name="id" value="<?php echo $store[$i]['id']; ?>">
                                                        </tr>
                                                        <tr>
                                                            <th>Seller Name: </th>
                                                            <td><?php echo $store[$i]['Name'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Seller Phone: </th>
                                                            <td><?php echo $store[$i]['phone_no'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Seller Username: </th>
                                                            <td><?php echo $store[$i]['username'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Seller Address: </th>
                                                            <td><?php echo $store[$i]['address'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Store Name: </th>
                                                            <td><?php echo $store[$i]['store_name'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Store Address: </th>
                                                            <td><?php echo $store[$i]['store_address'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Store Co-ordinates: </th>
                                                            <td><?php echo $store[$i]['co_ordinates'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th><button class="btn btn-primary" style="background-color:red;" type="submit" name="remove"><i class='bx bx-x bx-xs' style="margin-top:0px;"></i>Deny</button></th>
                                                            <td><button class="btn btn-primary" style="background-color:green;" type="submit" name="accept"><i class='bx bx-check bx-xs' style="margin-top:0px;"></i>Accept</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    
                            
                                    <div class="col-md-6" style="justify-content: center; align-items:center">
                                        <div class="row my-5">
                                            <div class="col-md-12">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color: black;">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="https://thumbs.dreamstime.com/b/electronics-store-inside-best-denki-singapore-featuring-vacuum-cleaners-floor-cleaning-robots-95676677.jpg" alt="First slide">
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
                    <?php
                    }
                    ?>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- search bar -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for ....">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Seller Id</th>
                                                <th scope="col">Seller Name</th>
                                                <th scope="col">Email ID</th>
                                                <th scope="col">City,State</th>
                                                <th scope="col">Orders</th>
                                                <th scope="col">Ratings</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < $num_rows; $i++) {
                                            ?>
                                                <tr>
                                                    <th scope="row">SID <?php echo $seller[$i]['seller_id'] ?> </th>
                                                    <td><?php echo $seller[$i]['seller_name'] ?></td>
                                                    <td><?php echo $seller[$i]['seller_email'] ?></td>
                                                    <td><?php echo $seller[$i]['seller_address'] ?></td>
                                                    <td><?php echo $seller[$i]['tot_cus_ser'] ?></td>
                                                    <td><?php echo $seller[$i]['rating'] ?></td>
                                                    <td><button class="btn btn-primary btn-dark" id="id<?php echo $i; ?>">View</button></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    for ($i = 0; $i < $num_rows; $i++) {
                    ?>
                        <div class="tab-pane fade show" id="profile<?php echo $i; ?>" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <button class="btn btn-secondary" onclick="back()"><i class='bx bx-arrow-back'></i></button>
                                        <input type="text" class="form-control" placeholder="Search for ....">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button">Go!</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row my-3">
                                            <div class="col-md-5">

                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                $array = $seller[$i]['seller_name'];
                                                $split = explode(" ", $array);
                                                ?>
                                                <img src="https://ui-avatars.com/api/name=<?php echo $split[0]; ?>+<?php echo $split[1]; ?>?rounded=true" alt="Avatar" class="img-fluid">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="table-responsive mx-3">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Seller ID: </th>
                                                        <td>SID <?php echo $seller[$i]['seller_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seller Name: </th>
                                                        <td><?php echo $seller[$i]['seller_name'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seller Address: </th>
                                                        <td><?php echo $seller[$i]['seller_address'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seller Phone: </th>
                                                        <td>+91 <?php echo $seller[$i]['seller_phone'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Store Name: </th>
                                                        <td><?php echo $seller[$i]['store_name'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Store Location: </th>
                                                        <td><?php echo $seller[$i]['store_location'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date: </th>
                                                        <td><?php echo $seller[$i]['date'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seller Verification Status: </th>
                                                        <td style="color: green;"><?php echo $seller[$i]['seller_verification'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Average Customer Rating: </th>
                                                        <td style="color: gold;"><?php echo $seller[$i]['rating'] ?> <i class="fa-solid fa-star"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total offline Revenue: </th>
                                                        <td>Rs. <?php echo $seller[$i]['tot_off_rev'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Online Revenue: </th>
                                                        <td>Rs. <?php echo $seller[$i]['tot_onli_rev'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Partnership Timeline: </th>
                                                        <td>2 years, 4 months</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Customers Served: </th>
                                                        <td><?php echo $seller[$i]['tot_cus_ser'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-md-6" style="justify-content: center; align-items:center">

                                        <div class="row my-5">
                                            <div class="col-md-12">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color: black;">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="https://thumbs.dreamstime.com/b/electronics-store-inside-best-denki-singapore-featuring-vacuum-cleaners-floor-cleaning-robots-95676677.jpg" alt="First slide">
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
                    <?php
                    }
                    ?>
                    <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
                        <!-- list inventory requests by sellers -->

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Request ID</th>
                                        <th scope="col">Seller Name</th>
                                        <th scope="col">Email ID</th>
                                        <th scope="col">City,State</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Request Date</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mar</td>
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
                    <div class="tab-pane fade" id="performanceop" role="tabpanel" aria-labelledby="performanceop-tab">
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

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../dashboard.js"></script>
    <script src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/mdb5/plugins/standard/multi-carousel.min.js"></script>
    <script>

    </script>
    <script>
        // var id1 = document.getElementById("id1");
        // var profile = document.getElementById("profile");
        // var profile1 = document.getElementById("profile1");
        // id1.onclick = function() {
        //     document.getElementById("profile1").style.display = "block";
        //     document.getElementById("profile").style.display = "none";
        // }
        // function back(){
        //     document.getElementById("profile1").style.display = "none";
        //     document.getElementById("profile").style.display = "block";
        // }
    </script>
    <script>
        var profile = document.getElementById("profile");
        var home = document.getElementById("home");
        var requestop = document.getElementById("requestop");
        var performanceop = document.getElementById("performanceop");

        <?php
        for ($i = 0; $i < $num_rows; $i++) {
        ?>
            var id<?php echo $i; ?> = document.getElementById("id<?php echo $i; ?>");
            var profile<?php echo $i; ?> = document.getElementById("profile<?php echo $i; ?>")
            id<?php echo $i; ?>.onclick = function() {
                // b1.classList.add('btn-dark');
                document.getElementById("profile<?php echo $i; ?>").style.display = "block";
                document.getElementById("profile").style.display = "none";
            }
        <?php
        }
        ?>


        <?php
        for ($i = 0; $i < $num_rows; $i++) {
        ?>
            var store<?php echo $i; ?> = document.getElementById("store<?php echo $i; ?>");
            var store_request<?php echo $i; ?> = document.getElementById("store_request<?php echo $i; ?>")
            store<?php echo $i; ?>.onclick = function() {
                // b1.classList.add('btn-dark');
                document.getElementById("store_request<?php echo $i; ?>").style.display = "block";
                document.getElementById("home").style.display = "none";
            }
        <?php
        }
        ?>

        function back() {
            <?php
            for ($i = 0; $i < $num_rows; $i++) {
            ?>
                document.getElementById("profile<?php echo $i; ?>").style.display = "none";
            <?php
            }
            ?>
            document.getElementById("profile").style.display = "block";
        }

        function back1() {
            <?php
            for ($i = 0; $i < $num_rows; $i++) {
            ?>
                document.getElementById("store_request<?php echo $i; ?>").style.display = "none";
            <?php
            }
            ?>
            document.getElementById("home").style.display = "block";
        }
    </script>
</body>

</html>