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
</head>
<body>
	<?php
		$id = $_GET["id"];
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
							<h3 class="breadcrumb-title pe-3"><?php echo $id; ?></h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Categories</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page"><?php echo $id; ?></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop area-->
				<section class="py-4">
					<div class="container">
						<div class="row">
							<div class="col-12 col-xl-3">
								<div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
								</div>
								<div class="filter-sidebar d-none d-xl-flex">
									<div class="card rounded-0 w-100">
										<div class="card-body">
											<div class="align-items-center d-flex d-xl-none">
												<h6 class="text-uppercase mb-0">Filter</h6>
												<div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
											</div>
											<hr class="d-flex d-xl-none" />
											<div class="product-brands">
												<h6 class="text-uppercase mb-3">Brands</h6>
												<ul class="list-unstyled mb-0 categories-list">
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Adidas">
															<label class="form-check-label" for="Adidas">Mi-Xiaomi</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Armani">
															<label class="form-check-label" for="Armani">Samsung</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="CalvinKlein">
															<label class="form-check-label" for="CalvinKlein">Apple</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Columbia">
															<label class="form-check-label" for="Columbia">Sony</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="JhonPlayers">
															<label class="form-check-label" for="JhonPlayers">Dell</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Diesel">
															<label class="form-check-label" for="Diesel">HP</label>
														</div>
													</li>
												</ul>
											</div>
											<hr>
											<div class="price-range">
												<h6 class="text-uppercase mb-3">Price</h6>
												
												<input type="range" class="form-range" min="0" max="70000" step="0.5" id="customRange3">
												<div class="d-flex align-items-center">
													<div class="ms-auto">
														<p class="mb-0">Price: Rs.2000 - Rs.90000</p>
													</div>
												</div>
											</div>
											<hr>
												<button type="button" class="btn btn-dark btn-sm text-uppercase rounded-0 font-14 fw-500" style="margin-top:4%;">Filter</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-xl-9">
								<div class="product-wrapper">
									<div class="toolbox d-flex align-items-center mb-3 gap-2">
										<div class="d-flex flex-wrap flex-grow-1 gap-1">
											<div class="d-flex align-items-center flex-nowrap">
												<p class="mb-0 font-13 text-nowrap">Sort By:</p>
												<select class="form-select ms-3 rounded-0">
													<option value="menu_order" selected="selected">Default sorting</option>
													<option value="popularity">Sort by popularity</option>
													<option value="rating">Sort by average rating</option>
													<option value="date">Sort by newness</option>
													<option value="price">Sort by price: low to high</option>
													<option value="price-desc">Sort by price: high to low</option>
												</select>
											</div>
										</div>
										<div class="d-flex flex-wrap">
											<div class="d-flex align-items-center flex-nowrap">
												<p class="mb-0 font-13 text-nowrap">Show:</p>
												<select class="form-select ms-3 rounded-0">
													<option>9</option>
													<option>12</option>
													<option>16</option>
													<option>20</option>
													<option>50</option>
													<option>100</option>
												</select>
											</div>
										</div>
									</div>
									<div class="product-grid">
										<div class="card rounded-0 product-card">
											<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;">
													<div class="product-wishlist"> <i class="bx bx-heart"></i>
													</div>
												</a>
											</div>
											<div class="row g-0">
												<div class="col-md-4">
													<img src="assets/images/products/25.png" class="img-fluid" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
																	<span class="fs-5">Rs. 5000</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-flex gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="border-top my-3"></div>
										<div class="card rounded-0 product-card">
											<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;">
													<div class="product-wishlist"> <i class="bx bx-heart"></i>
													</div>
												</a>
											</div>
											<div class="row g-0">
												<div class="col-md-4">
													<img src="assets/images/products/28.png" class="img-fluid" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
																	<span class="fs-5">Rs. 5000</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-flex gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="border-top my-3"></div>
										<div class="card rounded-0 product-card">
											<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;">
													<div class="product-wishlist"> <i class="bx bx-heart"></i>
													</div>
												</a>
											</div>
											<div class="row g-0">
												<div class="col-md-4">
													<img src="assets/images/products/29.png" class="img-fluid" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
																	<span class="fs-5">Rs. 5000</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-flex gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="border-top my-3"></div>
										<div class="card rounded-0 product-card">
											<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;">
													<div class="product-wishlist"> <i class="bx bx-heart"></i>
													</div>
												</a>
											</div>
											<div class="row g-0">
												<div class="col-md-4">
													<img src="assets/images/products/30.png" class="img-fluid" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
																	<span class="fs-5">Rs. 5000</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-flex gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="border-top my-3"></div>
										<div class="card rounded-0 product-card">
											<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;">
													<div class="product-wishlist"> <i class="bx bx-heart"></i>
													</div>
												</a>
											</div>
											<div class="row g-0">
												<div class="col-md-4">
													<img src="assets/images/products/10.png" class="img-fluid" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
																	<span class="fs-5">Rs. 5000</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-flex gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="border-top my-3"></div>
										<div class="card rounded-0 product-card">
											<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;">
													<div class="product-wishlist"> <i class="bx bx-heart"></i>
													</div>
												</a>
											</div>
											<div class="row g-0">
												<div class="col-md-4">
													<img src="assets/images/products/15.png" class="img-fluid" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
																	<span class="fs-5">Rs. 5000</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-flex gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="border-top my-3"></div>
										<div class="card rounded-0 product-card">
											<div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">
												<a href="javascript:;">
													<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
													</div>
												</a>
												<a href="javascript:;">
													<div class="product-wishlist"> <i class="bx bx-heart"></i>
													</div>
												</a>
											</div>
											<div class="row g-0">
												<div class="col-md-4">
													<img src="assets/images/products/07.png" class="img-fluid" alt="...">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through"></span>
																	<span class="fs-5">Rs. 5000</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-flex gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Add to Cart</a> <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<nav class="d-flex justify-content-between" aria-label="Page navigation">
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
											</li>
										</ul>
										<ul class="pagination">
											<li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
											</li>
										</ul>
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end shop area-->
			</div>
		</div>
		<!--end page wrapper -->
		<!--start footer section-->
		<div include-html="footer.html" id="footer_file"></div>
		<!--end footer section-->
		<!--start quick view product-->
		<!-- Modal -->
		<div class="modal fade" id="QuickViewProduct">
			<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
				<div class="modal-content rounded-0 border-0">
					<div class="modal-body">
						<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
						<div class="row g-0">
							<div class="col-12 col-lg-6">
								<div class="image-zoom-section">
									<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
										<div class="item">
											<img src="assets/images/product-gallery2/1.png" class="img-fluid" alt="">
										</div>
										<div class="item">
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
										</div>
									</div>
									<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
										<button class="owl-thumb-item">
											<img src="assets/images/product-gallery2/1.png" class="" alt="">
										</button>
										<button class="owl-thumb-item">
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
										</button>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="product-info-section p-3">
									<h3 class="mt-3 mt-lg-0 mb-0">SAMSUNG Galaxy F22 (Denim Blue, 64 GB)  (4 GB RAM)</h3>
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
										<h4 class="mb-0">Rs. 11,999</h4>
									</div>
									<div class="mt-3">
										<h6>Discription :</h6>
										<p class="mb-0">Bid goodbye to screen stuttering, poor display quality, and low-resolution photos by getting your hands on the Samsung Galaxy F22 smartphone. Featuring a 90 Hz refresh rate, HD+ sAMOLED display, and True 48 MP quad-rear camera, this smartphone is sure to be your ideal companion for entertainment, gaming, and communication. What's more, its 6000 mAh battery ensures that a full charge can last for an entire day.</p>
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
										<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
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
	<script src="assets/js/include-html.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
	<script src="assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/nouislider/nouislider.min.js"></script>
	<script src="assets/js/price-slider.js"></script>
	<script src="assets/js/product-gallery.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>