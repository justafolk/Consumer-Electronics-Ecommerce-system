$(function() {
    "use strict";

	
	$('.new-arrivals').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		nav:false,
		dots: false,
		responsive:{
			0:{
				items:1
			},
			576:{
				items:2
			},
			768:{
				items:3
			},
			1366:{
				items:4
			},
			1400:{
				items:5
			}
	     },
    	})




		$('.browse-category').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			nav:false,
			dots: false,
			responsive:{
					0:{
						items:1
					},
					576:{
						items:3
					},
					768:{
						items:4
					},
					1366:{
						items:5
					},
					1400:{
						items:6
					}
				 },
			})


			$('.latest-news').owlCarousel({
				loop:true,
				margin:10,
				responsiveClass:true,
				nav:false,
				dots: false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1024:{
						items:3
					 },
					1366:{
						items:4
					 }
				  }
				})


				$('.brands-shops').owlCarousel({
					loop:true,
					margin:0,
					responsiveClass:true,
					nav:false,
					autoplay:true,
					autoplayTimeout:5000,
					dots: false,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1024:{
							items:3
						 },
						1366:{
							items:5
						 }
					  }
					})


					$('.product-gallery').owlCarousel({
						loop:true,
						margin:10,
						responsiveClass:true,
						nav:false,
						dots: false,
						thumbs: true,
						thumbsPrerendered: true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:1
							},
							1000:{
								items:1
							 }
						  }
						})



		
		
   });	 
   