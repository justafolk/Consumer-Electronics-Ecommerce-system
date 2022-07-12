<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="../assets/plugins/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet" /> -->
	<!-- <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" /> -->
	<link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<!-- <script src="../assets/js/pace.min.js"></script> -->
	<!-- Bootstrap CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="../assets/css/app.css" rel="stylesheet">
	<link href="../assets/css/icons.css" rel="stylesheet">
</head>
<body>
<?php
    require_once "db.php";
    $id = $_GET['id'];
    $row = "";
    $sql = "SELECT * FROM productdb WHERE Prod_id=$id;";
    $smt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($smt, $sql)) {
        echo "Output not show";
        exit();
    }
    $i = 0;
    mysqli_stmt_execute($smt);
    $resultData = mysqli_stmt_get_result($smt);
    $num_rows = mysqli_num_rows($resultData);
    if ($row = mysqli_fetch_assoc($resultData)) {
        $product = $row;
    } else {
        $product = "Record not Found";
    }
    print_r($product);
?>
<section class="py-4">
    <div class="container">
        <div class="product-detail-card">
            <div class="product-detail-body">
                <div class="row g-0">
                    <div class="col-12 col-lg-5">
                        <div class="image-zoom-section">
                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                <?php
                                $temp = $product['image_loc'];
                                $img = explode('&', $temp);
                                $count = count($img);
                                for ($i = 0; $i < $count - 1; $i++) {
                                ?>

                                    <div class="item">
                                        <div class="zoom">
                                            <img class="zoom" id="box" src="<?php echo "../".$img[$i]; ?>" xoriginal="<?php echo "../".$img[$i]; ?>" />
                                        </div>
                                    </div>


                                <?php
                                }
                                ?>
                                <?php
                                for ($i = 0; $i < $count - 1; $i++) {
                                ?>
                                    <button class="owl-thumb-item">
                                        <img src="<?php echo "../".$img[$i]; ?>" class="" alt="">
                                    </button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="product-info-section p-3">
                            <h3 class="mt-3 mt-lg-0 mb-0"><?php echo $product['title']; ?></h3>
                            <div class="product-rating d-flex align-items-center mt-2">
                                <div class="rates cursor-pointer font-13"> <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-light-4"></i>
                                </div>
                                <div class="ms-1">
                                    <p class="mb-0">(24 Ratings)</p>
                                </div>
                            </div>
                            <p style="color:grey ; margin-bottom:2px">MRP: <del> Rs. <?php echo $product["mrp_price"]; ?> </del></p>
                            <h4 class="" style="color: green;">Rs. <?php echo $product['price']; ?>/-</h4>
                            <div class="mt-3">
                                <h6>Description :</h6>
                                <p class="mb-0"><?php echo $product['description']; ?></p>
                            </div>

                            <div class="row row-cols-auto align-items-center mt-3">
                                <div class="col">
                                    <label class="form-label">Quantity</label>
                                    <select class="form-select form-select-sm">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <!--end row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <button onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $product["Prod_id"] ?> '" class="btn btn-dark btn-ecomm" style="width: 100%"> <i class="bx bxs-cart-add"></i>Add to Cart</button>

                                </div>
                                <div class="col-md-6">

                                    <a href="javascript:;" style="width: 100%" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
                                </div>

                            </div>
                            <hr>
                            <div class="product-sharing" style="color: black!important;">
                                <ul class="list-inline" style="color: black!important;">
                                    <li class="list-inline-item"> <a href="javascript:;"><i style="color: black!important;" class='bx bxl-facebook '></i></a>
                                    </li>
                                    <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-linkedin bx-black'></i></a>
                                    </li>
                                    <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-twitter'></i></a>
                                    </li>
                                    <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-instagram'></i></a>
                                    </li>
                                    <li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-google'></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</section>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.min.js">
    </script>
    <!--plugins-->
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
    <script src="../assets/js/include-html.min.js"></script>
    <script src="../assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--app JS-->
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/product-details.js"></script>
</body>
</html>