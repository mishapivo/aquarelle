jQuery(document).ready(function ($) {
	
	// header-sticky
	    $(document).ready(function(){
	      $(window).scroll(function(){
			var scrollTop = $(window).scrollTop();
			var siteTitle = $('h1.site-title a').html();
			var siteTitleURL = $('h1.site-title a').attr('href');

	        if (scrollTop > 240) {
	            $('.head-top').addClass('hidden');
	            $('.main-navigation').addClass('nav-sticky');
	            $('.main-navigation').addClass('fadeInDown');
				$('.main-navigation').addClass('animated');
				$('#site-navigation .menu-toggle').html('<h1 class="unique-blog-nevigation"><a href="'+siteTitleURL+'">'+siteTitle+'</a></h1>');
	        } else {
	            $('.main-navigation').removeClass('fadeInDown');
	            $('.main-navigation').removeClass('nav-sticky');
				$('.head-top').removeClass('hidden');
				$( '.unique-blog-nevigation' ).remove();
				
	        }
	      });
	    }); 

	// Owl Carousel
		$('#unique_blog_main_slider').owlCarousel({
			items : 3,
			itemsCustom : false,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				768:{
					items:2,
					nav:false
				},
				1000:{
					items:3,
					nav:true,
					loop:false
				}
			},
			loop:true,
			margin:0,
			dots : false,
			nav: true,
			navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			autoplay : false,
		});

	// back_to_top
		$(function () {
		    //BACK TO TOP
		    $("body").append('<div class="backtotop"><i class="fa fa-caret-up"></i></div>');
		    $(window).scroll(function () {
		        if ($(this).scrollTop() > 10) {
		            $('.backtotop').fadeIn();
		        } else {
		            $('.backtotop').fadeOut();
		        }
		    });

		    $(".backtotop").click(function () {
		        $("html, body").animate({scrollTop: 0}, 1000);
		    }); // END BACK TO TOP

		    // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
		    jQuery(function ($) {
		        if ($(window).width() > 769) {
		            $('ul.nav li.dropdown').hover(function () {
		                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		            }, function () {
		                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		            });
		        }
		    });
		});

		
    
		/**
		 * Macinary layout file
		 */
		$('.enique_blog_grid').masonry({
			// options
			itemSelector: '.enique_blog_grid_item',
			columnWidth: '.uni_masonry-layout article'
		});


});
