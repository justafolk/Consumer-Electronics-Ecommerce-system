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
	<title>Shopingo - eCommerce HTML Template</title>
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
        $error = "";
        function UserExists($conn, $name) {
            require_once "login.dbh.php";
            $sql = "SELECT id FROM sellerDB WHERE username = ?;";
            $smt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($smt, $sql)){
                exit();
            }
            mysqli_stmt_bind_param($smt, "s", $name);
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
        function StoreExists($conn, $name) {
            require_once "login.dbh.php";
            $sql = "SELECT id FROM sellerDB WHERE store_name = ?;";
            $smt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($smt, $sql)){
                exit();
            }
            mysqli_stmt_bind_param($smt, "s", $name);
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
        function createstore($conn, $firstname, $lastname, $email, $Phone_number, $username, $password, $Address, $store_name, $store_address, $co_ordinates, $files){
            require_once "login.dbh.php";
            $error = "";
            $UserExists = UserExists($conn, $username);
            $Store = StoreExists($conn, $store_name);
            if($UserExists == NULL && $Store == NULL){
                $sql = "INSERT INTO sellerDB (firstname, lastname, email, phone_no, username, password, Address, store_name, store_address, co_ordinates, files) VALUES(?,?,?,?,?,?,?,?,?,?,?);";
                $smt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($smt, $sql)){
                    $error .= "Error in STMT";
                    exit();
                }
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($smt, "sssisssssss", $firstname, $lastname, $email, $Phone_number, $username, $hashedPwd, $Address, $store_name, $store_address, $co_ordinates, $files);
                mysqli_stmt_execute($smt);
                mysqli_stmt_close($smt);
                $error .= "User Created Successfully";
                return $error;
            }
            else
            {
                if($UserExists != NULL){
                    $error = "Username Already Existed";
                }
                else{
                    $error = "Store Name Already Existed";
                }
                return $error;
            }
        }
        function insert($conn, $firstname, $lastname, $email, $Phone_number, $username, $password, $Address, $store_name, $store_address, $co_ordinates, $files){
            $error = "";
            $UserExists = UserExists($conn, $username);
            $Store = StoreExists($conn, $store_name);
            if($UserExists == NULL && $Store == NULL)
            {
                $query = "";
                $sql = "INSERT INTO sellerDB (firstname, lastname, email, phone_no, username, password, Address, store_name, store_address, co_ordinates, files) VALUES ('$firstname', '$lastname', '$email', '$Phone_number', '$username', '$password', '$Address', '$store_name', '$store_address', '$co_ordinates', '$files');";
                if($conn->query($sql) === TRUE) {
                    $error .= "<br>Class $username created Successfully";
                }
                else{
                    $error .= "<br>Error creating table1: ".$conn->error;
                }
            }
            else
            {
                if($UserExists != NULL){
                    $error = "Username Already Existed";
                }
                else{
                    $error = "Store Name Already Existed";
                }
            }
            return $error;
            $conn->close();
        }
        $result = "";
        if(isset($_POST["submit"])){
            $firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$Phone_number = $_POST['Phone_number'];
            $username = $_POST['username'];
			$password = $_POST['password'];
			$Address = $_POST['Address'];
            $store_name = $_POST["store_name"];
            $store_address = $_POST["store_address"];
            $co_ordinates = $_POST["co-ordinates"];
            $file = $_FILES["images"];
            $count = count($_FILES["images"]["name"]);
            $filenames = array();
            for($i=0;$i<$count;$i++){
                $filename = $_FILES["images"]["name"][$i];
                $fileTmpName = $_FILES["images"]["tmp_name"][$i];
                $filesize = $_FILES["images"]["size"][$i];
                $fileError = $_FILES["images"]["error"][$i];
                $filetype = $_FILES["images"]["type"][$i];
    
                $fileExt = explode(".", $filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    
                if(in_array($fileActualExt, $allowed)){
                    if($fileError === 0){
                        if($filesize < 1000000){
                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                            array_push($filenames, $fileNameNew);
                            $fileDestination = "upload/'.$fileNameNew";
                            move_uploaded_file($fileTmpName, $fileDestination);
                        }
                        else{
                            $error = "Your File is too Big";
                        }
                    }	
                    else{
                        $error = "There Was an error uploading your file";
                    }
                }
                else{
                    $error = "You cannot upload files of this type";
                }
            }
            require_once "login.dbh.php";
            
            $files = implode("&",$filenames);
            $result = $error;
            $result = createstore($conn, $firstname, $lastname, $email, $Phone_number, $username, $password, $Address, $store_name, $store_address, $co_ordinates, $files);
        }
	?>
	<b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">
		<!--start top header wrapper-->
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
                                <a href="store_login.php" class="btn btn-dark btn-ecomm">Store Login</a>
                            </div>
                        </div>
					</div>
					<!--end row-->
				</div>
			</div>
		</div>
    </div>
		<!--end top header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Create New Store</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Store Sign-in</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop cart-->
                    <form action="" method="post" enctype="multipart/form-data">
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
                                                        <div class="form-body mt-2">
                                                            <div class="col-sm-6 mt-3">
                                                                <label for="inputFirstName" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="inputFirstName" name="firstname" required>
                                                            </div>
                                                            <div class="col-sm-6 mt-3">
                                                                <label for="inputLastName" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="inputLastName" name="lastname" required>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                                <input type="email" class="form-control" id="inputEmailAddress"  name="email" required>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <label for="Phone number" class="form-label">Phone Number</label>
                                                                <input type="text" class="form-control" name="Phone_number" pattern="[7-9]{1}[0-9]{9}" required>
                                                            </div>
                                                            <div class="col-sm-12 mt-3">
                                                                <label class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="inputFirstName" name="username" required>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                                <div class="input-group" id="show_hide_password">
                                                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <label for="inputSelectCountry" class="form-label">Personal Address</label>
                                                                <input type="text" class="form-control" name="Address" required>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-dark" onclick="next()" name="submit1"></i>Next > </button>
                                                                </div>
                                                            </div>
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
                        <section class="py-0 py-lg-3" id="Store_details">
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
                                                        <div class="login-separater text-center mb-4"><span style="font-size:150%">Store Details</span>
                                                            <hr/>
                                                        </div>
                                                        <div class="form-body mt-5">
                                                            <div class="col-12 mt-3">
                                                                <label for="inputFirstName" class="form-label">Store Name</label>
                                                                <input type="text" class="form-control" name="store_name" required>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <label for="inputFirstName" class="form-label">Store Address</label>
                                                                <input type="text" class="form-control" name="store_address" required>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <label class="form-label">Enter Geo-graphical (Co-ordinates)</label>
                                                                <input type="text" class="form-control" name="co-ordinates" required>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <label for="formFileMultiple"class="form-label">Upload Store Images</label>
                                                                <input type="file" id="formFileMultiple" class="form-control" name="images[]" multiple />
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-3">
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-dark" onclick="back()" name="Back"></i> < Back</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 mt-3">
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-dark" name="submit"></i>Send Request</button>
                                                                </div>
                                                            </div>
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
                </div>
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
    <script>
		document.getElementById("personal_details").style.display="block";
        document.getElementById("Store_details").style.display="none";
        function next(){
            document.getElementById("personal_details").style.display="none";
            document.getElementById("Store_details").style.display="block";
        }
        function back(){
            document.getElementById("personal_details").style.display="block";
            document.getElementById("Store_details").style.display="none";
        }
    </script>
</body>

</html>