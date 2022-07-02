<!doctype html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://accounts.google.com/gsi/client" async defer></script>

	<!-- Bootstrap Css -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
	.bg-custom-1 {
		background-color: #85144b;
	}

	.bg-custom-2 {
		background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
	}
</style>

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
	<b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">
		<!--start top header wrapper-->
		<div class="header-wrapper">
			<!-- <div class="top-menu border-bottom">
				<div class="container">
					<nav class="navbar navbar-expand">
						<div class="shiping-title text-uppercase font-13 d-none d-sm-flex">Welcome to our store!</div>
						<ul class="navbar-nav ms-auto d-none d-lg-flex">
							<li class="nav-item"> <a class="nav-link" href="order-tracking.html">Track</a>
							</li>
							<li class="nav-item"> <a class="nav-link" href="about-us.html">About</a>
							</li>
							<li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Stores</a>
							</li>
							<li class="nav-item">	<a class="nav-link" href="contact-us.html">Contact</a>
							</li>
							<li class="nav-item">	<a class="nav-link" href="javascript:;">Help & FAQs</a>
							</li>
						</ul>
					</nav>
				</div>
			</div> -->
			<?php
			?>
				<div id="g_id_onload" data-client_id="438943076807-seaq0aed036lr76i76nq5ohc88jn9sd6.apps.googleusercontent.com" data-context="signin" data-login_uri="http://localhost:3456/googleauth.php" data-auto_select="true">
				</div>
			<?php
			?>
			<div class="header-content pb-3 pb-md-0">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-4 col-md-auto">
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
						</div>


						<div class="col col-md order-4 order-md-2">
							<form action="./searchres.php" method="get">
								<div class="input-group flex-nowrap px-xl-4">

									<input type="text" name="term" id="term" placeholder="search here...." class="form-control">
									<input type="submit" class="btn btn-ecomm btn-dark" value="Submit">
								</div>
							</form>
						</div>

						<script type="text/javascript">
							$(function() {
								$("#term").autocomplete({
									source: 'searchs.php',
								});
							});
						</script>
						<?php
						if ($firstname == NULL && $lastname == NULL) {
						?>


							<div class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
								<div class="fs-1 text-white"><i class='bx bx-headphone'></i>
								</div>
								<div class="ms-2">
									<a href="authentication-signin.php" class="btn btn-dark btn-ecomm">Sign In</a>
									<a href="authentication-signup.php" class="btn btn-dark btn-ecomm">Sign Up</a>
								</div>
							</div>
						<?php
						} else {
						?>
							<div class="col-4 col-md-auto order-2 order-md-4">
								<div class="top-cart-icons float-end">
									<nav class="navbar navbar-expand">
										<ul class="navbar-nav ms-auto">

											<li class="nav-item"><a href="wishlist.html" class="nav-link cart-link"><i class='bx bx-heart'></i></a>
											</li>
											<li class="nav-item dropdown dropdown-large">


												<?php
												// function cart_exists($conn, $user_id) {
												// 	require_once "login.dbh.php";
												// 	$error = "";
												// 	$Product="";
												// 	$sql = "SELECT Prod_id FROM cart WHERE U_id = ?;";
												// 	$smt = mysqli_stmt_init($conn);
												// 	if(!mysqli_stmt_prepare($smt, $sql)){
												// 		$error .= "Error in STMT";
												// 		exit();
												// 	}
												// 	$c = 0;
												// 	mysqli_stmt_bind_param($smt, "i", $user_id);
												// 	mysqli_stmt_execute($smt);
												// 	$resultData = mysqli_stmt_get_result($smt);
												// 	while($row = mysqli_fetch_assoc($resultData)) {
												// 		$prod[$c]= $row;
												// 		$Product = $prod;
												// 		$c++;
												// 	}
												// }
												require_once "login.dbh.php";
												require_once "function.php";
												$product = array();
												$Prod = "";
												$row = "";
												$sql = "SELECT Prod_id,quantity FROM cart WHERE U_id = $user_id";
												$smt = mysqli_stmt_init($conn);
												if (!mysqli_stmt_prepare($smt, $sql)) {
													echo "Output not show";
													exit();
												}
												$i = 0;
												mysqli_stmt_execute($smt);
												$resultData = mysqli_stmt_get_result($smt);
												$num_rows = mysqli_num_rows($resultData);
												$quantities = array();

												while ($row = mysqli_fetch_assoc($resultData)) {
													$product[$i] = $row;
													$quantities[$i] = $row['quantity'];

													$Prod = $product;
													$i++;
												}
												$productdb = array();
												for ($j = 0; $j < $num_rows; $j++) {
													$id = $Prod[$j]['Prod_id'];
													$sql = "SELECT * FROM productdb WHERE Prod_id = $id";
													$smt = mysqli_stmt_init($conn);
													if (!mysqli_stmt_prepare($smt, $sql)) {
														echo "Output not show";
														exit();
													}
													mysqli_stmt_execute($smt);
													$resultData = mysqli_stmt_get_result($smt);
													$num_rows1 = mysqli_num_rows($resultData);
													while ($row = mysqli_fetch_assoc($resultData)) {
														$productdb[$j] = $row;
													}
												}
												// $a = cart_exists($conn, $user_id);
												// print_r($a);
												?>
												<a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown"> <span class="alert-count">
														<?php
														echo $num_rows;
														?>
													</span>
													<i class='bx bx-shopping-bag'></i>
												</a>
												<div class="dropdown-menu dropdown-menu-end">
													<a href="./cart-up.php">
														<div class="cart-header">
															<p class="cart-header-title mb-0"><?php echo $num_rows; ?> ITEMS</p>
															<p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
														</div>
													</a>
													<?php
													for ($s = 0; $s < $num_rows; $s++) {
													?>
														<div class="cart-list">
															<a class="dropdown-item" href="javascript:;">
																<div class="d-flex align-items-center">
																	<div class="position-relative " style="margin-right:15px">

																		<div class="cart-product">
																			<?php
																			$temp = $productdb[$s]['image_loc'];
																			$img = explode('&', $temp);
																			?>
																			<img src="<?php echo $img[0]; ?>" class="" alt="...">
																		</div>
																	</div>
																	<div class="flex-grow-1 ">
																		<div class="text-wrap">

																			<h6 class="cart-product-title"><?php echo $productdb[$s]['title'] . "&nbsp;&nbsp;";  ?></h6>
																		</div>
																		<p class="cart-product-price">
																			Quantity : <?php echo $quantities[$s];  ?>
																		</p>
																		<p class="cart-product-price">

																			<?php echo "Rs. ", $productdb[$s]['price']; ?></p>
																	</div>

																</div>
															</a>
														</div>
													<?php
													}
													?>
													<a href=":;">
														<div class="text-center cart-footer d-flex align-items-center">
															<h5 class="mb-0">Grand Total : </h5>



															<p class="mb-0 ms-auto" style="">Rs. <del>
																	<?php $total = 0;
																	for ($i = 0; $i < $num_rows; $i++) {
																		$total += $productdb[$i]['mrp_price'] * $quantities[$i];
																	}
																	echo $total; ?>
																</del>

															</p>
															<h5 class="mb-0 " style="color: green"> Rs.
																<?php $total = 0;
																for ($i = 0; $i < $num_rows; $i++) {
																	$total += $productdb[$i]['price'] * $quantities[$i];
																}
																echo $total; ?>

															</h5>
														</div>
													</a>
													<div class="d-grid p-3 border-top"> <a href="./cart-up.php" class="btn btn-dark btn-ecomm">CHECKOUT</a>
													</div>
													<!-- <a class="dropdown-item" href="javascript:;">
																		<div class="d-flex align-items-center">
																			<div class="flex-grow-1">
																				<h6 class="cart-product-title">Wireless Headphone</h6>
																				<p class="cart-product-price">1 X Rs. 2900.00</p>
																			</div>
																			<div class="position-relative">
																				<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																				</div>
																				<div class="cart-product">
																					<img src="assets/images/products/10.png" class="" alt="product image">
																				</div>
																			</div>
																		</div>
																	</a>
																	<a class="dropdown-item" href="javascript:;">
																		<div class="d-flex align-items-center">
																			<div class="flex-grow-1">
																				<h6 class="cart-product-title">Smart Phone</h6>
																				<p class="cart-product-price">1 X Rs. 2900.00</p>
																			</div>
																			<div class="position-relative">
																				<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																				</div>
																				<div class="cart-product">
																					<img src="assets/images/products/30.png" class="" alt="product image">
																				</div>
																			</div>
																		</div>
																	</a>
																	<a class="dropdown-item" href="javascript:;">
																		<div class="d-flex align-items-center">
																			<div class="flex-grow-1">
																				<h6 class="cart-product-title">Portable Laptop</h6>
																				<p class="cart-product-price">1 X Rs. 2900.00</p>
																			</div>
																			<div class="position-relative">
																				<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																				</div>
																				<div class="cart-product">
																					<img src="assets/images/products/29.png" class="" alt="product image">
																				</div>
																			</div>
																		</div>
																	</a>
																	<a class="dropdown-item" href="javascript:;">
																		<div class="d-flex align-items-center">
																			<div class="flex-grow-1">
																				<h6 class="cart-product-title">BootBall</h6>
																				<p class="cart-product-price">1 X Rs. 2900.00</p>
																			</div>
																			<div class="position-relative">
																				<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																				</div>
																				<div class="cart-product">
																					<img src="assets/images/products/13.png" class="" alt="product image">
																				</div>
																			</div>
																		</div>
																	</a>
																	<a class="dropdown-item" href="javascript:;">
																		<div class="d-flex align-items-center">
																			<div class="flex-grow-1">
																				<h6 class="cart-product-title">Electric Cycle</h6>
																				<p class="cart-product-price">1 X Rs. 2900.00</p>
																			</div>
																			<div class="position-relative">
																				<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																				</div>
																				<div class="cart-product">
																					<img src="assets/images/products/15.png" class="" alt="product image">
																				</div>
																			</div>
																		</div>
																	</a>
																	<a class="dropdown-item" href="javascript:;">
																		<div class="d-flex align-items-center">
																			<div class="flex-grow-1">
																				<h6 class="cart-product-title">Smart Phone</h6>
																				<p class="cart-product-price">1 X Rs. 2900.00</p>
																			</div>
																			<div class="position-relative">
																				<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																				</div>
																				<div class="cart-product">
																					<img src="assets/images/products/28.png" class="" alt="product image">
																				</div>
																			</div>
																		</div>
																	</a>
																	<a class="dropdown-item" href="javascript:;">
																		<div class="d-flex align-items-center">
																			<div class="flex-grow-1">
																				<h6 class="cart-product-title">Smart Phone</h6>
																				<p class="cart-product-price">1 X Rs. 2900.00</p>
																			</div>
																			<div class="position-relative">
																				<div class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
																				</div>
																				<div class="cart-product">
																					<img src="assets/images/products/25.png" class="" alt="product image">
																				</div>
																			</div>
																		</div>
																	</a> -->
												</div>
											</li>
											<li class="nav-item">

												<ul class="nav navbar-nav ms-auto">
													<li class="nav-item dropdown">
														<a href="#" class="nav-link dropdown-toggle  cart-link" data-bs-toggle="dropdown" style="font-size:20px; margin-top: 2px; margin-left: 10px">

															<img src="<?php echo $_SESSION["uimg_url"] ?>" alt="Avatar" class="avatar shadow" style=" border: 2px solid #000">
															<?php echo $_SESSION["ufirstname"] . " " . $_SESSION["ulastname"]; ?>
														</a>
														<div class="dropdown-menu dropdown-menu-end">
															<a href="Profile.html" class="dropdown-item">
																<h6>Profile</h6>
															</a>
															<a href="#" class="dropdown-item">
																<h6>Order</h6>
															</a>
															<a href="order-tracking.html" class="dropdown-item">
																<h6>Track Order</h6>
															</a>
															<div class="d-grid p-1 border-top"> <a href="./logout.php" class="btn btn-dark btn-ecomm">Logout</a>
															</div>
														</div>
													</li>
												</ul>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						<?php
						}
						?>
					</div>
					<!--end row-->
				</div>
			</div>
			</form>
			<div class="primary-menu border-top">
				<div class="container">
					<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
						<div class="offcanvas-header">
							<button class="btn-close float-end"></button>
							<h5 class="py-2">Navigation</h5>
						</div>
						<ul class="navbar-nav">
							<li class="nav-item active"> <a class="nav-link" href="index.php">Home </a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Categories <i class='bx bx-chevron-down'></i></a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" name="mobile" href="searchres.php?term=phone">Mobiles</a>
									</li>
									<li><a class="dropdown-item" name="laptop" href="searchres.php?term=laptop">Laptops</a>
									</li>
									<li><a class="dropdown-item" name="Smart Watch" href="searchres.php?term=smart_watch">Smart Watch</a>
									</li>
									<li><a class="dropdown-item" name="Tablet" href="searchres.php?term=tablet">Tablet</a>
									</li>
									<li><a class="dropdown-item" name="Televisions" href="searchres.php?term=television">Televisions</a>
									</li>
									<li><a class="dropdown-item" name="Camera" href="searchres.php?term=camera">Camera</a>
									</li>
									<li><a class="dropdown-item" name="PC Monitors" href="searchres.php?term=pc">PC Peripherals</a>
									</li>
								</ul>
							</li>

							<li class="nav-item"> <a class="nav-link" href="about-us.html">About Us </a>
							</li>
							<li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact Us </a>
							</li>
							<li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Store</a>
							</li>
							<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account <i class='bx bx-chevron-down'></i></a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="account-dashboard.html">Dashboard</a>
									</li>
									<li><a class="dropdown-item" href="account-dashboard.html">Orders</a>
									</li>
									<li><a class="dropdown-item" href="account-dashboard.html">Address</a>
									</li>
									<li><a class="dropdown-item" href="account-dashboard.html">Payment Details</a>
									</li>
									<li><a class="dropdown-item" href="account-dashboard.html">Account Details</a>
									</li>
									<li><a class="dropdown-item" href="account-dashboard.html">Forgot Password</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--plugins-->
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>