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
	<title>EcommerceWeb</title>
</head>

<body>	
		<?php
			require_once "login.dbh.php";
			require_once "function.php";
			$id = $_GET['id'];
			$row = "";
			$sql = "SELECT * FROM productdb WHERE Prod_id=$id;";
			$smt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($smt, $sql)){
				echo "Output not show";
				exit();
			}
			$i = 0;
			mysqli_stmt_execute($smt);
			$resultData = mysqli_stmt_get_result($smt);
			$num_rows = mysqli_num_rows($resultData);
			if($row = mysqli_fetch_assoc($resultData)) {
				$product= $row;
			}
			else
			{
				$product = "Record not Found";
			}
			$row1 = "";
			$reviews = "";
			$sql = "SELECT * FROM review WHERE Prod_id=$id;";
			$smt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($smt, $sql)){
				echo "Output not show";
				exit();
			}
			mysqli_stmt_execute($smt);
			$c=0;
			$resultData1 = mysqli_stmt_get_result($smt);
			$num_rows1 = mysqli_num_rows($resultData1);
			while($row1 = mysqli_fetch_assoc($resultData1)) {
				$review[$c]= $row1;
				$reviews = $review;
				$c++;
			}
			require_once "login.dbh.php";
			$category = $product['category'];
			$error = "";
			$c = 0;
			$sql = "SELECT * FROM productdb WHERE category='$category';";
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
				$result[$c]= $row;
				$product2 = $result;
				$c++;
			}
			function existed($conn, $prod_id){
				$error = "";
				$sql = "SELECT Prod_id FROM cart WHERE Prod_id = ?;";
				$smt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($smt, $sql)){
					$error .= "Error in STMT";
					exit();
				}
				mysqli_stmt_bind_param($smt, "i", $prod_id);
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
			$number = 0;
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
							<h3 class="breadcrumb-title pe-3"><?php echo $product['category']; ?></h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Product Details</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start product detail-->
				<section class="py-4">
					<div class="container">
						<div class="product-detail-card">
							<div class="product-detail-body">
								<div class="row g-0">
									<div class="col-12 col-lg-5">
										<div class="image-zoom-section">
											<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
												<?php
													$temp = $product['image_loc'];
													$img = explode('&',$temp);
													$count = count($img);
													for($i=0; $i<$count; $i++)
													{
														?>
														<div class="item">
															<img src="<?php echo $img[$i]; ?>" class="img-fluid" alt="">	
														</div>
														<?php
													}
												?>
												<!-- <div class="item">
													<img src="assets/images/product-gallery2/2.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery2/3.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery2/4.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery2/5.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery2/6.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery2/7.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery2/8.png" class="img-fluid" alt="">
												</div>
												<div class="item">
													<img src="assets/images/product-gallery2/9.png" class="img-fluid" alt="">
												</div> -->
											</div>
											<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
											<?php
												for($i=0;$i<$count;$i++)
												{
													?>
													<button class="owl-thumb-item">
														<img src="<?php echo $img[$i]; ?>" class="" alt="">
													</button>
													<?php
												}
											?>
												
												<!-- <button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/2.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/3.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/4.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/5.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/6.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/7.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/8.png" class="" alt="">
												</button>
												<button class="owl-thumb-item">
													<img src="assets/images/product-gallery2/9.png" class="" alt="">
												</button> -->
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-7">
										<div class="product-info-section p-3">
											<h3 class="mt-3 mt-lg-0 mb-0"><?php echo $product['title']; ?></h3>
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
												<p style="color:grey ; margin-bottom:2px">MRP: <del> Rs. <?php echo $product["mrp_price"]; ?> </del></p>
												<h4 class="" style="color: green;">Rs. <?php echo $product['price']; ?>/-</h4>
											<div class="mt-3">
												<h6>Description :</h6>
												<p class="mb-0"><?php echo $product['description']; ?></p>
											</div>
											
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
											</div>
											<br>
											<!--end row-->
											<div class="row">
												<div class="col-md-6" >
												<button onclick="window.location.href='http://localhost:3456/add_to_cart.php?prod_id=<?php echo $product["Prod_id"] ?> '"  class="btn btn-dark btn-ecomm" style="width: 100%">	<i class="bx bxs-cart-add"></i>Add to Cart</button> 
												
												</div>
												<div class="col-md-6">
													
												<a href="javascript:;" style="width: 100%" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
												</div>
												
											</div>
											<hr>
											<div class="product-sharing" style="color: black!important;">
												<ul class="list-inline" style="color: black!important;">
													<li class="list-inline-item"> <a href="javascript:;"><i style="color: black!important;" class='bx bxl-facebook '></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-linkedin bx-black'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-twitter'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-instagram'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-google'></i></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>
					</div>
				</section>
				<?php
					require_once "login.dbh.php";
					require_once "function.php";
					
				?>
				<!--end product detail-->
				<!--start product more info-->
				<section class="py-4">
					<div class="container">
						<div class="product-more-info">
							<ul class="nav nav-tabs mb-0" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" data-bs-toggle="tab" href="#discription" role="tab" aria-selected="true">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">Description</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" data-bs-toggle="tab" href="#more-info" role="tab" aria-selected="false">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">More Info</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" data-bs-toggle="tab" href="#tags" role="tab" aria-selected="false">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">Tags</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="false">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">(<?php echo $num_rows1; ?>) Reviews</div>
										</div>
									</a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="discription" role="tabpanel">
									<p>
										<?php echo $product['description']; ?>
								</p>
									<ul>
										<li>Not just for commute</li>
										<li>Branded tongue and cuff</li>
										<li>Super fast and amazing</li>
										<li>Lorem sed do eiusmod tempor</li>
									</ul>
									<p class="mb-1">The Samsung Galaxy F22 smartphone comes with an HD+ sAMOLED display, which delivers rich and vivid visuals, irrespective of the content you're watching. Also, you can enjoy a smooth scrolling experience with minimal motion blur, thanks to the 90 Hz refresh rate.</p>
									<p class="mb-1">Seitan aliquip quis cardigan american apparel, butcher voluptate nisi.</p>
								</div>
								<div class="tab-pane fade" id="more-info" role="tabpanel">
									<h3>General</h3>
									<table class="table">
										<?php 
											$specs = json_decode($product['specification'], true);
											foreach ($specs as $key => $value) {
												echo "";
												echo "<tr><th>$value[0] : </th> <td> $value[1]</td></tr>";
											}
										?>
									</table>
								</div>
								<div class="tab-pane fade" id="tags" role="tabpanel">
									<div class="tags-box w-50">
									<?php
										$Tags = $product['Tags'];
										if($Tags == "")
										{
											?>
												<a href="javascript:;" class="tag-link">No Tags available</a>
											<?php
										}
										else{
											$Tag = explode('&',$Tags);
											$count = count($Tag);
											for($i=0;$i<$count-1;$i++){
												?>
													<a href="javascript:;" class="tag-link"><?php echo $Tag[$i]; ?></a>
												<?php
											}
										}
									?>
									</div>
								</div>
								<div class="tab-pane fade" id="reviews" role="tabpanel">
									<div class="row">
										<div class="col col-lg-8">
											<div class="product-review">
												<h5 class="mb-4"><?php echo $num_rows1; ?> Reviews For The Product</h5>
												
												<div class="review-list">
													<?php
														for($i=0;$i<$num_rows;$i++){
															if($reviews == "")
															{
																break;
															}
															else
															{
																?>
																<div class="d-flex align-items-start">
																	<div class="review-user">
																		<!-- <img src="" width="65" height="65" class="rounded-circle" alt="" /> -->
																	</div>
																	<div class="review-content ms-3">
																		<div class="rates cursor-pointer fs-6">
																			<?php
																				for($j=0;$j<$reviews[$i]['ratings'];$j++){
																					?>
																					<i class="bx bxs-star text-light-4"></i>
																					<?php
																				}
																			?>
																		</div>
																		<div class="d-flex align-items-center mb-2">
																			<h6 class="mb-0"><?php echo $reviews[$i]['firstname']; echo " ",$reviews[$i]['lastname']; ?></h6>
																			<p class="mb-0 ms-auto"><?php echo $reviews[$i]['date']; ?></p>
																		</div>
																		<p><?php echo $reviews[$i]['Message']; ?></p>
																	</div>
																</div>
																<hr/>
															<?Php
															}
														}
													?>
													<!-- <div class="d-flex align-items-start">
														<div class="review-user"> -->
															<!-- <img src="" width="65" height="65" class="rounded-circle" alt="" /> -->
														<!-- </div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6"> <i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-light-4"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">Anonymous</h6>
																<p class="mb-0 ms-auto">February 22, 2021</p>
															</div>
															<p>Keeping in view the mid range level of entry samsung has made his presence felt within the masses. Camera and display are surprisingly good at this price range. Super amoled with hd well configured which is pleasing to the eye for long viewing. 64 gb storage which can be increased. Media tek helio 80 an old processor though does daily multitasking with ease. No lagging felt till now. Hope regular software updates will dissolve any issue if props in future. Build quality is impressive too with matte finish. Pretty compact and grip is nice. Screen is not that big as other counterparts which is a plus point. Knox security and clean software experience makes it an unique proposition. For next generation or otherwise this one is an affordable and dependable smartphone. Rush in. Regards.</p>
														</div>
													</div>
													<hr/> -->
													<!-- <div class="d-flex align-items-start">
														<div class="review-user"> -->
															<!-- <img src="" width="65" height="65" class="rounded-circle" alt="" /> -->
														<!-- </div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6">	<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-light-4"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">Anonymous</h6>
																<p class="mb-0 ms-auto">February 26, 2021</p>
															</div>
															<p>wonderful product, in terms of quality of software, the durability of the product, the user feels like using high-end mobile for this price range. Blindly go ahead with this product, u really love it while using it.</p>
														</div>
													</div> -->
												</div>
											</div>
										</div>
										<!-- <div class="col col-lg-4">
											<div class="add-review bg-dark-1">
												<div class="form-body p-3">
													<h4 class="mb-4">Write a Review</h4>
													<div class="mb-3">
														<label class="form-label">Your Name</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="mb-3">
														<label class="form-label">Your Email</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="mb-3">
														<label class="form-label">Rating</label>
														<select class="form-select rounded-0">
															<option selected>Choose Rating</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="3">4</option>
															<option value="3">5</option>
														</select>
													</div>
													<div class="mb-3">
														<label class="form-label">Example textarea</label>
														<textarea class="form-control rounded-0" rows="3"></textarea>
													</div>
													<div class="d-grid">
														<button type="button" class="btn btn-light btn-ecomm">Submit a Review</button>
													</div>
												</div>
											</div>
										</div> -->
									</div>
									<!--end row-->
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--end product more info-->
				<!--start similar products-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Similar Products</h5>
							<div class="d-flex align-items-center gap-0 ms-auto">	<a href="javascript:;" class="owl_prev_item fs-2"><i class='bx bx-chevron-left'></i></a>
								<a href="javascript:;" class="owl_next_item fs-2"><i class='bx bx-chevron-right'></i></a>
							</div>
						</div>
						<hr/>
					
						<div class="product-grid">
							<div class="similar-products owl-carousel owl-theme">
							<?php
								for($i=0;$i<$num_rows;$i++){
							?>
							<form method = "post" action = "">   
								<div class="col">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class='bx bx-git-compare'></i>Compare</span>
													</div>
												</a>
												<a href="javascript:;" onclick="wishlist1()">
													<div class="product-wishlist"><i class='bx bx-heart'></i>
													</div>
													<script>
														function wishlist1(){
															var element = document.getElementById("w1");
															element.classList.remove("bx-heart");
															element.classList.add("bxs-heart");
														}
													</script>
												</a>
											</div>
										</div>
										<a href="product-details.php?id=<?php echo $product2[$i]['Prod_id']; ?>">
											<?php
												$temp = $product2[$i]['image_loc'];
												$img = explode('&',$temp);
											?>
											<img src="<?php echo $img[0]; ?>" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="product-details.php?id=<?php echo $product2[$i]['Prod_id']; ?>">
													<p class="product-catergory font-13 mb-1"><?php echo $product2[$i]['category']; ?></p>
												</a>
												<a href="product-details.php?id=<?php echo $product2[$i]['Prod_id']; ?>">
													<h6 class="product-name mb-2"><?php echo $product2[$i]['title']; ?></h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
														<span class="fs-5">Rs. <?php echo $product2[$i]['price']; ?></span>
													</div>
													<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-light-4"></i>
														<i class="bx bxs-star text-light-4"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<input type="hidden" name="prod_id" value="<?php echo $product2[$i]['Prod_id']; ?>">
													<?php
														require_once "login.dbh.php";
														$prod3 = $product2[$i]['Prod_id'];
														$prod2 = existed($conn, $prod3);
													?>
													<div class="d-grid gap-2">
														<?php
														if($prod2 != NULL){
															?>
															<a id="cart1" class="btn btn-light btn-ecomm" ><i class='bx bxs-cart'></i>Added Successfully</a>
															<a href="javascript:;" class="btn btn-light btn-ecomm"  data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?php echo $product2[$i]['Prod_id']; ?>"><i class='bx bx-zoom-in'></i>Quick View</a>
														<?php
														}
														else{
															?>
															<button id="cart1" type="submit" name="submit" onclick="view(event)" class="btn btn-dark btn-ecomm" ><i class='bx bxs-cart'></i>Add to Cart</button>
															<a href="javascript:;" class="btn btn-light btn-ecomm"  data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?php echo $product2[$i]['Prod_id']; ?>"><i class='bx bx-zoom-in'></i>Quick View</a>
														<?php
														}
														?>
													</div>
												</div>
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
				</section>
				<!--end similar products-->
			</div>
		</div>
		<!--end page wrapper -->
		<!--start footer section-->
		<div include-html="footer.html" id="footer_file"></div>
		<!--end footer section-->
		<!--start quick view product-->
		<!-- Modal -->
		<div class="modal fade" id="QuickViewProduct<?php echo "0"; ?>">
			<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
				<div class="modal-content rounded-0 border-0">
					<div class="modal-body">
						<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
						<div class="row g-0">
							<div class="col-12 col-lg-6">
								<div class="image-zoom-section">
									<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
										<?php
											$temp = $product2[0]['image_loc'];
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
									<h3 class="mt-3 mt-lg-0 mb-0"><?php echo $product2[0]['title']; ?></h3>
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
										<h4 class="mb-0">Rs. <?php echo $product2[0]['price']; ?></h4>
									</div>
									<div class="mt-3">
										<h6>Discription :</h6>
										<p class="mb-0"><?php echo $product2[0]['description']; ?></p>
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
									<?php
										$prod = $product2[0]['Prod_id'];
										$prod1 = existed($conn, $prod);
									?>
									<!--end row-->
									<div class="d-flex gap-2 mt-3">
											<?php
											if($prod1 != NULL){
												?>
												<a href="javascript:;" class="btn btn-light btn-ecomm">	<i class="bx bxs-cart-add"></i>Added to Cart</a>
												<?php
											}
											else{
												?>
													<button href="javascript:;" name="submit" type="submit" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</button>
												<?php
											}
											?>
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
		<!--end quick view product-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/js/include-html.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/product-details.js"></script>
	<script>
		$(document).on("click", ".QuickViewProduct", function () {
			var product = $(this).data('id');
			$(".modal-body #bookId").val(product);
		});
	</script>
</body>

</html>