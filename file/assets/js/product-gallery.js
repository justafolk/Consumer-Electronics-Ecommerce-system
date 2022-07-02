$(function() {
	"use strict";

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