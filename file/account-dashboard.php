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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>EcommerceWeb</title>
</head>

<body>

	<?php
	session_start();
	if (!isset($_SESSION["u_id"])) {
		header("location: login.php");
	}
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
						<h3 class="breadcrumb-title pe-4">My Orders</h3>
						<div class="ms-auto">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Account</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">My Orders</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!--end breadcrumb-->
			<!--start shop cart-->
			<section class="py-5 pe-7" style="height: 100%;">
				<div class="container">
					<h3 class="d-none">Account</h3>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3">
									<div class="card shadow-none mb-3 mb-lg-0 border rounded-0">
										<div class="card-body">
											<div class="list-group list-group-flush">
												<a href="#" class="list-group-item d-flex justify-content-between active align-items-center" onclick="dashboard(this)">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
												<a href="#" class="list-group-item d-flex justify-content-between align-items-center" onclick="order(this)">Orders <i class='bx bx-cart-alt fs-5'></i></a>
												<!-- <a href="#" class="list-group-item d-flex justify-content-between align-items-center" onclick="downloads(this)">Downloads <i class='bx bx-download fs-5'></i></a> -->
												<a href="#" class="list-group-item d-flex justify-content-between align-items-center" onclick="address(this)">Addresses <i class='bx bx-home-smile fs-5'></i></a>
											
												<a href="#" class="list-group-item d-flex justify-content-between align-items-center" onclick="account(this)">Account Details <i class='bx bx-user-circle fs-5'></i></a>
											
												<a href="logout.php" class="list-group-item d-flex justify-content-between align-items-center">Logout <i class='bx bx-log-out fs-5'></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-8" id="dashboard">
									<div class="card shadow-none mb-0">
										<div class="card-body">
											<p>Hello <strong><?php echo $_SESSION["ufirstname"] . " " . $_SESSION["ulastname"]  ?></strong> (not <strong><?php echo $_SESSION["ufirstname"] . " " . $_SESSION["ulastname"]  ?></strong> <a href="./logout.php">Logout</a>)</p>
											<p>From your account dashboard you can view your Recent Orders, manage your shipping addesses and edit your password and account details</p>
										</div>
									</div>
								</div>
								<div class="col-lg-9" id="order">
									<div class="card shadow-none mb-0">
										<div class="card-body">
											<div class="table-responsive">
												<div class="shop-cart-list mb-3 p-3">

													<?php
													include 'login.dbh.php';
													session_start();
													$user_id = $_SESSION['u_id'];
													$sql = "SELECT * FROM OrderDB WHERE c_id = '$user_id'";
													$result = mysqli_query($conn, $sql);
													$resultCheck = mysqli_num_rows($result);
													$total = 0;
													if ($resultCheck > 0) {
														while ($row = mysqli_fetch_assoc($result)) {
															$product_id = explode(";", $row['Prod_id']);
													?>
															<div class="card border shadow-none px-2 py-2">
																<?php
																for ($i = 0; $i < count($product_id)-1; $i++) {
																	$sa = $product_id[$i];
																	$sql2 = "SELECT * FROM productdb WHERE Prod_id = '$sa'";
																	$result2 = mysqli_query($conn, $sql2);
																	$row2 = mysqli_fetch_assoc($result2);
																	$product_name = $row2['product_name'];

																?>

																	<div class="row align-items-center g-3">
																		<div class="col-12 col-lg-7">
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


																				</div>
																			</div>
																		</div>

																		<div class="col-12 col-lg-5">
																			<div class="text-center">
																				<div class="d-flex gap-2 justify-content-center justify-content-lg-end">
																					<!-- Order Status Bootstrap card -->
																					<div class="card-body">
																						<p class="mb-0"> Status</p>
																						<p class="mb-0">
																							<span class="badge badge-success">
																								<?php echo $row["Order_status"]; ?>
																							</span>
																						</p>
																					</div>
																					<div class="card-body">
																						<p class="mb-0"> Order Id</p>
																						<p class="mb-0">
																							<span class="badge badge-success">
																								<?php echo strtoupper($row["invoice"]); ?>
																							</span>
																						</p>
																					</div>
																					<div class="card-body">
																						<p class="mb-0">Order Date</p>
																						<p class="mb-0">
																							<span class="badge badge-info">
																								<?php echo $row["Order_date"]; ?>
																							</span>
																						</p>

																					</div>
																				
																				</div>
																			</div>
																		</div>

																	</div>
																	<hr>
																<?php }  ?>
															</div>
															<div class="my-4 border-top"></div>

													<?php
														}
													} ?>

												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-8" id="download">
									<div class="card shadow-none mb-0">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th>Product</th>
															<th>Downloads Remaining</th>
															<th>Expires</th>
															<th>Download</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Stock Moview Clip</td>
															<td>12</td>
															<td>Novermber 15, 2021</td>
															<td>
																<div class="d-flex gap-2"> <a href="javascript:;" class="btn btn-dark btn-sm rounded-0">Movie Clip 1</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>Stock Moview Clip</td>
															<td>08</td>
															<td>Novermber 12, 2021</td>
															<td>
																<div class="d-flex gap-2"> <a href="javascript:;" class="btn btn-dark btn-sm rounded-0">Movie Clip 2</a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-8" id="address">
									<div class="card shadow-none mb-0">
										<div class="card-body">
											<h6 class="mb-4">The following addresses will be used on the checkuot page by default.</h6>
											<div class="row">
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
																	
																	</div>
																</div>
															</div>
														</div>
													</div>
													<?php }
														if ($address2 != NULL){
													?>
													<div class="col-md-6">
														<div class="bg-white card shadow-none mb-4 border">
															<div class="gold-members p-4">
																<div class="media">
																	<div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
																	<div class="media-body">
																		<h6 class="mb-1 text-secondary">Office</h6>
																		<p class="text-black"><?php 
																		$jsonData = rtrim($address2, "\0");
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
																	
																	</div>
																</div>
															</div>
														</div>
													</div>
													<?php }
														if ($address3 != NULL){
													?>
													<div class="col-md-6">
														<div class="bg-white card shadow-none mb-4 border">
															<div class="gold-members p-4">
																<div class="media">
																	<div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>
																	<div class="media-body">
																		<h6 class="mb-1 text-secondary">Home</h6>
																		<p class="text-black"><?php 
																		$jsonData = rtrim($address3, "\0");
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
								</div>

								<div class="border p-3 col-lg-8" id="edit">
									<h2 class="h5 mb-0">Billing Address</h2>
									<div class="my-3 border-bottom"></div>
									<div class="form-body">
										<form class="row g-3">
											<div class="col-md-6">
												<label class="form-label">First Name</label>
												<input type="text" class="form-control rounded-0">
											</div>
											<div class="col-md-6">
												<label class="form-label">Last Name</label>
												<input type="text" class="form-control rounded-0">
											</div>
											<div class="col-md-6">
												<label class="form-label">E-mail id</label>
												<input type="text" class="form-control rounded-0">
											</div>
											<div class="col-md-6">
												<label class="form-label">Phone Number</label>
												<input type="text" class="form-control rounded-0">
											</div>
											<div class="col-md-6">
												<label class="form-label">Company</label>
												<input type="text" class="form-control rounded-0">
											</div>
											<div class="col-md-6">
												<label class="form-label">State/Province</label>
												<select class="form-select rounded-0">
													<option>India</option>
													<option>Sri-lanka</option>
												</select>
											</div>
											<div class="col-md-6">
												<label class="form-label">Zip/Postal Code</label>
												<input type="text" class="form-control rounded-0">
											</div>
											<div class="col-md-6">
												<label class="form-label">Country</label>
												<select class="form-select rounded-0">
													<option>India</option>
													<option>China</option>
													<option>Turkey</option>
												</select>
											</div>
											<div class="col-md-6">
												<label class="form-label">Address 1</label>
												<textarea class="form-control rounded-0"></textarea>
											</div>
											<div class="col-md-6">
												<label class="form-label">Address 2</label>
												<textarea class="form-control rounded-0"></textarea>
											</div>
											<div class="col-12">
												<button type="button" class="btn btn-dark btn-ecomm">Edit Address</button>
											</div>
										</form>
									</div>
								</div>

								<div class="col-lg-8" id="payment">
									<div class="card shadow-none mb-0">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table">
													<thead class="table-light">
														<tr>
															<th>Method</th>
															<th>Expires</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Visa ending in 1111</td>
															<td>11/12</td>
															<td>
																<div class="d-flex gap-2"> <a href="javascript:;" class="btn btn-dark btn-sm rounded-0">Delete</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>Visa ending in 4242</td>
															<td>11/12</td>
															<td>
																<div class="d-flex gap-2"> <a href="javascript:;" class="btn btn-dark btn-sm rounded-0">Delete</a>
																	<a href="javascript:;" class="btn btn-dark btn-sm rounded-0">Make Default</a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div> <a href="javascript:;" class="btn btn-dark rounded-0">Add Payment Method</a>
										</div>
									</div>
								</div>

								<div class="col-lg-8" id="account">
									<div class="card shadow-none mb-0 border">
										<div class="card-body">
											<form class="row g-3">
												<div class="col-md-6">
													<label class="form-label">First Name</label>
													<input type="text" class="form-control" value="Mayur">
												</div>
												<div class="col-md-6">
													<label class="form-label">Last Name</label>
													<input type="text" class="form-control" value="Khadde">
												</div>
												<div class="col-12">
													<label class="form-label">Display Name</label>
													<input type="text" class="form-control" value="Mayur Khadde">
												</div>
												<div class="col-12">
													<label class="form-label">Email address</label>
													<input type="text" class="form-control" value="mayur.khadde@gmail.com">
												</div>
												<div class="col-12">
													<label class="form-label">Current Password</label>
													<input type="text" class="form-control" value="">
												</div>
												<div class="col-12">
													<label class="form-label">New Password</label>
													<input type="text" class="form-control" value="">
												</div>
												<div class="col-12">
													<label class="form-label">Confirm New Password</label>
													<input type="text" class="form-control" value="">
												</div>
												<div class="col-12">
													<button type="button" class="btn btn-dark btn-ecomm">Save Changes</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div class="col-lg-8" id="forgot">
									<div class="card shadow-none mb-0">
										<div class="card-body">
											<div class="p-4 rounded  border">
												<div class="text-center">
													<img src="assets/images/icons/forgot-2.png" width="120" alt="" />
												</div>
												<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
												<p class="">Enter your registered email ID to reset the password</p>
												<div class="my-4">
													<label class="form-label">Email id</label>
													<input type="text" class="form-control form-control-lg" placeholder="example@user.com" />
												</div>
												<div class="d-grid gap-2">
													<button type="button" class="btn btn-dark btn-lg">Send</button> <a href="authentication-signin.html" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
												</div>
											</div>
										</div>
									</div>
								</div>


							</div>
							<!--end row-->
						</div>
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>
	<script src="assets/js/include-html.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>
<script>
	document.getElementById("dashboard").style.display = "block";
	document.getElementById("order").style.display = "none";
	document.getElementById("download").style.display = "none";
	document.getElementById("address").style.display = "none";
	document.getElementById("payment").style.display = "none";
	document.getElementById("account").style.display = "none";
	document.getElementById("forgot").style.display = "none";
	document.getElementById("edit").style.display = "none";

	function dashboard(elem) {
		document.getElementById("dashboard").style.display = "block";
		document.getElementById("order").style.display = "none";
		document.getElementById("download").style.display = "none";
		document.getElementById("address").style.display = "none";
		document.getElementById("payment").style.display = "none";
		document.getElementById("account").style.display = "none";
		document.getElementById("forgot").style.display = "none";
		document.getElementById("edit").style.display = "none";

		var a = document.getElementsByTagName('a');
		for (i = 0; i < a.length; i++) {
			a[i].classList.remove('active');
		}
		elem.classList.add('active');
	}

	function order(elem) {
		document.getElementById("dashboard").style.display = "none";
		document.getElementById("order").style.display = "block";
		document.getElementById("download").style.display = "none";
		document.getElementById("address").style.display = "none";
		document.getElementById("payment").style.display = "none";
		document.getElementById("account").style.display = "none";
		document.getElementById("forgot").style.display = "none";
		document.getElementById("edit").style.display = "none";

		var b = document.getElementsByTagName('a');
		for (i = 0; i < b.length; i++) {
			b[i].classList.remove('active');
		}
		elem.classList.add('active');
	}

	function downloads(elem) {
		document.getElementById("dashboard").style.display = "none";
		document.getElementById("order").style.display = "none";
		document.getElementById("download").style.display = "block";
		document.getElementById("address").style.display = "none";
		document.getElementById("payment").style.display = "none";
		document.getElementById("account").style.display = "none";
		document.getElementById("forgot").style.display = "none";
		document.getElementById("edit").style.display = "none";
		var c = document.getElementsByTagName('a');
		for (i = 0; i < c.length; i++) {
			c[i].classList.remove('active');
		}
		elem.classList.add('active');
	}

	function address(elem) {
		document.getElementById("dashboard").style.display = "none";
		document.getElementById("order").style.display = "none";
		document.getElementById("download").style.display = "none";
		document.getElementById("address").style.display = "block";
		document.getElementById("payment").style.display = "none";
		document.getElementById("account").style.display = "none";
		document.getElementById("forgot").style.display = "none";
		document.getElementById("edit").style.display = "none";
		var d = document.getElementsByTagName('a');
		for (i = 0; i < d.length; i++) {
			d[i].classList.remove('active');
		}
		elem.classList.add('active');
	}

	function payment(elem) {
		document.getElementById("dashboard").style.display = "none";
		document.getElementById("order").style.display = "none";
		document.getElementById("download").style.display = "none";
		document.getElementById("address").style.display = "none";
		document.getElementById("payment").style.display = "block";
		document.getElementById("account").style.display = "none";
		document.getElementById("forgot").style.display = "none";
		document.getElementById("edit").style.display = "none";
		var e = document.getElementsByTagName('a');
		for (i = 0; i < e.length; i++) {
			e[i].classList.remove('active');
		}
		elem.classList.add('active');
	}

	function account(elem) {
		document.getElementById("dashboard").style.display = "none";
		document.getElementById("order").style.display = "none";
		document.getElementById("download").style.display = "none";
		document.getElementById("address").style.display = "none";
		document.getElementById("payment").style.display = "none";
		document.getElementById("account").style.display = "block";
		document.getElementById("forgot").style.display = "none";
		document.getElementById("edit").style.display = "none";
		var e = document.getElementsByTagName('a');
		for (i = 0; i < e.length; i++) {
			e[i].classList.remove('active');
		}
		elem.classList.add('active');
	}

	function forgot(elem) {
		document.getElementById("dashboard").style.display = "none";
		document.getElementById("order").style.display = "none";
		document.getElementById("download").style.display = "none";
		document.getElementById("address").style.display = "none";
		document.getElementById("payment").style.display = "none";
		document.getElementById("account").style.display = "none";
		document.getElementById("forgot").style.display = "block";
		document.getElementById("edit").style.display = "none";
		var f = document.getElementsByTagName('a');
		for (i = 0; i < f.length; i++) {
			f[i].classList.remove('active');
		}
		elem.classList.add('active');
	}

	function edit_address(elem) {
		document.getElementById("dashboard").style.display = "none";
		document.getElementById("order").style.display = "none";
		document.getElementById("download").style.display = "none";
		document.getElementById("address").style.display = "none";
		document.getElementById("payment").style.display = "none";
		document.getElementById("account").style.display = "none";
		document.getElementById("forgot").style.display = "none";
		document.getElementById("edit").style.display = "block";
		var f = document.getElementsByTagName('a');
		for (i = 0; i < f.length; i++) {
			f[i].classList.remove('active');
		}
		elem.classList.add('active');
	}
</script>

</html>