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
		require_once "function.php";
		require_once "login.dbh.php";
		$result = "";
		if(isset($_POST['submit1']))
		{
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$Phone_number = $_POST['Phone_number'];
            $username = $_POST['username'];
			$password = $_POST['password'];
			$Address = $_POST['address'];
            
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
                <section class="py-0 py-lg-1" id="personal_details">
                    <form action="" method="post">
                    <div class="container">
                        <div class="align-items-center justify-content-center my-5 my-lg-0">
                            <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                                <div class="col mx-auto mt-5 mb-5">
                                    <div class="card mb-0">
                                        <div class="text-center">
                                            <h5><?php echo $result; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="border p-4 rounded">
                                                <div class="text-center">
                                                    <h3 class="">Create Store</h3>
                                                </div>
                                                <!-- <div class="text-center">
                                                    <h5 class="mt-4">Personal Details</h5>
                                                </div> -->
                                                <div class="login-separater text-center mb-4"><span style="font-size:150%">Personal Details</span>
                                                    <hr/>
                                                </div>
                                                <!-- <div class="d-grid">
                                                    <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                                                        <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                                                        <span>Sign Up with Google</span>
                                                        </span>
                                                    </a>
                                                </div> -->
                                                <!-- <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                                    <hr/>
                                                </div> -->
                                                <div class="form-body mt-5">
                                                    <form class="row g-3" action="" method="post">
                                                        <div class="col-sm-6">
                                                            <label for="inputFirstName" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" id="inputFirstName" name="firstname" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="inputLastName" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" id="inputLastName" name="lastname" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="inputEmailAddress"  name="email" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="Phone number" class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control" name="Phone_number" pattern="[7-9]{1}[0-9]{9}" required>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="inputFirstName" name="username" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                                            <div class="input-group" id="show_hide_password">
                                                                <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <label for="inputSelectCountry" class="form-label">State</label>
                                                            <select class="form-select" id="inputSelectCountry" name="state" aria-label="Default select example">
                                                                <option selected>Select State</option>
                                                                <option value="Maharashtra">Maharashtra</option>
                                                                <option value="Goa">Goa</option>
                                                                <option value="Delhi">Delhi</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="col-12">
                                                            <label for="inputSelectCountry" class="form-label">Personal Address</label>
                                                            <input type="text" class="form-control" name="Address" required>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button type="submit1" class="btn btn-dark" id = "b1" name="Next"></i>Next > </button>
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
                    </form>
                </section>
                <section class="py-0 py-lg-2" id="Store_details">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
                            <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                                <div class="col mx-auto mt-5 mb-5">
                                    <div class="card mb-0">
                                        <div class="text-center">
                                            <h5><?php echo $result; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="border p-4 rounded">
                                                <div class="text-center">
                                                    <h3 class="">Create Store</h3>
                                                </div>
                                                <!-- <div class="text-center">
                                                    <h5 class="mt-4">Store Details</h5>
                                                </div> -->
                                                <!-- <div class="d-grid">
                                                    <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                                                        <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                                                        <span>Sign Up with Google</span>
                                                        </span>
                                                    </a>
                                                </div> -->
                                                <div class="login-separater text-center mb-4"><span style="font-size:150%">Store Details</span>
                                                    <hr/>
                                                </div>
                                                <div class="form-body mt-5">
                                                    <form class="row g-3" action="" method="post">
                                                        <!-- <div class="col-sm-6">
                                                            <label for="inputFirstName" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" id="inputFirstName" name="firstname" placeholder="Mayur" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="inputLastName" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" id="inputLastName" placeholder="Khadde" name="lastname" required>
                                                        </div> -->
                                                        <div class="col-12">
                                                            <label for="inputFirstName" class="form-label">Store Name</label>
                                                            <input type="text" class="form-control" name="store_name" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputFirstName" class="form-label">Store Address</label>
                                                            <input type="email" class="form-control" name="store_address" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">Enter Geo-graphical (Co-ordinates)</label>
                                                            <input type="text" class="form-control" name="co-ordinates" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="formFileMultiple"class="form-label">Upload Store Images</label>
                                                            <input type="file" id="formFileMultiple" class="form-control" name="images" multiple />
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <label for="inputSelectCountry" class="form-label">State</label>
                                                            <select class="form-select" id="inputSelectCountry" name="state" aria-label="Default select example">
                                                                <option selected>Select State</option>
                                                                <option value="Maharashtra">Maharashtra</option>
                                                                <option value="Goa">Goa</option>
                                                                <option value="Delhi">Delhi</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="col-12">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-dark" id = "b2" name="Back"></i> < Back</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-dark" name="submit"></i>Send Request</button>
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
                </form>
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
    <!-- <script>
		var b1 = document.getElementById("b1");
		var b2 = document.getElementById("b2");
        document.getElementById("personal_details").style.display="block";
		document.getElementById("Store_details").style.display="none";
        b1.onclick = function() {
			document.getElementById("personal_details").style.display="none";
			document.getElementById("Store_details").style.display="block";
		}
        b2.onclick = function() {
			document.getElementById("personal_details").style.display="block";
			document.getElementById("Store_details").style.display="none";
		}
    </script> -->
</body>

</html>