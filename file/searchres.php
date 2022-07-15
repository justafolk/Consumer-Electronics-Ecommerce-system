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
	require_once "login.dbh.php";
	function cart_exists($conn, $user, $prod)
	{
		require_once "login.dbh.php";
		$error = "";
		$sql = "SELECT * FROM cart WHERE U_id = ? AND Prod_id = ?;";
		$smt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($smt, $sql)) {
			$error .= "Error in STMT";
			exit();
		}
		mysqli_stmt_bind_param($smt, "ii", $user, $prod);
		mysqli_stmt_execute($smt);
		$resultData = mysqli_stmt_get_result($smt);
		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		} else {
			$result = false;
			return $result;
		}
	}
	function existed($conn, $prod_id)
	{
		$error = "";
		$sql = "SELECT Prod_id FROM cart WHERE Prod_id = ?;";
		$smt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($smt, $sql)) {
			$error .= "Error in STMT";
			exit();
		}
		mysqli_stmt_bind_param($smt, "i", $prod_id);
		mysqli_stmt_execute($smt);
		$resultData = mysqli_stmt_get_result($smt);
		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		} else {

			$result = null;
			return $result;
		}
	}
	function cart($conn, $user, $prod)
	{
		require_once "login.dbh.php";
		$error = "";
		$cart_existed = cart_exists($conn, $user, $prod);
		if ($cart_existed == NULL) {
			if ($user > 0) {
				$sql = "INSERT INTO cart(U_id, Prod_id) VALUES('$user','$prod');";
				$smt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($smt, $sql)) {
					$error .= "Error in STMT";
					exit();
				}
				mysqli_stmt_execute($smt);
				mysqli_stmt_close($smt);
				$error .= "Cart Added Successfully";
			} else {
			}
		} else {
		}
	} ?>
	<div include-html="header.php" id="header_file"></div>
	<!--end top header wrapper-->
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
			<!--start breadcrumb-->
			<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
				<div class="container">
					<div class="page-breadcrumb d-flex align-items-center">
						<h3 class="breadcrumb-title pe-3">Search results for '<?php echo $_GET["term"] ?>'</h3>
						<div class="ms-auto">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Search Results</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!--end breadcrumb-->
			<!--start shop area-->
			<section class="py-4">
				<div class="container">
					<div class="row">

							<?php include "./filter.php"; ?>
						<div class="col-12 col-xl-9">
							<div class="product-wrapper">
								<div class="toolbox d-flex align-items-center mb-3 gap-2">
									<div class="d-flex flex-wrap flex-grow-1 gap-1">
										<div class="d-flex align-items-center flex-nowrap">
											<p class="mb-0 font-13 text-nowrap">Sort By:</p>
											<select class="form-select ms-3 rounded-0">
												<option value="menu_order" selected="selected">Default sorting</option>
												<option value="popularity">Sort by popularity</option>
												<option value="rating">Sort by average rating</option>
												<option value="date">Sort by newness</option>
												<option value="price">Sort by price: low to high</option>
												<option value="price-desc">Sort by price: high to low</option>
											</select>
										</div>
									</div>

								</div>
								<div class="product-grid">

									<?php
									include 'login.dbh.php';
									$user_id = $_SESSION['u_id'];
									$categories = array();
									$brands = array();
									$star = array();

									foreach ($_GET as $key => $value) {
										if (strpos($key, "cat") !== false) {
											
											array_push($categories, preg_replace('~\x{00a0}~','',$value)); 
										}
										elseif (strpos($key, "brand") !== false) {
											array_push($brands, preg_replace('~\x{00a0}~','', $value)); 
										}
										elseif (strpos($key, "star") !== false) {
											array_push($star, preg_replace('~\x{00a0}~','', $value)); 
										}
										elseif (strpos($key, "max-price") !== false) {
											$max_price = preg_replace('~\x{00a0}~','', $value); 
										}
										elseif (strpos($key, "min-price") !== false) {
											$min_price = preg_replace('~\x{00a0}~','', $value); 
										}
									}
									$sql = "SELECT *, (select AVG(ratings) from review where Prod_id=productdb.Prod_id) as rating FROM productdb WHERE ((category=' {$_GET['term']} ') or (category LIKE '%{$_GET['term']}%') or (title LIKE '%{$_GET['term']}%' or Tags LIKE '%{$_GET['term']}%' or specification LIKE '%{$_GET['term']}%'))   ";
									if (count($categories) > 0) {
										$sql .= " and (category='{$categories[0]}'";
										for ($i = 1; $i < count($categories); $i++) {
											$sql .= " or category='{$categories[$i]}'";
										}
										$sql .= ")";
									}
									if (count($brands) > 0) {
										$sql .= " and (brand='{$brands[0]}'";
										for ($i = 1; $i < count($brands); $i++) {
											$sql .= " or brand='{$brands[$i]}'";
										}
										$sql .= ")";
									}
									if (isset($max_price)) {
										$sql .= " and price <= $max_price";
									}
									if (isset($min_price)) {
										$sql .= " and price >= $min_price";
									}

									
									$result = mysqli_query($conn, $sql);
									if (!$result){
										echo "Error: " . $sql . "<br>" . mysqli_error($conn);
									}
									$resultCheck = mysqli_num_rows($result);
									$total = 0;
									if ($resultCheck > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
											if (count($star) >0){
												if ($row['rating'] < $star[0]){
													continue;
												}
											}
									
									?>
											<div class="card rounded-0 product-card">
												<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">

												</div>
												<div class="row g-0">
													<div class="col-md-4">
														<img src="<?php echo explode("&", $row["image_loc"])[0] ?>" class="img-fluid" alt="...">
													</div>
													<div class="col-md-8">
														<div class="card-body">
															<div class="product-info">
																<a href="javascript:;">
																	<p class="product-catergory font-13 mb-1"><?php $row["title"] ?></p>
																</a>
																<a href="product-details.php?id=<?php echo $row["Prod_id"] ?>">
																	<h6 class="product-name mb-2"><?php echo $row["title"] ?></h6>
																</a>
																<p class="card-text"> <?php echo $row["description"] ?></p>
																<div class="d-flex align-items-center">
																	<div class="mb-1 product-price">
																		<span class="fs-5" style="color: green">Rs. <?php echo number_format($row["price"]) ?></span>
																		<span class="me-1 text-decoration-line-through">Rs. <?php echo number_format($row["mrp_price"]) ?></span>
																	</div>
																	<div class="cursor-pointer ms-auto">
																		<?php
																		$sql = "SELECT * from review where Prod_id='{$row["Prod_id"]}'";
																		$ress = mysqli_query($conn, $sql);
																		$row_re = mysqli_fetch_assoc($ress);
																		for ($asf = 0; $asf < $row_re["ratings"]; $asf++) { ?>
																			<i class="bx bxs-star text-warning"></i>
																		<?php
																		}
																		for ($asf = 0; $asf < 5 - $row_re["ratings"]; $asf++) { ?>
																			<i class="bx bxs-star text-gray"></i>
																		<?php }
																		?>
																	</div>
																</div>
																<div class="product-action mt-2">
																	<div class="d-flex gap-2">
																		<button onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $row["Prod_id"] ?> '" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</button>
																		<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?php echo $row["Prod_id"] ?>"><i class="bx bx-zoom-in"></i>Quick View</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal fade" id="QuickViewProduct<?php echo $row['Prod_id']; ?>">
												<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
													<div class="modal-content rounded-0 border-0">
														<div class="modal-body">
															<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
															<div class="row g-0">
																<div class="col-12 col-lg-6">
																	<div class="image-zoom-section">
																		<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
																			<?php
																			$temp = $row['image_loc'];
																			$img = explode('&', $temp);
																			$count = count($img);
																			for ($i = 0; $i < $count - 1; $i++) {
																			?>
																				<div class="item">
																					<img src="<?php echo $img[$i]; ?>" class="img-fluid" alt="">
																				</div>
																			<?php
																			}
																			?>
																		</div>
																		<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
																			<?php
																			for ($i = 0; $i < $count - 1; $i++) {
																			?>
																				<button class="owl-thumb-item">
																					<img src="<?php echo $img[$i]; ?>" class="" alt="">
																				</button>
																			<?php
																			}
																			?>
																		</div>
																	</div>
																</div>
																<div class="col-12 col-lg-6">
																	<div class="product-info-section p-3">
																		<h3 class="mt-3 mt-lg-0 mb-0"><?php echo $row['title']; ?></h3>
																		<div class="product-rating d-flex align-items-center mt-2">
																			<div class="rates cursor-pointer font-13"> <i class="bx bxs-star text-warning"></i>
																				<i class="bx bxs-star text-warning"></i>
																				<i class="bx bxs-star text-warning"></i>
																				<i class="bx bxs-star text-warning"></i>
																				<i class="bx bxs-star text-light-4"></i>
																			</div>
																			<div class="ms-1">
																				<p class="mb-0">(<?php
																									$sql = "SELECT * FROM review WHERE prod_id = '{$row['Prod_id']}'";
																									$results = mysqli_query($conn, $sql);
																									$count = mysqli_num_rows($results);
																									echo "0" . $count;

																									?>) Ratings</p>
																			</div>
																		</div>
																		<div class="d-flex align-items-center mt-3 gap-2">
																			<h5 class="mb-0 text-decoration-line-through text-light-3"></h5>
																			<h4 class="mb-0">Rs. <?php echo $row['price']; ?></h4>
																		</div>
																		<div class="mt-3">
																			<h6>Description :</h6>
																			<p class="mb-0"><?php echo $row['description']; ?></p>
																		</div>
																		<dl class="row mt-3">
																			<dt class="col-sm-3">Product id</dt>
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
																			<button id="cart1" type="button" name="addtocart" onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $row['Prod_id']; ?> '" class="btn btn-dark btn-ecomm"><i class='bx bxs-cart'></i>Add to Cart</button>
																			<a href="" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
																		</div>
																	</div>
																</div>
															</div>
															<!--end row-->
														</div>
													</div>
												</div>
											</div>
											<div class="border-top my-3"></div>

									<?php }
									} ?>


								</div>

							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</section>
			<!--end shop area-->
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
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/js/include-html.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/nouislider/nouislider.min.js"></script>
	<script src="assets/js/price-slider.js"></script>
	<script src="assets/js/product-gallery.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>