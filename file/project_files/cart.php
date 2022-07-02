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
	<title>eCommerce Website</title>
	<style>
		.btn-change:hover{
			transform: scale(1.2);
		}
		.mg{
			margin-top:2%;
		}	
	</style>
</head>

<body>
		<!--start top header wrapper-->
		<div include-html="header.php" id="header_file"></div>
		<?php
        session_start();
		$user_id = "";
		if (isset($_SESSION['u_id'])) {
			$user_id = $_SESSION["u_id"];
		}
		require_once "login.dbh.php";
		function cart($conn, $user, $prod){
			require_once "login.dbh.php";
			$error = "";
            $sql = "DELETE FROM cart WHERE U_id = $user, Prod_id = $prod;";
            $smt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($smt, $sql)){
                $error .= "Error in STMT";
                exit();
            }
            mysqli_stmt_execute($smt);
            mysqli_stmt_close($smt);
            $error .= "Cart Remove Successfully";
            return $error;
		}
		if(isset($_POST['submit'])){
			$prod = $_POST['prod_id'];
			$result = cart($conn, $user_id, $prod);
            echo $result;
		}

		?>
		<div class="page-wrapper">
			<div class="page-content">
                <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Shop Cart</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<section class="py-4">
					<div class="product-grid py-4" id="Trending">
						<div class="container">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
								<?php
									require_once "login.dbh.php";
                                    require_once "function.php";
                                    $productdb = array();
                                    $Prod = "";
                                    $row = "";
                                    $sql = "SELECT Prod_id FROM cart WHERE U_id = $user_id";
                                    $smt = mysqli_stmt_init($conn);
                                    if(!mysqli_stmt_prepare($smt, $sql)){
                                        echo "Output not show";
                                        exit();
                                    }
                                    $i = 0;
                                    mysqli_stmt_execute($smt);
                                    $resultData = mysqli_stmt_get_result($smt);
                                    $num_rows = mysqli_num_rows($resultData);
                                    while($row = mysqli_fetch_assoc($resultData)) {
                                        $productdb[$i]= $row;
                                        $Prod = $productdb;
                                         $i++;
                                    }
                                    $product = array();
                                    for($j=0;$j<$num_rows;$j++){
                                        $id = $Prod[$j]['Prod_id'];
                                        $sql = "SELECT * FROM productdb WHERE Prod_id = $id";
                                        $smt = mysqli_stmt_init($conn);
                                        if(!mysqli_stmt_prepare($smt, $sql)){
                                            echo "Output not show";
                                            exit();
                                        }
                                        mysqli_stmt_execute($smt);
                                        $resultData = mysqli_stmt_get_result($smt);
                                        $num_rows1 = mysqli_num_rows($resultData);
                                        while($row = mysqli_fetch_assoc($resultData)) {
                                            $product[$j] = $row;
                                        }
                                    }
									for($j=0; $j<4; $j++){
									?>
								<form action="cart.php" method="post">
								<div class="col mt-5">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class='bx bx-git-compare'></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;" onclick="wishlist()">
													<div class="product-wishlist"><i id = "w1" class='bx bx-heart' style="color:#ff0000"></i>
													</div>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product[$j]['Prod_id']; ?>">
											<?php
												$temp = $product[$j]['image_loc'];
												$img = explode('&',$temp);
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
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-light-4"></i>
														<i class="bx bxs-star text-light-4"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<button id="cart1" type="submit" name="submit" onclick="view(event)" class="btn btn-dark btn-ecomm" ><i class='bx bxs-cart'></i>Remove From Cart</button>
														<a href="javascript:;" class="btn btn-light btn-ecomm"  data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?php echo $product[$j]['Prod_id']; ?>"><i class='bx bx-zoom-in'></i>Quick View</a>
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
																	$img = explode('&',$temp);
																	$count = count($img);
																	for($i=0; $i<$count-1; $i++)
																	{
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
																	for($i=0;$i<$count-1;$i++)
																	{
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
																<div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
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
															<dl class="row mt-3">	<dt class="col-sm-3">Product id</dt>
																<dd class="col-sm-9">#BHU5879</dd>	<dt class="col-sm-3">Delivery</dt>
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
																<button href="javascript:;" name="submit" type="submit" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Remove From Cart</button>
																<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
															</div>
														</div>
													</div>
												</div>
												<!--end row-->
											</div>
										</div>
									</div>
								</div>
								</form>
								<?php
									}
								?>
							</div>
						</div>
					</div>
				</section>
				<!--end bottom products section-->
			</div>
		</div>
		<div include-html="footer.html" id="footer_file"></div>
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
	<script src="assets/js/index.js"></script>
	<script>
		$(document).on("click", ".QuickViewProduct", function () {
			var product = $(this).data('id');
			$(".modal-body #bookId").val(product);
		});

		var cart1 = document.getElementById("cart1");
		// var button = document.getElementByTagName("button");
		function view(event){
				windows.location.reload();
				event.target.innerHTML = "Added To Cart"
		}


		function wishlist(){
			var element = document.getElementById("w1");
			element.classList.remove("bx-heart");
			element.classList.add("bxs-heart");
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
