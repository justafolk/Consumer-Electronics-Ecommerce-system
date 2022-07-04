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
	<div include-html="header.php" id="header_file"></div> 
	<?php
	session_start();
	$user_id = "";
	if (isset($_SESSION['u_id'])) {
		$user_id = $_SESSION["u_id"];
	}
	require_once "login.dbh.php";
	if(isset($_POST['submit'])){
		$prod = $_POST['prod_id'];
		$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBname);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "DELETE FROM cart WHERE U_id=$user_id AND Prod_id=$prod";

		if ($conn->query($sql) === TRUE) {
		//echo "Record deleted successfully";
		}	
		else {
		//echo "Error deleting record: " . $conn->error;
		}
		
		// $result = cart($conn, $user_id, $prod);
		// echo $result;
	}
	$Total_Price = 0;
	if(isset($_POST['clear'])){
		$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBname);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "DELETE FROM cart;";

		if ($conn->query($sql) === TRUE) {
		//echo "Record deleted successfully";
		}	
		else {
		//echo "Error deleting record: " . $conn->error;
		}
	}
	?>
		<!--end top header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Shop Cart</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop cart-->
				<section class="py-4">
					<div class="container">
						<div class="shop-cart">
							<div class="row">
								<div class="col-12 col-xl-8">
									<div class="shop-cart-list mb-3 p-3">
										<?php
											require_once "function.php";
											$productdb = array();
											$Prod = "";
											$row = "";
											$sql = "SELECT Prod_id FROM cart WHERE U_id = $user_id";
											$smt = mysqli_stmt_init($conn);
											if(!mysqli_stmt_prepare($smt, $sql)){
												echo "Output not show";
												exit();
											}
											$i = 0;
											mysqli_stmt_execute($smt);
											$resultData = mysqli_stmt_get_result($smt);
											$num_rows = mysqli_num_rows($resultData);
											while($row = mysqli_fetch_assoc($resultData)) {
												$productdb[$i]= $row;
												$Prod = $productdb;
													$i++;
											}
											$product = array();
											for($j=0;$j<$num_rows;$j++){
												$id = $Prod[$j]['Prod_id'];
												$sql = "SELECT * FROM productdb WHERE Prod_id = $id";
												$smt = mysqli_stmt_init($conn);
												if(!mysqli_stmt_prepare($smt, $sql)){
													echo "Output not show";
													exit();
												}
												mysqli_stmt_execute($smt);
												$resultData = mysqli_stmt_get_result($smt);
												$num_rows1 = mysqli_num_rows($resultData);
												while($row = mysqli_fetch_assoc($resultData)) {
													$product[$j] = $row;
												}
											}
											if($product == NULL){
												?>
												<h3>Cart is Empty</h3>
												<?php
											}
											else{
												for($j=0;$j<$num_rows;$j++){
										?>
										<form action="" method="post">
											<div class="row align-items-center g-3">
												<div class="col-12 col-lg-6">
													<div class="d-lg-flex align-items-center gap-2">
														<div class="cart-img text-center text-lg-start">
															<?php
																$temp = $product[$j]['image_loc'];
																$img = explode('&',$temp);
															?>
															<img src="<?php echo $img[0]; ?>" width="130" alt="">
															<!-- <img src="assets/images/products/07.png" width="130" alt=""> -->
														</div>
														<div class="cart-detail text-center text-lg-start">
															<h6 class="mb-2"><?php echo $product[$j]['title']; ?></h6>
															<p class="mb-2">Color: <span>White & Blue</span>
															</p>
															<h5 class="mb-0"><?php echo "Rs. ",$product[$j]['price']; ?></h5>
														</div>
													</div>
												</div>
												<div class="col-12 col-lg-3">
													<div class="cart-action text-center">
														<input type="number" class="form-control rounded-0" value="2" min="1">
													</div>
												</div>
												<input type="hidden" name="prod_id" value="<?php echo $product[$j]['Prod_id']; ?>">
												<?php $Total_Price += $product[$j]['price']; ?>
												<div class="col-12 col-lg-3">
													<div class="text-center">
														<div class="d-flex gap-2 justify-content-center justify-content-lg-end"> 
															<button name="submit" type="submit" href="javascript:;" class="btn btn-dark rounded-0 btn-ecomm"><i class='bx bx-x-circle'></i> Remove</button>
															<a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-heart me-0'></i></a>
														</div>
													</div>
												</div>
											</div>
											<div class="my-4 border-top"></div>
										</form>
										<?php
												}
											?>
										<form action="" method="post">
											<div class="d-lg-flex align-items-center gap-2">	
												<a href="index.php" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
												<button href="javascript:;" name="clear" type="submit" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</button>
												<a href="javascript:;" class="btn btn-white btn-ecomm"><i class='bx bx-refresh'></i> Update Cart</a>
											</div>
										</form>
									</div>
								</div>
								<div class="col-12 col-xl-4">
									<div class="checkout-form p-3 bg-light">
										<div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Apply Discount Code</p>
												<div class="input-group">
													<input type="text" class="form-control rounded-0" placeholder="Enter discount code">
													<button class="btn btn-dark btn-ecomm" type="button">Apply Discount</button>
												</div>
											</div>
										</div>
										<div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Estimate Shipping and Tax</p>
												<div class="my-3 border-top"></div>
												<div class="mb-3">
													<label class="form-label">Country Name</label>
													<select class="form-select rounded-0">
														<option selected>India</option>
														<option value="1">Australia</option>
														<option value="2">Canada</option>
														<option value="3">China</option>
													</select>
												</div>
												<div class="mb-3">
													<label class="form-label">State/Province</label>
													<select class="form-select rounded-0">
														<option selected>Select State</option>
														<option value="1">Maharashtra</option>
														<option value="2">Delhi</option>
													</select>
												</div>
												<div class="mb-0">
													<label class="form-label">Zip/Postal Code</label>
													<input type="email" class="form-control rounded-0">
												</div>
											</div>
										</div>
										<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
											<div class="card-body">
												<p class="mb-2">Subtotal: <span class="float-end"><?php echo "Rs. ",$Total_Price; ?></span>
												</p>
												<p class="mb-2">Shipping: <span class="float-end">--</span>
												</p>
												<p class="mb-2">Taxes: <span class="float-end">Rs. 1003</span>
												<?php $tax = 1003; ?>
												</p>
												<p class="mb-0">Discount: <span class="float-end">--</span>
												</p>
												<div class="my-3 border-top"></div>
												<h5 class="mb-0">Order Total: <span class="float-end"><?php echo "Rs. ",$Total = $Total_Price - $tax; ?></span></h5>
												<div class="my-4"></div>
												<div class="d-grid"><a href="checkout-details.php" class="btn btn-dark btn-ecomm">Proceed to Checkout</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
											}
								?>
							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end shop cart-->
			</div>
		</div>
		<!--end page wrapper -->
		<!--start footer section-->
		<div include-html="footer.html" id="footer_file"></div>
		<!--end footer section-->
		<!--start quick view product-->
		<!-- Modal -->
		<div class="modal fade" id="QuickViewProduct">
			<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
				<div class="modal-content rounded-0 border-0">
					<div class="modal-body">
						<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
						<div class="row g-0">
							<div class="col-12 col-lg-6">
								<div class="image-zoom-section">
									<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
										<div class="item">
											<img src="assets/images/product-gallery2/1.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/2.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/3.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/4.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/5.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/6.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/7.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/8.png" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="assets/images/product-gallery2/9.png" class="img-fluid" alt="">
										</div>
									</div>
									<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/1.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/2.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/3.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/4.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/5.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/6.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/7.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/8.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/9.png" class="" alt="">
										</button>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="product-info-section p-3">
									<h3 class="mt-3 mt-lg-0 mb-0">SAMSUNG Galaxy F22 (Denim Blue, 64 GB)  (4 GB RAM)</h3>
									<div class="product-rating d-flex align-items-center mt-2">
										<div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-light-4"></i>
										</div>
										<div class="ms-1">
											<p class="mb-0">(24 Ratings)</p>
										</div>
									</div>
									<div class="d-flex align-items-center mt-3 gap-2">
										<h5 class="mb-0 text-decoration-line-through text-light-3"></h5>
										<h4 class="mb-0">Rs. 11,999</h4>
									</div>
									<div class="mt-3">
										<h6>Discription :</h6>
										<p class="mb-0">Bid goodbye to screen stuttering, poor display quality, and low-resolution photos by getting your hands on the Samsung Galaxy F22 smartphone. Featuring a 90 Hz refresh rate, HD+ sAMOLED display, and True 48 MP quad-rear camera, this smartphone is sure to be your ideal companion for entertainment, gaming, and communication. What's more, its 6000 mAh battery ensures that a full charge can last for an entire day.</p>
									</div>
									<dl class="row mt-3">	<dt class="col-sm-3">Product id</dt>
										<dd class="col-sm-9">#BHU5879</dd>	<dt class="col-sm-3">Delivery</dt>
										<dd class="col-sm-9">Russia, USA, and Europe</dd>
									</dl>
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
										<div class="col">
											<label class="form-label">RAM</label>
											<select class="form-select form-select-sm">
												<option>4 GB</option>
												<option>6 GB</option>
											</select>
										</div>
										<div class="col">
											<label class="form-label">Storage</label>
											<select class="form-select form-select-sm">
												<option>64 GB</option>
												<option>128 GB</option>
											</select>
										</div>
									</div>
									<!--end row-->
									<div class="d-flex gap-2 mt-3">
										<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
									</div>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
		<!--end quick view product-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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