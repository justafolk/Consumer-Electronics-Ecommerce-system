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
	<?php
	if (isset($_POST['submit'])) {
		$name = $_POST['search'];
		header("location: search.php?id=$name");
	}
	session_start();
	$firstname = "";
	$lastname = "";
	$email = "";
	$user_id = "";
	if (isset($_SESSION['uemail']) && isset($_SESSION['ufirstname']) && isset($_SESSION['ulastname']) && isset($_SESSION['u_id'])) {
		$firstname = $_SESSION["ufirstname"];
		$lastname = $_SESSION["ulastname"];
		$email = $_SESSION["uemail"];
		$user_id = $_SESSION["u_id"];
	}
	?>

	<!--end top header wrapper-->
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
			<!--start breadcrumb-->

			<!--end breadcrumb-->
			<!--start shop cart-->
			<section class="py-4">
				<div class="container">
					<div class="shop-cart">
						<div class="row">
							<div class="col-12 col-xl-8">
								<div class="checkout-details">
									<div class="card bg-transparent rounded-0 shadow-none">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
												</div>
												<div class="logo d-none d-lg-flex">
													<a href="index.php">
														<div class="ms-2">
															<h6 class="mb-0">eCommerce Web.</h6>
															<h5 class="mb-0">Client Site</h5>
														</div>
													</a>
												</div>
											</div>
											<br>
											<div class="steps steps-light">
												<a class="step-item active" href="shop-cart.html">
													<div class="step-progress"><span class="step-count">1</span>
													</div>
													<div class="step-label"><i class='bx bx-cart'></i>Cart</div>
												</a>
												<a class="step-item active current" href="checkout-details.html">
													<div class="step-progress"><span class="step-count">2</span>
													</div>
													<div class="step-label"><i class='bx bx-user-circle'></i>Details</div>
												</a>
												<a class="step-item" href="checkout-review.html">
													<div class="step-progress"><span class="step-count">3</span>
													</div>
													<div class="step-label"><i class='bx bx-credit-card '></i>Payment Method</div>
												</a>
												<a class="step-item" href="checkout-payment.html">
													<div class="step-progress"><span class="step-count">4</span>
													</div>
													<div class="step-label"><i class='bx bx-check-circle'></i>Place Order</div>
												</a>
												<a class="step-item" href="checkout-payment.html">
													<div class="step-progress"><span class="step-count">5</span>
													</div>
													<div class="step-label"><i class='bx bx-credit-card'></i>Complete Payment</div>
												</a>

											</div>
										</div>
									</div>
									<div class="card rounded-0">
										<div class="card-body">
											<div class="d-flex align-items-center mb-3">
												<!-- <div class="">
														<img src="assets/images/avatars/avatar-1.png" width="90" alt="" class="rounded-circle p-1 border">
													</div> -->
												<div class="ms-2">
													<h6 class="mb-0"><?php echo $_SESSION["ufirstname"] . " " . $_SESSION["ulastname"]; ?></h6>
													<p class="mb-0"><?php echo $_SESSION["uemail"];  ?></p>
												</div>
												<!-- <div class="ms-auto"> <a href="javascript:;" class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Edit Profile</a>
												</div> -->
											</div>
											<div class="border p-3">
												<!-- rounded cards for saved addresses -->
													<h5 class="h5">Saved Addresses</h5>
													<?php
															include "login.dbh.php"; 
															$sql = "SELECT address1, address2, address3 FROM user WHERE id = '".$_SESSION["u_id"]."'";
															$result = mysqli_query($conn, $sql);
															$row = mysqli_fetch_assoc($result);
															$address1 = $row["address1"];
															$address2 = $row["address2"];
															$address3 = $row["address3"];
															if ($address1 != NULL){
																
																?>
													<div class="col-md-6">
														<div class="bg-white card shadow-none mb-4 border">
															<div class="gold-members p-4">
																<div class="media">
																	<div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
																	<div class="media-body">
																		<h6 class="mb-1 text-secondary">Home</h6>
																		<p class="text-black"><?php 
																		$jsonData = rtrim($address1, "\0");
																		$address_f =  json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true );
																		echo $address_f["fname"] . " " . $address_f["lname"] . "<br>";
																		echo $address_f["address1"] . "<br>";
																		echo $address_f["address2"] ;
																		echo $address_f["city"] ." - ".$address_f["zipcode"]. "<br>";
																		echo $address_f["state"] . "<br>";
																		echo $address_f["phoneno"] . "<br>";
																		$json_string = stripslashes(html_entity_decode($address1));
																		echo json_decode($json_string, true);
																		?>
																		
																		</p>
																		<button onclick="window.location.href='http://localhost:3456/checkout-review.php?address=1&percent=<?php echo $_GET["percent"] ?>&promo=<?php echo $_GET["promo"] ?>'" class="btn btn-dark btn-ecomm">Deliver to this Address!</button>
																		<button class="btn btn-white btn-ecomm">Edit </button>

																	</div>
																</div>
															</div>
														</div>
													</div>
													<?php }
														if ($address2 != NULL){
													?>
													<div class="col-md-6">
														<div class="bg-white card mb-4 border">
															<div class="gold-members p-4">
																<div class="media">
																	<div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
																	<div class="media-body">
																		<h6 class="mb-1 text-secondary">Office</h6>
																		<p class="text-black"><?php echo $address2; print_r($address2) ?>
																		</p>
																		<button onclick="window.location.href='http://localhost:3456/checkout-review.php?address=2&percent=<?php echo $_GET["percent"] ?>'" class="btn btn-dark btn-ecomm">Deliver to this Address!</button>
																		<button class="btn btn-white btn-ecomm">Edit </button>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<?php }
														if ($address3 != NULL){
													?>
													<div class="col-md-6">
														<div class="bg-white card mb-4 border">
															<div class="gold-members p-4">
																<div class="media">
																	<div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
																	<div class="media-body">
																		<h6 class="mb-1 text-secondary">Other</h6>
																		<p class="text-black"><?php echo $address3 ?>
																		</p>
																		<button onclick="window.location.href='http://localhost:3456/checkout-review.php?address=3&percent=<?php echo $_GET["percent"]?>&promo=<?php echo $_GET["promo"]; ?>'" class="btn btn-dark btn-ecomm">Deliver to this Address!</button>
																		<button class="btn btn-white btn-ecomm">Edit </button>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<?php } ?>

													<h2 class="h5 mb-0">Shipping Address</h2>
													<div class="my-3 border-bottom"></div>
													<div class="form-body">
														<form class="row g-3" action="checkout-review.php" method="post">
															<div class="col-md-6">
																<label class="form-label">First Name</label>
																<input type="text" name="fname" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Last Name</label>
																<input type="text" name="lname" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">E-mail id</label>
																<input type="text" name="emailid" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Phone Number</label>
																<input type="text" name="phoneno" class="form-control rounded-0">
															</div>

															<div class="col-md-6">
																<label class="form-label">State/Province</label>
																<select class="form-select rounded-0" name="state">
																	<option>Maharashtra</option>
																	<option>Goa</option>
																	<option value="">Gujarat</option>
																</select>
															</div>
															<div class="col-md-6">
																<label class="form-label">Zip/Postal Code</label>
																<input type="text" name="zipcode" class="form-control rounded-0">
															</div>

															<div class="col-md-6">
																<label class="form-label">Address 1</label>
																<textarea class="form-control rounded-0" name="address1"></textarea>
															</div>
															<div class="col-md-6">
																<label class="form-label">Address 2</label>
																<textarea class="form-control rounded-0" name="address2"></textarea>
															</div>
															<div class="col-md-6">
																<label class="form-label">City</label>
																<input class="form-control rounded-0" name="city"></input>
															</div>
															<div class="col-md-6">
																<label class="form-label">Landmark</label>
																<input type="text" name="Landmark" class="form-control rounded-0">

															</div>
															<!-- drop down button for type of address -->
															<div class="col-md-12">
																<label class="form-label">Address Type</label>
																<select class="form-select rounded-0" name="adtype">
																	<option name >Home</option>
																	<option>Office</option>
																	<option>Other</option>
																</select>
															</div>
															<div class="col-md-6">
																<div class="d-grid"> <a href="shop-cart.html" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
																</div>
															</div>
															<div class="col-md-6">
																<div class="d-grid"> </a>
																	<input type="submit" class="btn btn-dark btn-ecomm" value="Proceed to checkout >">
																</div>
															</div>
															<input type="hidden" name="percent" value="<?php echo $_GET["percent"]; ?>">
															<input type="hidden" name="promo" value="<?php echo $_GET["promo"]; ?>">

														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-xl-4">
									<div class="order-summary">
										<div class="card rounded-0 my-5">
											<div class="card-body">

												<div class="card rounded-0 border bg-transparent shadow-none">
													<div class="card-body">
														<p class="fs-5">Order summary</p>
														<?php
														include 'login.dbh.php';
														session_start();
														$user_id = $_SESSION['u_id'];
														$sql = "SELECT * FROM cart WHERE U_id = '$user_id'";
														$result = mysqli_query($conn, $sql);
														$resultCheck = mysqli_num_rows($result);
														$total = 0;
														if ($resultCheck > 0) {
															while ($row = mysqli_fetch_assoc($result)) {
																$product_id = $row['Prod_id'];
																$sql2 = "SELECT * FROM productdb WHERE Prod_id = '$product_id'";
																$result2 = mysqli_query($conn, $sql2);
																$row2 = mysqli_fetch_assoc($result2);
																$product_name = $row2['title'];
														?>
																<div class="my-3 border-top"></div>
																<div class="d-flex align-items-center">
																	<a class="d-block flex-shrink-0" href="javascript:;">
																		<img src="
															<?php echo explode('&', $row2["image_loc"])[0]; ?>" width="75" alt="Product">
																	</a>
																	<div class="ps-2">
																		<h6 class="mb-1"><a href="javascript:;" class="text-dark">
																				<?php echo $row2['title']; ?>
																			</a></h6>
																		<div class="widget-product-meta"><span class="me-2">Rs.
																				<?php echo $row2['price']; ?>
																				<small>.00</small></span><span class="">
																				x <?php echo $row['quantity']; ?>
																			</span>
																		</div>
																	</div>
																</div>
																<?php $total += $row2["price"] * $row["quantity"] ?>
														<?php }
														} ?>

													</div>
												</div>
												<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
													<div class="card-body">
														<p class="mb-2">Subtotal: <span class="float-end">Rs. <?php echo $total;  ?></span>
														</p>
														<p class="mb-2">Shipping: <span class="float-end" style="color: green">Free!</span>
														</p>
														<p class="mb-2">Taxes (2.5% CGST + 2.5% SGST): <span class="float-end">Rs. <?php echo $total * (5 / 100);  ?></span>
														</p>
														<p class="mb-0">Discount: <span class="float-end" style="color:green">Rs <?php echo $total * ($_GET["percent"] / 100) ?></span>
														</p>
														<div class="my-3 border-top"></div>
														<h5 class="mb-0">Order Total: <span class="float-end">Rs.
																<?php echo $total - $total * ($_GET["percent"] / 100) ?>
															</span></h5>
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
	<br>
	<br>
	<br>
	<br>
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
								<h3 class="mt-3 mt-lg-0 mb-0">SAMSUNG Galaxy F22 (Denim Blue, 64 GB) (4 GB RAM)</h3>
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
								<div class="d-flex align-items-center mt-3 gap-2">
									<h5 class="mb-0 text-decoration-line-through text-light-3"></h5>
									<h4 class="mb-0">Rs. 11,999</h4>
								</div>
								<div class="mt-3">
									<h6>Discription :</h6>
									<p class="mb-0">Bid goodbye to screen stuttering, poor display quality, and low-resolution photos by getting your hands on the Samsung Galaxy F22 smartphone. Featuring a 90 Hz refresh rate, HD+ sAMOLED display, and True 48 MP quad-rear camera, this smartphone is sure to be your ideal companion for entertainment, gaming, and communication. What's more, its 6000 mAh battery ensures that a full charge can last for an entire day.</p>
								</div>
								<dl class="row mt-3">
									<dt class="col-sm-3">Product id</dt>
									<dd class="col-sm-9">#BHU5879</dd>
									<dt class="col-sm-3">Delivery</dt>
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
									<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
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