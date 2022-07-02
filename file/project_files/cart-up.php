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
	<title>Cart</title>
</head>

<body>
	<div include-html="header.php" id="header_file"></div>
	<!--end top header wrapper-->
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
			<!--start breadcrumb-->
			<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
				<div class="container">
					<div class="page-breadcrumb d-flex align-items-center">
						<h3 class="breadcrumb-title pe-3">Shopping Cart</h3>
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
											$product_name = $row2['product_name'];

									?>
											<div class="row align-items-center g-3">
												<div class="col-12 col-lg-9">
													<div class="d-lg-flex align-items-center gap-2">
														<div class="cart-img text-center text-lg-start">
															<img src="<?php echo explode("&", $row2["image_loc"])[0]; ?>" width="130" alt="">
														</div>
														<div class="cart-detail text-center text-lg-start">
															<h6 class="mb-2"><?php echo $row2["title"]; ?></h6>
															<p class="mb-0">Size: <span>Regular</span>
															</p>
															<p class="mb-2">Color: <span>White & Blue</span>
															</p>
															<!-- <h5 class="mb-0">Rs. <?php echo $row2["price"]; ?></h5> -->
															<input type="number" class="form-control rounded-0" value="<?php echo $row["quantity"]; ?>" min="1" style="width: 20%;">
															<br>
															<a href="./remove_from_cart.php?Prod_id=<?php echo $row2["Prod_id"] . "&user_id=" . $user_id; ?>" class=""> <i class='bx bx-x-circle'></i> Remove |</a>
															<a href="./remove_from_cart.php?Prod_id=<?php echo $row2["Prod_id"] . "&user_id=" . $user_id; ?>" class="">&nbsp;Save for Later</a>
															<a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-heart me-0'></i></a>

														</div>
													</div>
												</div>

												<div class="col-12 col-lg-2">
													<div class="text-center">
														<div class="d-flex gap-2 justify-content-center justify-content-lg-end">
															<h5 class="mb-0">Rs. <?php $total += $row2["price"] * $row["quantity"];
																					echo  $row2["price"] * $row["quantity"]; ?></h5>
														</div>
													</div>
												</div>
											</div>
											<div class="my-4 border-top"></div>

									<?php
										}
									} ?>

								</div>



								<div class="d-lg-flex align-items-center gap-2"> <a href="index.php" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
									<a href="javascript:;" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</a>

								</div>
							</div>
							<div class="col-12 col-xl-4">
								<div class="checkout-form p-3 bg-light">
									<div class="card rounded-0 border bg-transparent shadow-none">
										<div class="card-body">
											<p class="fs-5">Apply Discount Code</p>
											<?php
											if (isset($_GET["discount"])) {

												include './login.dbh.php';
												$discount = $_GET["discount"];
												$user_id = $_SESSION['user_id'];
												$sql = "select * from coupons where coupon_text = '$discount'";
												$result = mysqli_query($conn, $sql);
												$row = mysqli_fetch_assoc($result);
												$norows = mysqli_num_rows($result);
												if ($norows > 0) {
													$percent = $row["discount"];
											?>
														<a href="" style="color: green ;">
															<i class='bx bx-x-circle'>
															</i>
															<?php echo "\"" . $discount . "\" Coupon Applied"; ?>

														</a>
												<?php

												} else {
													$percent = null;
												?>
														<a href="" style="color: green ;">
															<i class='bx bx-x-circle'>
															</i>
															Invalid Coupon

														</a>
											<?php
												}
											}

											?>

<form action="" method="get" name="discountform" id="discountform">
											<div class="input-group">

													<input type="text" class="form-control rounded-0" name="discount" id="discount" placeholder="Enter discount code">
													<button class="btn btn-dark btn-ecomm" id="discount_btn" name="discount_btn" type="button">Apply Discount</button>

												</div>
											</form>
										</div>
									</div>

									<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
										<div class="card-body">
											<p class="mb-2">Subtotal: <span class="float-end">
													<?php
													echo "Rs. " . $total;
													?>

												</span>
											</p>
											<p class="mb-2">Shipping: <span class="float-end">--</span>
											</p>
											<p class="mb-2">Taxes: (2.5% CGST + 2.5% SGST) <span class="float-end">
													<?php
													$tax = ($total * 2.5) / 100;
													echo "Rs. " . $tax;
													?>
												</span>
											</p>
											<p class="mb-0">Discount: <span class="float-end" style="color: green;">
											<del>

												Rs. <?php echo ($percent/100) * $total ?>
											</del>
											</span>
											</p>
											<div class="my-3 border-top"></div>
											<h5 class="mb-0">Order Total: <span class="float-end">
												<?php echo "Rs. " . ($total - ($percent/100) * $total); ?>
											</span></h5>
											<div class="my-4"></div>
											<div class="d-grid"><a href="checkout-details.php?percent=<?php echo $percent ?>&promo=<?php echo $discount ?>" class="btn btn-dark btn-ecomm">Proceed to Checkout</a>
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
	<script>
		discount_btn.addEventListener('click', (e) => {
					document.forms["discountform"].submit();

				})
	</script>
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