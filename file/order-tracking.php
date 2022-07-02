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
		<!--end top header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Tracking</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
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
						<h6 class="mb-0">Order ID: OD45345345435</h6>
						<hr>	
						<div class="checkout-payment">
							<div class="card bg-transparent rounded-0 shadow-none">
								<div class="card-body">
									<div class="steps steps-light">
										<a class="step-item active" href="javascript:;">
											<div class="step-progress"><span class="step-count"><i class='bx bx-check'></i></span>
										</div>
											<div class="step-label">Order confirmed</div>
										</a>
										<a class="step-item active" href="javascript:;">
											<div class="step-progress"><span class="step-count"><i class='bx bx-user-circle' ></i></span>
											</div>
											<div class="step-label">Picked by courier</div>
										</a>
										<a class="step-item" href="javascript:;">
											<div class="step-progress"><span class="step-count"><i class='bx bx-car'></i></span>
											</div>
											<div class="step-label">On the way</div>
										</a>
										<a class="step-item" href="javascript:;">
											<div class="step-progress"><span class="step-count"><i class='bx bx-planet'></i></span>
											</div>
											<div class="step-label">Ready for pickup</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-md-4">
								<h5 class="">Billing Address:</h5>
								<h4 class=""><?php 
								session_start();
								echo $_SESSION["ufirstname"]." ".$_SESSION["ulastname"] ?></h4>
								<?php 
								include "./login.dbh.php";
								$st = "select * from OrderDB where order_id = '".$_GET["orderid"]."'";
								$result = mysqli_query($conn,$st);
								if (!$result){
									echo mysqli_error($conn);
								}
								$row = mysqli_fetch_assoc($result);
								$ad = $row["address"];
								$user_id = $_SESSION["u_id"];
								$sql = "SELECT address$ad FROM user WHERE id = '$user_id'";
								$s = mysqli_query($conn, $sql);
								$row = mysqli_fetch_array($s);
								$address1 = $row["address$ad"];
								$jsonData = rtrim($address1, "\0");
								$address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
								echo $address_f["fname"] . " " . $address_f["lname"] . "<br>";
								echo $address_f["address1"] . "<br>";
								echo $address_f["address2"];
								echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
								echo $address_f["state"] . "<br>";
								echo $address_f["phoneno"] . "<br>";
								$json_string = stripslashes(html_entity_decode($address1));
								echo json_decode($json_string, true);

								?>
							</div>
							<div class="col-md-4">
								<h5>
									Payment Details:
								</h5>
								<table class="table-borderless" style="width:100% ;">
									<tbody>
										<tr>
											<th>Payment Method</th>
											<td><?php echo $_POST["mode"] ?></td>
										</tr>
										<tr>
											<th>Paid Amount</th>
											<td>Rs. <?php echo $_POST["amount"] ?>   /-</td>
										</tr>
										<tr>
											<th>Payment Status</th>
											<td style="color:green"><?php echo $_POST["status"] ?></td>
										</tr>
										<tr>
											<th>Order Status</th>
											<td>Confirmed</td>
										</tr>
										<tr>
											<th>Method ID:</th>
											<td><?php echo $_POST["field1"] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-3 " style="margin-bottom: 10px ;" >
								<h5>Total Savings :</h5>
								<h4 style="color: green;">₹ 
								<?php 
									include './login.dbh.php';
									$sql = "SELECT * FROM cart where coupon_text=".$_POST["udf1"];
									$result = mysqli_query($conn, $sql);
									$row = mysqli_fetch_array($result);
									$percent = $row["discount"];
								echo $_POST["amount"]; 
								
								?> /-</h4>
								<h5>Total Amount :</h5>
								<h4>₹ <?php echo $_POST["amount"]+$_POST["amount"]*($percent/100)  ?>/-</h4>

							</div>
							
							<div class="card-body">
								<hr>
								<h5>Order Summary</h5>
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
						<div class="card rounded-0 border bg-transparent  shadow-none">
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
						<div class="row row-cols-1 row-cols-lg-4 rounded-4 gx-3 m-0 border">
							<div class="col p-4 text-center border-end">
								<h6 class="mb-1">Estimated Delivery time:</h6>
								<p class="mb-0">24 Apr 2021</p>
							</div>
							<div class="col p-4 text-center border-end">
								<h6 class="mb-1">Shipping BY:</h6>
								<p class="mb-0">BLUEDART | +91-9910XXXX</p>
							</div>
							<div class="col p-4 text-center border-end">
								<h6 class="mb-1">Status:</h6>
								<p class="mb-0">Picked by the courier</p>
							</div>
							<div class="col p-4 text-center">
								<h6 class="mb-1">Tracking #:</h6>
								<p class="mb-0">BD045903594059</p>
							</div>
						</div>
						<!--end row-->
						<div class="mt-3"></div>
					
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