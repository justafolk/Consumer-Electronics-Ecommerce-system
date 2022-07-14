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
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<!-- Bootstrap Css -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

	<title>eCommerce Website</title>
	<style>
		.btn-change:hover {
			transform: scale(1.2);
		}

		.mg {
			margin-top: 2%;
		}
	</style>
</head>

<body>
	<!--start top header wrapper-->

	<?php
	include 'header.php';
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
	}
	session_start();
	$user_id = "";
	if (isset($_SESSION['u_id'])) {
		$user_id = $_SESSION["u_id"];
	}
	if (isset($_POST['submit'])) {
		$prod = $_POST['prod_id'];
		$result = cart($conn, $user_id, $prod);
	}
	?>
	<!--end top header wrapper-->
	<!--start slider section-->
	<section class="slider-section">
		<div class="first-slider">
			<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
				<ol class="carousel-indicators">
					<?php
					include "login.dbh.php";
					$sql = "SELECT * FROM promotions where type=\"main\";";
					$result = mysqli_query($conn, $sql);
					$i = 0;
					if ($row = mysqli_fetch_assoc($result)) {
						echo '<li data-target="#carouselExampleDark" data-slide-to="' . $i . '" class="active"></li>';
						$i++;
					}
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<li data-target="#carouselExampleDark" data-slide-to="' . $i . '" class=""></li>';
						$i++;
					}
					?>
				</ol>
				<div class="carousel-inner">
					<?php
					include "login.dbh.php";
					$sql = "SELECT * FROM promotions where type=\"main\";";
					$result = mysqli_query($conn, $sql);
					$i = 0;
					if ($row = mysqli_fetch_assoc($result)) {
					?>
						<div class="carousel-item active bg-dark-gery">
							<div class="row d-flex align-items-center">
								<div class="col d-none d-lg-flex justify-content-center">
								</div>
								<div class="">
									<img class="d-block w-100" src="<?php echo $row["image_loc"] ?>" class="img-fluid" alt="...">
								</div>
							</div>
						</div>
					<?php
					}
					while ($row = mysqli_fetch_assoc($result)) {
					?>
						<div class="carousel-item  bg-dark-gery">
							<div class="row d-flex align-items-center">
								<div class="col d-none d-lg-flex justify-content-center">
								</div>
								<div class="">
									<img class="d-block w-100" src="<?php echo $row["image_loc"] ?>" class="img-fluid" alt="...">
								</div>
							</div>
						</div>
					<?php } ?>

				</div>
				<a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</a>
			</div>
		</div>
	</section>
	<!--end slider section-->
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
			<!--start information-->
			<section class="py-3 border-top border-bottom">
				<div class="container">
					<div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
						<div class="col">
							<div class="d-flex align-items-center p-3 bg-dark-gery">
								<div class="fs-1"><i class='bx bx-taxi'></i>
								</div>
								<div class="info-box-content ps-3">
									<h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>
									<p class="mb-0">Free shipping on all orders over Rs.2000</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="d-flex align-items-center p-3 bg-dark-gery">
								<div class="fs-1"><i class='bx bx-dollar-circle'></i>
								</div>
								<div class="info-box-content ps-3">
									<h6 class="mb-0">MONEY BACK GUARANTEE</h6>
									<p class="mb-0">100% money back guarantee</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="d-flex align-items-center p-3 bg-dark-gery">
								<div class="fs-1"><i class='bx bx-support'></i>
								</div>
								<div class="info-box-content ps-3">
									<h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
									<p class="mb-0">Awesome Support for 24/7 Days</p>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</section>
			<section class="py-4">
				<div class="container">
					<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
						<div class="col-6">
							<div class="card rounded-0 border shadow-none">
								<div class="row g-0 align-items-center">
									<div class="">
									<?php
											include "login.dbh.php";
											$sql = "SELECT * FROM promotions where type=\"secondary\";";
											$result = mysqli_query($conn, $sql);
											$i = 0;
											if ($row = mysqli_fetch_assoc($result)) {
											 ?>
										<img src="<?php $img = explode(";", $row["image_loc"])[0]; echo $img ?>" class="img-fluid w-100" alt="" />
									</div>
									<div class="">
										<div class="card-body">
										
											<h5 class="card-title text-uppercase"> <?php echo $row["title"]; ?></h5>
											<p class="card-text text-uppercase"><?php echo $row["subtitle"]; ?></p>
											<!-- <a href="" class="btn btn-dark btn-ecomm"></a> -->
										</div>
										<?php } ?>
										<!-- <div class="card-body">
												<ul class="list-unstyled mb-0 categories-list list-group-horizontal-md list-group">
													<li>
														<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
														<p class="card-text text-uppercase">Starting at Rs. 19400</p>
													</li>
													<li style="margin-left:30%;">
														<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
													</li>
												</ul>
											</div> -->
									</div>
								</div>
							</div>
						</div>

						<!-- assets/images/products/38.png -->
						<div class="col-6">
							<div class="card rounded-0 border shadow-none">
							<div class="row g-0 align-items-center">
									<div class="">
									<?php
											if ($row = mysqli_fetch_assoc($result)) {
											 ?>
										<img src="<?php echo $row["image_loc"]; ?>" class="img-fluid w-100" alt="" />
									</div>
									<div class="">
										<div class="card-body">
										
										<h5 class="card-title text-uppercase"> <?php echo $row["title"]; ?></h5>
											<p class="card-text text-uppercase"><?php echo $row["subtitle"]; ?></p>
											<!-- <a href="" class="btn btn-dark btn-ecomm"><?php echo $row["subtitle"]; ?></a> -->
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</section>
			<!--end pramotion-->
			<!--start Featured product-->
			<section class="py-4">
				<div class="container">
					<hr>
					<div class="d-flex align-items-center">
						<button type="submit" name="Ternding" id="b1" class="btn btn-change btn-white btn-ecomm border-3 active btn-dark m-2">Trending</button>
						<button type="submit" name="Mobile" id="b2" class="btn btn-change btn-white btn-ecomm border-3 active m-2">Mobile</button>
						<button type="submit" name="Laptop" id="b3" class="btn btn-change btn-white btn-ecomm border-3 active m-2">Laptop</button>
						<button type="submit" name="Headphones" id="b4" class="btn btn-change btn-white btn-ecomm border-3 active m-2">Headphones</button>
						<button type="submit" name="Tablet" id="b5" class="btn btn-change btn-white btn-ecomm border-3 active m-2">Tablets</button>
					</div>
				</div>
				<div class="product-grid py-4" id="Trending">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">New Arrival Products</h5>
							<a href="" class="btn btn-dark btn-ecomm ms-auto rounded-0 border-1">More<i class='bx bx-chevron-right'></i></a>
						</div>
						<br>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/main.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Trending/2.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Trending/l.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
								
							<?php
							require_once "login.dbh.php";
							require_once "function.php";
							$product = array();
							$row = "";
							$sql = "SELECT * FROM productdb WHERE hits >= 60";
							$smt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($smt, $sql)) {
								echo "Output not show";
								exit();
							}
							$i = 0;
							mysqli_stmt_execute($smt);
							$resultData = mysqli_stmt_get_result($smt);
							$num_rows = mysqli_num_rows($resultData);

							while ($row = mysqli_fetch_assoc($resultData)) {
								$product[$i] = $row;
								$i++;
							}
							?>
							<?php
							for ($j = 0; $j < 4; $j++) {
							?>
								<div class="col mt-5">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="">
													<div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
													</div>
												</a>
												<a  onclick="wishlist('<?php echo $j ?>wish', <?php echo $product[$j]['Prod_id'] ?>)">
													<div class="product-wishlist"><i id="<?php echo $j ?>wish" class='bx bx-heart' style="color:#ff0000"></i>
													</div>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
											<?php
											$temp = $product[$j]['image_loc'];
											$img = explode('&', $temp);
											?>
											<img src="<?php echo $img[0]; ?>" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<p class="product-catergory font-13 mb-1"><?php echo $product[$j]['category']; ?></p>
												</a>
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<h6 class="product-name mb-2"><?php echo $product[$j]['title']; ?></h6>
												</a>
												<input type="hidden" name="prod_id" value="<?php echo $product[$j]['Prod_id']; ?>">
												<div class="d-flex align-items-center">


													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>

														<span class="fs-5">Rs. <?php echo $product[$j]['price']; ?></span>
													</div>
													<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
													<?php
																		$sql = "SELECT * from review where Prod_id='{$product[$j]["Prod_id"]}'";
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
													<?php
													$prod = $product[$j]['Prod_id'];
													$prod1 = existed($conn, $prod);
													?>
													<div class="d-grid gap-2">

														<button id="cart1" type="button" name="addtocart" onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $product[$j]['Prod_id']; ?> '" class="btn btn-dark btn-ecomm"><i class='bx bxs-cart'></i>Add to Cart</button>
														<a href="" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?php echo $product[$j]['Prod_id']; ?>"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="QuickViewProduct<?php echo $product[$j]['Prod_id']; ?>">
									<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
										<div class="modal-content rounded-0 border-0">
											<div class="modal-body">
												<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
												<div class="row g-0">
													<div class="col-12 col-lg-6">
														<div class="image-zoom-section">
															<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
																<?php
																$temp = $product[$j]['image_loc'];
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
															<h3 class="mt-3 mt-lg-0 mb-0"><?php echo $product[$j]['title']; ?></h3>
															<div class="product-rating d-flex align-items-center mt-2">
																<div class="rates cursor-pointer font-13"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-light-4"></i>
																</div>
																<div class="ms-1">
																	<p class="mb-0">(<?php 
																	$sql = "SELECT * FROM review WHERE prod_id = '$product[$j]['Prod_id']'";
																	$result = mysqli_query($conn, $sql);
																	$count = mysqli_num_rows($result);
																	echo "0".$count;
																	
																	?>) Ratings</p>
																</div>
															</div>
															<div class="d-flex align-items-center mt-3 gap-2">
																<h5 class="mb-0 text-decoration-line-through text-light-3"></h5>
																<h4 class="mb-0">Rs. <?php echo $product[$j]['price']; ?></h4>
															</div>
															<div class="mt-3">
																<h6>Description :</h6>
																<p class="mb-0"><?php echo $product[$j]['description']; ?></p>
															</div>
															<dl class="row mt-3">
																<dt class="col-sm-3">Product id</dt>
1															</dl>
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
															<?php
															$prod = $product[$j]['Prod_id'];
															$prod1 = existed($conn, $prod);
															?>
															<!--end row-->
															<div class="d-flex gap-2 mt-3">
															<button id="cart1" type="button" name="addtocart" onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $product[$j]['Prod_id']; ?> '" class="btn btn-dark btn-ecomm"><i class='bx bxs-cart'></i>Add to Cart</button>
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
							<?php
							}
							?>
						</div>
						<div class="d-flex align-items-center mt-5">
							<h5 class="text-uppercase mb-0">Best Products</h5>
							<a href="" class="btn btn-dark btn-ecomm ms-auto rounded-0 border-1">More<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<?php
							require_once "login.dbh.php";
							require_once "function.php";
							$product = array();
							$row = "";
							$sql = "SELECT * FROM productdb WHERE hits >= 60";
							$smt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($smt, $sql)) {
								echo "Output not show";
								exit();
							}
							$i = 0;
							mysqli_stmt_execute($smt);
							$resultData = mysqli_stmt_get_result($smt);
							$num_rows = mysqli_num_rows($resultData);
							while ($row = mysqli_fetch_assoc($resultData)) {
								$product[$i] = $row;
								$i++;
							}
							for ($j = 0; $j < 4; $j++) {
							?>
								<div class="col">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="">
													
												</a>
												<a href="" onclick="wishlist('<?php echo $j ?>wish', <?php echo $product[$j]['Prod_id'] ?>)">
													<div class="product-wishlist"><i class='bx bx-heart'></i>
													</div>
													<script>
													
													</script>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
											<?php
											$temp = $product[$j]['image_loc'];
											$img = explode('&', $temp);
											?>
											<img src="<?php echo $img[0]; ?>" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<p class="product-catergory font-13 mb-1"><?php echo $product[$j]['category']; ?></p>
												</a>
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<h6 class="product-name mb-2"><?php echo $product[$j]['title']; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
														<span class="fs-5">Rs. <?php echo $product[$j]['price']; ?></span>
													</div>
													<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-light-4"></i>
														<i class="bx bxs-star text-light-4"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<input type="hidden" name="prod_id" value="<?php echo $product[$j]['Prod_id']; ?>">
													<?php
													require_once "login.dbh.php";
													$prod3 = $product[$j]['Prod_id'];
													$prod2 = existed($conn, $prod3);
													?>
													<div class="d-grid gap-2">
													<button id="cart1" type="button" name="addtocart" onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $product[$j]['Prod_id']; ?> '" class="btn btn-dark btn-ecomm"><i class='bx bxs-cart'></i>Add to Cart</button>
														<a href="" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?php echo $product[$j]['Prod_id']; ?>"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="QuickViewProduct<?php echo $product[$j]['Prod_id']; ?>">
									<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
										<div class="modal-content rounded-0 border-0">
											<div class="modal-body">
												<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
												<div class="row g-0">
													<div class="col-12 col-lg-6">
														<div class="image-zoom-section">
															<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
																<?php
																$temp = $product[$j]['image_loc'];
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
															<h3 class="mt-3 mt-lg-0 mb-0"><?php echo $product[$j]['title']; ?></h3>
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
																<h4 class="mb-0">Rs. <?php echo $product[$j]['price']; ?></h4>
															</div>
															<div class="mt-3">
																<h6>Discription :</h6>
																<p class="mb-0"><?php echo $product[$j]['description']; ?></p>
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
																<a href="" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a>
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
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<section class="" id="Headphones">
				<div class="container">
					<div class="d-flex align-items-center">
						<h5 class="text-uppercase mb-0">New Arrival Headphones</h5>
						<a href="" class="btn btn-dark btn-ecomm ms-auto rounded-0 border-1">More<i class='bx bx-chevron-right'></i></a>
					</div>
					<br>
					<div class="product-grid">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Headphones/1.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Mobile</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Headphones/2.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Headphones/3.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							require_once "login.dbh.php";
							require_once "function.php";
							$product = array();
							$row = "";
							$sql = "SELECT * FROM productdb WHERE category='headphone';";
							$smt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($smt, $sql)) {
								echo "Output not show";
								exit();
							}
							$i = 0;
							mysqli_stmt_execute($smt);
							$resultData = mysqli_stmt_get_result($smt);
							$num_rows = mysqli_num_rows($resultData);
							while ($row = mysqli_fetch_assoc($resultData)) {
								$product[$i] = $row;
								$i++;
							}
							for ($j = 0; $j < 4; $j++) {
							?>
								<div class="col mt-5">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="">
													<div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
													</div>
												</a>
												<a href="">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
											<?php
											$temp = $product[$j]['image_loc'];
											$img = explode('&', $temp);
											?>
											<img src="<?php echo $img[0]; ?>" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<p class="product-catergory font-13 mb-1"><?php echo $product[$j]['category']; ?></p>
												</a>
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<h6 class="product-name mb-2"><?php echo $product[$j]['title']; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
														<span class="fs-5">Rs. <?php echo $product[$j]['price']; ?></span>
													</div>
													<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-light-4"></i>
														<i class="bx bxs-star text-light-4"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="" class="btn btn-dark btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
														<a href="" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
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
			<section class="" id="Mobile">
				<div class="container">
					<div class="d-flex align-items-center">
						<h5 class="text-uppercase mb-0">New Arrival Mobiles</h5>
						<a href="" class="btn btn-dark btn-ecomm ms-auto rounded-0 border-1">More<i class='bx bx-chevron-right'></i></a>
					</div>
					<br>
					<div class="product-grid">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Mobile/1.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Mobile</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Mobile/2.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Mobile/3.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							require_once "login.dbh.php";
							require_once "function.php";
							$product = array();
							$row = "";
							$sql = "SELECT * FROM productdb WHERE category='Phone';";
							$smt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($smt, $sql)) {
								echo "Output not show";
								exit();
							}
							$i = 0;
							mysqli_stmt_execute($smt);
							$resultData = mysqli_stmt_get_result($smt);
							$num_rows = mysqli_num_rows($resultData);
							while ($row = mysqli_fetch_assoc($resultData)) {
								$product[$i] = $row;
								$i++;
							}
							for ($j = 0; $j < 4; $j++) {
							?>
								<div class="col mt-5">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3 mt-3">
												<a href="">
													<div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span></div>
												</a>
												<a href="">
													<div class="product-wishlist"> <i class='bx bx-heart'></i></div>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
											<?php
											$temp = $product[$j]['image_loc'];
											$img = explode('&', $temp);
											?>
											<img src="<?php echo $img[0]; ?>" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<p class="product-catergory font-13 mb-1"><?php echo $product[$j]['category'] ?></p>
												</a>
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<h6 class="product-name mb-2"><?php echo $product[$j]['title']; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"><span class="me-1 text-decoration-line-through"></span>
														<span class="fs-5">Rs.<?php echo $product[$j]['price']; ?></span>
													</div>
													<div class="cursor-pointer ms-auto">
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
													</div>
												</div>
												<div class="mt-2">
													<div class="d-grid gap-2">
														<a href="add_to_cart.php?prod_id=<?php echo $product[$j]['Prod_id']; ?>" class="btn btn-dark btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
														<a href="" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
							}
							?>
							<!--end row-->
						</div>
					</div>
			</section>
			<section class="" id="Laptop">
				<div class="container">
					<div class="d-flex align-items-center">
						<h5 class="text-uppercase mb-0">New Arrival Laptop</h5>
						<a href="" class="btn btn-dark btn-ecomm ms-auto rounded-0 border-1">More<i class='bx bx-chevron-right'></i></a>
					</div>
					<br>
					<div class="product-grid">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Laptop/1.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Mobile</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Laptop/2.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Laptop/3.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							require_once "login.dbh.php";
							require_once "function.php";
							$product = array();
							$row = "";
							$sql = "SELECT * FROM productdb WHERE category='laptop';";
							$smt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($smt, $sql)) {
								echo "Output not show";
								exit();
							}
							$i = 0;
							mysqli_stmt_execute($smt);
							$resultData = mysqli_stmt_get_result($smt);
							$num_rows = mysqli_num_rows($resultData);
							while ($row = mysqli_fetch_assoc($resultData)) {
								$product[$i] = $row;
								$i++;
							}
							for ($j = 0; $j < 4; $j++) {
							?>
								<div class="col mt-5">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="">
													<div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
													</div>
												</a>
												<a href="">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
											<?php
											$temp = $product[$j]['image_loc'];
											$img = explode('&', $temp);
											?>
											<img src="<?php echo $img[0]; ?>" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<p class="product-catergory font-13 mb-1"><?php echo $product[$j]['category']; ?></p>
												</a>
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>	">
													<h6 class="product-name mb-2"><?php echo $product[$j]['title']; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
														<span class="fs-5">Rs. <?php echo $product[$j]['price']; ?></span>
													</div>
													<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-light-4"></i>
														<i class="bx bxs-star text-light-4"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="" class="btn btn-dark btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
														<a href="" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
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
			<section class="" id="Tablet">
				<div class="container">
					<div class="d-flex align-items-center">
						<h5 class="text-uppercase mb-0">New Arrival Tablet</h5>
						<a href="" class="btn btn-dark btn-ecomm ms-auto rounded-0 border-1">More<i class='bx bx-chevron-right'></i></a>
					</div>
					<br>
					<div class="product-grid">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Tablet/1.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Mobile</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Tablet/4.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="">
											<img src="assets/images/Mobile/Tablet/7.png" class="img-fluid w-100" alt="" />
										</div>
										<div class="">
											<div class="card-body">
												<h5 class="card-title text-uppercase">Samsung Galaxy Z Fold 3 5G</h5>
												<p class="card-text text-uppercase">Starting at Rs. 19 400</p>
												<a href="" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							require_once "login.dbh.php";
							require_once "function.php";
							$product = array();
							$row = "";
							$sql = "SELECT * FROM productdb WHERE category='tablet';";
							$smt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($smt, $sql)) {
								echo "Output not show";
								exit();
							}
							$i = 0;
							mysqli_stmt_execute($smt);
							$resultData = mysqli_stmt_get_result($smt);
							$num_rows = mysqli_num_rows($resultData);
							while ($row = mysqli_fetch_assoc($resultData)) {
								$product[$i] = $row;
								$i++;
							}
							for ($j = 0; $j < 4; $j++) {
							?>
								<div class="item  mt-5">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
											<?php
											$temp = $product[$j]['image_loc'];
											$img = explode('&', $temp);
											?>
											<img src="<?php echo $img[0]; ?>" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<p class="product-catergory font-13 mb-1"><?php echo $product[$j]['category']; ?></p>
												</a>
												<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
													<h6 class="product-name mb-2"><?php echo $product[$j]['title']; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
														<span class="fs-5">Rs. <?php echo $product[$j]['price']; ?></span>
													</div>
													<div class="cursor-pointer ms-auto"> <span>5.0</span> <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="" class="btn btn-dark btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
														<a href="" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
							}
							?>
							<!--end row-->
						</div>
						<!-- <div class="d-flex align-items-center mt-3">
							<h5 class="text-uppercase mb-0">Best Tablet</h5>
							<a href="" class="btn btn-dark btn-ecomm ms-auto rounded-0 border-1">More<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							<div class="item">
								<div class="card rounded-0 product-card">
									<div class="card-header bg-transparent border-bottom-0">
										<div class="d-flex align-items-center justify-content-end">
											<a href="">
												<div class="product-wishlist"> <i class='bx bx-heart'></i>
												</div>
											</a>
										</div>
									</div>
									<a href="product-details.php">
										<img src="assets/images/products/07.png" class="card-img-top" alt="...">
									</a>
									<div class="card-body">
										<div class="product-info">
											<a href="">
												<p class="product-catergory font-13 mb-1">Catergory Name</p>
											</a>
											<a href="">
												<h6 class="product-name mb-2">Product Short Name</h6>
											</a>
											<div class="d-flex align-items-center">
												<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
													<span class="fs-5">Rs. 1999.00</span>
												</div>
												<div class="cursor-pointer ms-auto">	<span>4.9</span>  <i class="bx bxs-star text-white"></i>
												</div>
											</div>
											<div class="product-action mt-2">
												<div class="d-grid gap-2">
													<a href="" class="btn btn-dark btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
													<a href="" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
			</section>
			<section class="py-4">
				<div class="container">
					<div class="d-flex align-items-center">
						<h5 class="text-uppercase mb-0">Browse Catergory</h5>
						<a href="shop-categories.html" class="btn btn-dark ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
					</div>
					<hr />
					<div class="product-grid">
						<div class="browse-category owl-carousel owl-theme">
							<div class="item">
								<div class="card rounded-0 product-card border">
									<div class="card-body">
										<img src="assets/images/categories/phone.png" class="img-fluid" alt="...">
									</div>
									<div class="card-footer text-center">
										<h6 class="mb-1 text-uppercase">Phone</h6>
										<p class="mb-0 font-12 text-uppercase">10 Products</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card rounded-0 product-card border">
									<div class="card-body">
										<img src="assets/images/categories/02.png" class="img-fluid" alt="...">
									</div>
									<div class="card-footer text-center">
										<h6 class="mb-1 text-uppercase">Watches</h6>
										<p class="mb-0 font-12 text-uppercase">8 Products</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card rounded-0 product-card border">
									<div class="card-body">
										<img src="assets/images/categories/Tablet.png" class="img-fluid" alt="...">
									</div>
									<div class="card-footer text-center">
										<h6 class="mb-1 text-uppercase">Tablet</h6>
										<p class="mb-0 font-12 text-uppercase">14 Products</p>
									</div>
								</div>
							</div>
						
							<div class="item">
								<div class="card rounded-0 product-card border">
									<div class="card-body">
										<img src="assets/images/categories/05.png" class="img-fluid" alt="...">
									</div>
									<div class="card-footer text-center">
										<h6 class="mb-1 text-uppercase">Laptop</h6>
										<p class="mb-0 font-12 text-uppercase">6 Products</p>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card rounded-0 product-card border">
									<div class="card-body">
										<img src="assets/images/categories/06.png" class="img-fluid" alt="...">
									</div>
									<div class="card-footer text-center">
										<h6 class="mb-1 text-uppercase">Headphones</h6>
										<p class="mb-0 font-12 text-uppercase">5 Products</p>
									</div>
								</div>
							</div>
							<!-- <div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/07.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Furniture</h6>
											<p class="mb-0 font-12 text-uppercase">20 Products</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/08.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Jewelry</h6>
											<p class="mb-0 font-12 text-uppercase">16 Products</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/09.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Sports</h6>
											<p class="mb-0 font-12 text-uppercase">28 Products</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/10.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Vegetable</h6>
											<p class="mb-0 font-12 text-uppercase">15 Products</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/30.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Medical</h6>
											<p class="mb-0 font-12 text-uppercase">24 Products</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="assets/images/categories/29.png" class="img-fluid" alt="...">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">Sunglasses</h6>
											<p class="mb-0 font-12 text-uppercase">18 Products</p>
										</div>
									</div>
								</div> -->
						</div>
					</div>
				</div>
			</section>
			<!--end categories-->
			<!--start support info-->
			<section class="py-4 bg-light">
				<div class="container">
					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
						<div class="col">
							<div class="text-center">
								<div class="font-50">
									<i class='bx bx-cart'></i>
								</div>
								<h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>
								<p class="text-capitalize">Free delivery over Rs.1000</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
							</div>
						</div>
						<div class="col">
							<div class="text-center">
								<div class="font-50"> <i class='bx bx-credit-card'></i>
								</div>
								<h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
								<p class="text-capitalize">We possess SSL / Secure сertificate</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
							</div>
						</div>
						<div class="col">
							<div class="text-center">
								<div class="font-50"> <i class='bx bx-dollar-circle'></i>
								</div>
								<h2 class="fs-5 text-uppercase mb-0">Free returns</h2>
								<p class="text-capitalize">We return money within 30 days</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
							</div>
						</div>
						<div class="col">
							<div class="text-center">
								<div class="font-50"> <i class='bx bx-support'></i>
								</div>
								<h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
								<p class="text-capitalize">Friendly 24/7 customer support</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</section>
			<!--end support info-->
			<!--start News-->
			<!-- <section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Latest News</h5>
							<a href="blog.html" class="btn btn-dark ms-auto rounded-0">View All News<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="latest-news owl-carousel owl-theme">
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">FEB</div>
										</div>
										<a href="">
											<img src="assets/images/blogs/01.png" class="card-img-top border-bottom" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="">
													<h5 class="mb-3 text-capitalize">Blog Short Title</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="">
												<p class="mb-0"><small>0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">FEB</div>
										</div>
										<a href="">
											<img src="assets/images/blogs/02.png" class="card-img-top border-bottom" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="">
													<h5 class="mb-3 text-capitalize">Blog Short Title</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="">
												<p class="mb-0"><small>0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">FEB</div>
										</div>
										<a href="">
											<img src="assets/images/blogs/03.png" class="card-img-top border-bottom" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="">
													<h5 class="mb-3 text-capitalize">Blog Short Title</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="">
												<p class="mb-0"><small>0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">FEB</div>
										</div>
										<a href="">
											<img src="assets/images/blogs/04.png" class="card-img-top border-bottom" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="">
													<h5 class="mb-3 text-capitalize">Blog Short Title</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="">
												<p class="mb-0"><small>0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">FEB</div>
										</div>
										<a href="">
											<img src="assets/images/blogs/05.png" class="card-img-top border-bottom" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="">
													<h5 class="mb-3 text-capitalize">Blog Short Title</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="">
												<p class="mb-0"><small>0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="news-date">
											<div class="date-number">24</div>
											<div class="date-month">FEB</div>
										</div>
										<a href="">
											<img src="assets/images/blogs/06.png" class="card-img-top border-bottom" alt="...">
										</a>
										<div class="card-body">
											<div class="news-title">
												<a href="">
													<h5 class="mb-3 text-capitalize">Blog Short Title</h5>
												</a>
											</div>
											<p class="news-content mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean...</p>
										</div>
										<div class="card-footer border-top">
											<a href="">
												<p class="mb-0"><small>0 Comments</small>
												</p>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> -->
			<!--end News-->
			<!--start brands-->
			<section class="py-4">
				<div class="container">
					<h3 class="d-none">Brands</h3>
					<div class="brand-grid">
						<div class="brands-shops owl-carousel owl-theme border">
							<div class="item border-end">
								<div class="p-4">
									<a href="">
										<img src="assets/images/brands/01.png" class="img-fluid" alt="...">
									</a>
								</div>
							</div>
							<div class="item border-end">
								<div class="p-4">
									<a href="">
										<img src="assets/images/brands/02.png" class="img-fluid" alt="...">
									</a>
								</div>
							</div>
							<!-- <div class="item border-end">
									<div class="p-4">
										<a href="">
											<img src="assets/images/brands/03.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div> -->
							<div class="item border-end">
								<div class="p-4">
									<a href="">
										<img src="assets/images/brands/04.png" class="img-fluid" alt="...">
									</a>
								</div>
							</div>
							<div class="item border-end">
								<div class="p-4">
									<a href="">
										<img src="assets/images/brands/05.png" class="img-fluid" alt="...">
									</a>
								</div>
							</div>
							<div class="item border-end">
								<div class="p-4">
									<a href="">
										<img src="assets/images/brands/06.png" class="img-fluid" alt="...">
									</a>
								</div>
							</div>
							<div class="item border-end">
								<div class="p-4">
									<a href="">
										<img src="assets/images/brands/07.png" class="img-fluid" alt="...">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--end brands-->
			<!--start bottom products section-->
			
			<!--end bottom products section-->
		</div>
	</div>
	<!--end page wrapper -->
	<!--start footer section-->
	<div include-html="footer.html" id="footer_file"></div>
	<!--end footer section-->
	<!--start quick view product-->
	<!-- Modal -->
	<?php

	?>
	<div class="modal fade" id="QuickViewProduct<?php echo $product[$j]['Prod_id']; ?>">
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
								<h3 class="mt-3 mt-lg-0 mb-0"><?php echo $product[$j]['title']; ?></h3>
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
									<a href="" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
	</div>
	<?php

	?>
	<!--end quick view product-->
	<!--Start Back To Top Button--> <a href="" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/include-html.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/index.js"></script>
	<script>
		var b1 = document.getElementById("b1");
		var b2 = document.getElementById("b2");
		var b3 = document.getElementById("b3");
		var b4 = document.getElementById("b4");
		var b5 = document.getElementById("b5");
		document.getElementById("Trending").style.display = "block";
		document.getElementById("Mobile").style.display = "none";
		document.getElementById("Laptop").style.display = "none";
		document.getElementById("Headphones").style.display = "none";
		document.getElementById("Tablet").style.display = "none";
		b1.onclick = function() {
			b1.classList.add('btn-dark');
			b2.classList.remove('btn-dark');
			b3.classList.remove('btn-dark');
			b4.classList.remove('btn-dark');
			b5.classList.remove('btn-dark');
			document.getElementById("Trending").style.display = "block";
			document.getElementById("Mobile").style.display = "none";
			document.getElementById("Laptop").style.display = "none";
			document.getElementById("Headphones").style.display = "none";
			document.getElementById("Tablet").style.display = "none";
		}
		b2.onclick = function() {
			b1.classList.remove('btn-dark');
			b2.classList.add('btn-dark');
			b3.classList.remove('btn-dark');
			b4.classList.remove('btn-dark');
			b5.classList.remove('btn-dark');
			document.getElementById("Trending").style.display = "none";
			document.getElementById("Mobile").style.display = "block";
			document.getElementById("Laptop").style.display = "none";
			document.getElementById("Headphones").style.display = "none";
			document.getElementById("Tablet").style.display = "none";
		}
		b3.onclick = function() {
			b1.classList.remove('btn-dark');
			b2.classList.remove('btn-dark');
			b3.classList.add('btn-dark');
			b4.classList.remove('btn-dark');
			b5.classList.remove('btn-dark');
			document.getElementById("Trending").style.display = "none";
			document.getElementById("Mobile").style.display = "none";
			document.getElementById("Laptop").style.display = "block";
			document.getElementById("Headphones").style.display = "none";
			document.getElementById("Tablet").style.display = "none";
		}
		b4.onclick = function() {
			b1.classList.remove('btn-dark');
			b2.classList.remove('btn-dark');
			b3.classList.remove('btn-dark');
			b4.classList.add('btn-dark');
			b5.classList.remove('btn-dark');
			document.getElementById("Trending").style.display = "none";
			document.getElementById("Mobile").style.display = "none";
			document.getElementById("Laptop").style.display = "none";
			document.getElementById("Headphones").style.display = "block";
			document.getElementById("Tablet").style.display = "none";
		}
		b5.onclick = function() {
			b1.classList.remove('btn-dark');
			b2.classList.remove('btn-dark');
			b3.classList.remove('btn-dark');
			b4.classList.remove('btn-dark');
			b5.classList.add('btn-dark');
			document.getElementById("Trending").style.display = "none";
			document.getElementById("Mobile").style.display = "none";
			document.getElementById("Laptop").style.display = "none";
			document.getElementById("Headphones").style.display = "none";
			document.getElementById("Tablet").style.display = "block";
		}
		$(document).on("click", ".QuickViewProduct", function() {
			var product = $(this).data('id');
			$(".modal-body #bookId").val(product);
		});

		var cart1 = document.getElementById("cart1");
		// var button = document.getElementByTagName("button");
		function view(event) {
			windows.location.reload();
			event.target.innerHTML = "Added To Cart"
		}


		function wishlist(id, prod) {
			var element = document.getElementById(id);
			if (element.classList.contains("bx-heart")){
				element.classList.remove("bx-heart");
				element.classList.add("bxs-heart");
				$.get( "add_wishlist.php?Prod_id="+prod+"&c_id="+"<?php echo $_SESSION["u_id"] ?>", function( data ) {
					console.log(data);
				});

			}else{
				element.classList.remove("bxs-heart");
				element.classList.add("bx-heart");
				$.get( "./remove_wishlist.php?Prod_id="+prod+"&c_id="+"<?php echo $_SESSION["u_id"] ?>");

				
			}
		}
	
		// var x = document.getElementByClass("product-wishlist");
		// x.onclick = function(){
		// 	var b = document.getElementByTagName("i");
		// 	b.classList.remove('bx-heart');
		// 	b.classList.add('bxs-heart');
		// }
		// cart1.onclick = function(){
		// 	cart1.classList.remove("btn-dark");
		// 	cart1.classList.add("btn-ligth");
		// }

		// function view(event){
		// 	if(event.target.innerHTML = "Added Successfully"){
		// 		event.target.innerHTML = "Added Successfully";
		// 	}
		// 	else{
		// 		event.target.innerHTML = "Added Successfully";
		// 	}
		// }
	</script>
</body>

</html>
