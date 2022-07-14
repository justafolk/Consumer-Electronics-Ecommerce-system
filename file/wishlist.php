<!doctype html>
<html lang="en">
<?php session_start() ?>

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
	<!--end top header wrapper-->
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
			<!--start breadcrumb-->
			<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
				<div class="container">
					<div class="page-breadcrumb d-flex align-items-center">
						<h3 class="breadcrumb-title pe-3">Wishlist </h3>
						<div class="ms-auto">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
									</li>
									<li class="breadcrumb-item active"><a href="javascript:;">Wishlist</a>
									</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!--end breadcrumb-->
			<!--start Featured product-->
			<section class="py-4">
				<div class="container">
					<div class="product-grid">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3">
							<?php
							include "./login.dbh.php";
							$c_id = $_SESSION["u_id"];
							$sql = "SELECT * FROM wishlist WHERE U_id = '$c_id'";
							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result)) {
								$product_id = $row['Prod_id'];
								$sql2 = "SELECT * FROM productdb WHERE Prod_id = '$product_id'";
								$result2 = mysqli_query($conn, $sql2);
								$row2 = mysqli_fetch_assoc($result2);
								$product_name = $row2['product_name'];
							?>
								<div class="col">
									<div class="card rounded-0 product-card">

										<a href="product-details.html">
											<img src="<?php echo explode("&", $row2["image_loc"])[0]; ?>" style="width: 100%" alt="">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1"><?php echo $row2["category"] ?></p>
												</a>
												<a href="javascript:;">
													<h6 class="mb-2"><?php echo $row2["title"]; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">Rs. <?php echo number_format($row2["mrp_price"]) ?></span>
														<span class="text fs-5 " style="color: green" >Rs. <?php echo number_format($row2["price"]) ?></span>
													</div>
													<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-white"></i>
														<?php
														$sql3 = "SELECT AVG(ratings) as avgop FROM review WHERE Prod_id = '$product_id'";
														$result3 = mysqli_query($conn, $sql3);
														$row3 = mysqli_fetch_assoc($result3);
														for ($i=0; $i < $row3["avgop"] ; $i++) { 
															# code...
															?>
														<i class="bx bxs-star text-light-4"></i>
															<?php
														}
?>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">

														<button id="cart1" type="button" name="addtocart" onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $row2['Prod_id']; ?> '" class="btn btn-dark btn-ecomm"><i class='bx bxs-cart'></i>Add to Cart</button>
														<a href="remove_wishlist.php?Prod_id=<?php echo $row2['Prod_id']; ?>&c_id=<?php echo $_SESSION["u_id"] ?>" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target=""><i class='bx bxs-remove'></i>Remove from wishlist</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<!--end row-->
					</div>
				</div>
			</section>
			<!--end Featured product-->
		</div>
	</div>
	<!--end page wrapper -->
	<!--start footer section-->
	<div include-html="footer.html" id="footer_file"></div>
	<!--end footer section-->
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