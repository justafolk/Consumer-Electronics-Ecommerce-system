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
	<title>Shopingo - eCommerce HTML Template</title>
</head>

<body>	
	<?php
		session_start();
		$user_id = "";
		if (isset($_SESSION['u_id'])) {
			$user_id = $_SESSION["u_id"];
		}
		require_once "login.dbh.php";
		$Total_Price = 0;
	?>
	<div include-html="header.php" id="header_file"></div> 
		<!--end top header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Checkout</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
									<div class="checkout-shipping">
										<div class="card bg-transparent rounded-0 shadow-none">
											<div class="card-body">
												<div class="steps steps-light">
													<a class="step-item active" href="shop-cart.html">
														<div class="step-progress"><span class="step-count">1</span>
														</div>
														<div class="step-label"><i class='bx bx-cart'></i>Cart</div>
													</a>
													<a class="step-item active" href="checkout-details.html">
														<div class="step-progress"><span class="step-count">2</span>
														</div>
														<div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
													</a>
													<a class="step-item active current" href="checkout-shipping.html">
														<div class="step-progress"><span class="step-count">3</span>
														</div>
														<div class="step-label"><i class='bx bx-cube'></i>Shipping</div>
													</a>
													<a class="step-item" href="checkout-payment.html">
														<div class="step-progress"><span class="step-count">4</span>
														</div>
														<div class="step-label"><i class='bx bx-credit-card'></i>Payment</div>
													</a>
													<a class="step-item" href="checkout-review.html">
														<div class="step-progress"><span class="step-count">5</span>
														</div>
														<div class="step-label"><i class='bx bx-check-circle'></i>Review</div>
													</a>
												</div>
											</div>
										</div>
										<div class="card rounded-0 shadow-none">
											<div class="card-body">
												<h2 class="h5 mb-0">Choose Shipping Method</h2>
												<div class="my-3 border-bottom"></div>
												<div class="table-responsive">
													<table class="table">
														<thead class="table-light">
															<tr>
																<th>Method</th>
																<th>Time</th>
																<th>Fee</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Flat Rate</td>
																<td>2 days</td>
																<td>Rs. 1000.00</td>
															</tr>
															<tr>
																<td>International shipping</td>
																<td>12 days</td>
																<td>Rs. 1200.00</td>
															</tr>
															<tr>
																<td>Same day delivery</td>
																<td>1 day</td>
																<td>Rs. 2200.00</td>
															</tr>
															<tr>
																<td>Expedited shipping</td>
																<td>--</td>
																<td>Rs. 1500.00</td>
															</tr>
															<tr>
																<td>Local Pickup</td>
																<td>--</td>
																<td>Rs. 00.00</td>
															</tr>
															<tr>
																<td>UPS Ground</td>
																<td>2-5 days</td>
																<td>Rs. 1600.00</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="card rounded-0 shadow-none">
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<div class="d-grid">	<a href="checkout-details.html" class="btn btn-light btn-ecomm"><i class="bx bx-chevron-left"></i>Back to Details</a>
														</div>
													</div>
													<div class="col-md-6">
														<div class="d-grid">	<a href="checkout-payment.html" class="btn btn-white btn-ecomm">Proceed to Payment<i class="bx bx-chevron-right"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-xl-4">
									<div class="order-summary">
										<div class="card rounded-0">
											<div class="card-body">
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
														<p class="fs-5">Order summary</p>
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
															for($j=0;$j<$num_rows;$j++){
														?>
														<div class="my-3 border-top"></div>
														<div class="d-flex align-items-center">
															<a class="d-block flex-shrink-0" href="javascript:;">
																<?php
																	$Total_Price += $product[$j]['price'];
																	$temp = $product[$j]['image_loc'];
																	$img = explode('&',$temp);
																?>
																<img src="<?php echo $img[0]; ?>" width="75" alt="Product">
																<!-- <img src="assets/images/products/07.png" width="75" alt="Product"> -->
															</a>
															<div class="ps-2">
																<h6 class="mb-1"><a href="javascript:;" class="text-dark"><?php echo $product[$j]['title']; ?></a></h6>
																<div class="widget-product-meta"><span class="me-2">Rs. <?php echo $product[$j]['price']; ?><small>.00</small></span><span class="">x 1</span>
																</div>
															</div>
														</div>
														<?php
															}
														?>
													</div>
												</div>
												<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
													<div class="card-body">
														<p class="mb-2">Subtotal: <span class="float-end">Rs. <?php echo $Total_Price; ?></span>
														</p>
														<p class="mb-2">Shipping: <span class="float-end">--</span>
														</p>
														<?php $tax = 1000; ?>
														<p class="mb-2">Taxes: <span class="float-end">Rs. <?php echo $tax; ?></span>
														</p>
														<p class="mb-0">Discount: <span class="float-end">--</span>
														</p>
														<div class="my-3 border-top"></div>
														<h5 class="mb-0">Order Total: <span class="float-end"><?php echo "Rs. ",$Total = $Total_Price - $tax; ?></span></h5>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
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
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/js/include-html.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>