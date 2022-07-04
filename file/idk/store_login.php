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
    <style>
        .bg-custom-1 {
            background-color: #85144b;
        }

        .bg-custom-2 {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }
    </style>
</head>

<body>
	<?php
		require_once "login.dbh.php";
        $result = "";
        function user_exist($conn, $email, $store_name) {
            require_once "login.dbh.php";
            $sql = "SELECT * FROM sellerDB WHERE email = ? OR store_name = ?;";
            $smt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($smt, $sql)){
                exit();
            }
            mysqli_stmt_bind_param($smt, "ss", $email, $store_name);
            mysqli_stmt_execute($smt);
            $resultData = mysqli_stmt_get_result($smt);
            if($row = mysqli_fetch_assoc($resultData)) {
                return $row;
            }
            else{
                $result = false;
                return $result;
            }
        }
        function login($conn, $email, $password){
            require_once "login.dbh.php";
            $error = "";
            $user_existed = user_exist($conn, $email, $email);
            if($user_existed === false){
                $error .= "User Does'nt Exists";
            }
            else{
                $pwdhashed = $user_existed["password"];
                $check = password_verify($password, $pwdhashed);
                if($check === false)
                {
                    $error .= "Incorrect Password";
                }
                elseif($check === true)
                {
                    session_start();
                    $_SESSION["semail"] = $user_existed["email"];
                    $_SESSION["sfirstname"] = $user_existed["firstname"];
                    $_SESSION["slastname"] = $user_existed["lastname"];
                    $_SESSION["s_id"] = $user_existed["id"];
                    header("location: index.php");
                    exit();
                }
            }
            return $error;
        }
        $result = "";
        if(isset($_POST["submit"])){

            $username = $_POST['username'];
			$password = $_POST['password'];
            echo login($conn, $username, $password);
        }
	?>
	<b class="screen-overlay"></b>
	<div class="wrapper">
		<div class="header-wrapper">
			<div class="header-content pb-3 pb-md-0">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-1 col-md-auto">
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
						<div class="col col-md-auto" style="margin-left:25%;">
                            <div class="input-group flex-nowrap px-xl-4 ms-auto">
                                <h3 class="my-5 my-lg-0">Store Sign in/ Login</h3>
                            </div>
                        </div>
                        <div class="col-4 ms-auto col-md-auto order-3 d-none d-xl-flex align-items-center">
                            <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                            </div>
                            <div class="ms-2">
                                <a href="store_login.php" class="btn btn-dark btn-ecomm">Create Store</a>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>
		<div class="page-wrapper">
			<div class="page-content">
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Store Login</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Store Login</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
                <div class="p-3">
                    <section class="py-0 py-lg-3" id="personal_details">
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
                                                    <div class="login-separater text-center mb-4"><span style="font-size:150%">Personal Details</span>
                                                        <hr/>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="form-body mt-4">
                                                            <div class="col-sm-12 mt-4">
                                                                <label class="form-label">Username / Store Name</label>
                                                                <input type="text" class="form-control" id="inputFirstName" name="username" required>
                                                            </div>
                                                            <div class="col-12 mt-4">
                                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                                <div class="input-group" id="show_hide_password">
                                                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-4">
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-dark" name="submit"></i>Login</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
		</div>
		<div include-html="footer.html" id="footer_file"></div>
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	</div>
	
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/include-html.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/show-hide-password.js"></script>
</body>
</html>