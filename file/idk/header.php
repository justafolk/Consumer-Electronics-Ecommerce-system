<!doctype html>
<html lang="en">
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
		if(isset($_POST['submit'])){
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
			<div class="header-content pb-3 pb-md-0">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-4 col-md-auto">
							<div class="d-flex align-items-center">
								<div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
								</div>
								<div class="logo d-none d-lg-flex">
									<a href="index.html">
										<div class="ms-2">
											<h6 class="mb-0">eCommerce Web.</h6>
											<h5 class="mb-0">Client Site</h5>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col col-md order-4 order-md-2">
						<form action="header.php" method="post">
								<div class="input-group flex-nowrap px-xl-4">
									<input type="text" name="search" class="form-control w-100" placeholder="Search for Products">
									<select class="form-select flex-shrink-0" aria-label="Default select example" style="width: 10.5rem;">
										<option selected>All Categories</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
									<button type="submit" name="submit" class="input-group-text cursor-pointer bg-transparent"><i class='bx bx-search'></i></button>
								</div>
							</div>
						</form>
						<?php
								if($firstname == NULL && $lastname == NULL){
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
								}
								else
								{
									?>
										<div class="col-4 col-md-auto order-2 order-md-4">
											<div class="top-cart-icons float-end">
												<nav class="navbar navbar-expand">
													<ul class="navbar-nav ms-auto">
														<li class="nav-item">
															
															<ul class="nav navbar-nav ms-auto">
																<li class="nav-item dropdown">
																	<a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret cart-link" data-bs-toggle="dropdown">
																		<i class='bx bx-user'></i>
																	</a>
																	<div class="dropdown-menu dropdown-menu-end">
																		<a href="Profile.html" class="dropdown-item"><h6>Profile</h6></a>
																		<a href="#" class="dropdown-item"><h6>Order</h6></a>
																		<a href="order-tracking.html" class="dropdown-item"><h6>Track Order</h6></a>
																		<div class="d-grid p-1 border-top">	<a href="" class="btn btn-dark btn-ecomm">Logout</a>
																		</div>
																	</div>
																</li>
															</ul>
														</li>
														<li class="nav-item"><a href="wishlist.html" class="nav-link cart-link"><i class='bx bx-heart'></i></a>
														</li>
														<li class="nav-item dropdown dropdown-large" >
															<a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown">	<span class="alert-count">8</span>
																<i class='bx bx-shopping-bag'></i>
															</a>
															<div class="dropdown-menu dropdown-menu-end" >
																<a href="javascript:;">
																	<div class="cart-header">
																		<p class="cart-header-title mb-0">8 ITEMS</p>
																		<p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
																	</div>
																</a>
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
									<li><a class="dropdown-item" name="mobile" href="categories.php?id=Mobiles">Mobiles</a>
									</li>
									<li><a class="dropdown-item" name="laptop" href="categories.php?id=Laptops">Laptops</a>
									</li>
									<li><a class="dropdown-item" name="Smart Watch" href="categories.php?id=Smart_Watch">Smart Watch</a>
									</li>
									<li><a class="dropdown-item" name="Tablet" href="categories.php?id=Galaxy_phone">Tablet</a>
									</li>
									<li><a class="dropdown-item" name="Televisions" href="categories.php?id=Televisions">Televisions</a>
									</li>
									<li><a class="dropdown-item" name="Camera" href="categories.php?id=Camera">Camera</a>
									</li>
									<li><a class="dropdown-item" name="PC Monitors" href="categories.php?id=Monitors">PC Monitors</a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">Shop  <i class='bx bx-chevron-down'></i></a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="shop-list-left-sidebar.html">Shop List</a></li>
									<!-- <a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#">Shop List<i class='bx bx-chevron-right float-end'></i></a> -->
										<!-- <ul class="submenu dropdown-menu">
											<li><a class="dropdown-item" href="shop-list-left-sidebar.html">Shop List - Left Sidebar</a>
											</li>
											<li><a class="dropdown-item" href="shop-list-right-sidebar.html">Shop List - Right Sidebar</a>
											</li>
											<li><a class="dropdown-item" href="shop-list-filter-on-top.html">Shop List - Top Filter</a>
											</li>
										</ul> -->
									
									<li><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#">Shop Pages <i class='bx bx-chevron-right float-end'></i></a>
										<ul class="submenu dropdown-menu">
											<li><a class="dropdown-item" href="shop-cart.html">Shop Cart</a>
											</li>
											<li><a class="dropdown-item" href="shop-categories.html">Shop Categories</a>
											</li>
											<li><a class="dropdown-item" href="order-tracking.html">Order Tracking</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="nav-item"> <a class="nav-link" href="about-us.html">About Us </a> 
							</li>
							<li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact Us </a> 
							</li>
							<li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Store</a> 
							</li>
							<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account  <i class='bx bx-chevron-down'></i></a>
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
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>