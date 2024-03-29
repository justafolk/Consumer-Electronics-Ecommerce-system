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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<title>EcommerceWeb</title>
</head>

<body>


	<?php
	require_once "function.php";
	require_once "login.dbh.php";
	$result = "";
	if (isset($_POST['username'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['username'];

		// $phone_number = $_POST['Phone_number'];
		if ($_POST['Phone_number'] == "") {
			$phone_number = "NULL";
		}
		$phone_number = $_POST['Phone_number'];
		$sql = "SELECT * FROM user WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('Email already exists');</script>";
			header("location: ./authentication-signin.php");

		} else {
			$password = $_POST['password'];
			$password = password_hash($password, PASSWORD_DEFAULT);
			$img = "https://ui-avatars.com/api/name=".$firstname." ".$lastname."?rounded=true";
			$sql = "INSERT INTO user (firstname, lastname, email, password1, phone_number, img_url) VALUES ('$firstname', '$lastname', '$email', '$password', '$phone_number', '$img' )";
			if ($row = mysqli_query($conn, $sql)) {
				echo "<script>alert('Successfully registered');</script>";
				// session_start();
				// $_SESSION["uemail"] = $row['email'];
				// $_SESSION["ufirstname"] = $row["firstname"];
				// $_SESSION["ulastname"] = $row["lastname"];
				// $_SESSION["u_id"] = $row["id"];
				// $_SESSION["uimg_url"] = "https://ui-avatars.com/api/name=".$row["firstname"]."+".$row["lastname"]."?rounded=true";
				// print_r($_SESSION);
				header("location: ./authentication-signin.php");
			} else {
				echo mysqli_error($conn);
				echo "<script>alert('".mysqli_error($conn)."');</script>";
			}
		}
	}
	?>


	<script type="module" src="./newfire.js"></script>

	<div include-html="header.php" id="header_file"></div>
	<!--end top header wrapper-->
	<!--start page wrapper -->


	<div class="page-wrapper">
		<div class="page-content">
			<!--start breadcrumb-->
			<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
				<div class="container">
					<div class="page-breadcrumb d-flex align-items-center">
						<h3 class="breadcrumb-title pe-3">Sign Up</h3>
						<div class="ms-auto">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
									</li>
									<li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Sign Up</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<!--end breadcrumb-->
			<!--start shop cart-->
			<section class="py-0 py-lg-5">
				<div class="container">
					<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
						<div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
							<div class="col mx-auto">
								<div class="card mb-0">
									<div class="text-center">
										<h5><?php echo $result; ?></h5>
									</div>
									<div class="card-body">

										<div class="border p-4 rounded">
											<div class="text-center">
												<h3 class="">Sign Up</h3>
												<p>Already have an account? <a href="authentication-signin.html">Sign in here</a>
												</p>
											</div>
											<div class="d-grid" name="googlesign" id="googlesign">
												<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
														<img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
														<span>Sign Up with Google</span>
													</span>
												</a>
											</div>


											<div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
												<hr />
											</div>
											<div class="form-body">
												<form class="row g-3" action="" method="post" id="signupform">
													<div class="col-sm-6">
														<label for="inputFirstName" class="form-label">First Name</label>
														<input type="text" class="form-control" id="inputFirstName" name="firstname" placeholder="Mayur" required>
													</div>
													<div class="col-sm-6">
														<label for="inputLastName" class="form-label">Last Name</label>
														<input type="text" class="form-control" id="inputLastName" placeholder="Khadde" name="lastname" required>
													</div>
													<div class="col-12">
														<label for="username" class="form-label">Email Address</label>
														<input type="email" class="form-control" id="username" placeholder="example@user.com" name="username" required>
													</div>
													<div class="col-12">
														<label for="Phone number" class="form-label">Phone Number</label>
														<input type="tel" class="form-control" name="Phone_number"  placeholder="98001 98001" required>
													</div>
													<div class="col-12">
														<label for="password" class="form-label">Password</label>
														<div class="input-group" id="show_hide_password">
															<input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
														</div>
													</div>
													<div class="col-12">
														<label for="inputSelectCountry" class="form-label">State</label>
														<select class="form-select" id="inputSelectCountry" name="state" aria-label="Default select example">
															<option selected>Select State</option>
															<option value="Maharashtra">Maharashtra</option>
															<option value="Goa">Goa</option>
															<option value="Delhi">Delhi</option>
														</select>
													</div>
													<div class="col-12">
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
															<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
														</div>
													</div>
													<input type="hidden" name="firebaseop" id="firebaseop">
													<div class="col-12">
														<div class="d-grid">
															<button type="submit" class="btn btn-dark" id="osubmit" name="osubmit"><i class='bx bx-user'></i>Sign up</button>
														</div>
													</div>
												</form>
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
	<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
	<!--Password show & hide js -->
	<script src="assets/js/show-hide-password.js"></script>
</body>

</html>