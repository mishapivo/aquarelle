/**
 * CPMag theme functions file.
 *
 */
$=jQuery.noConflict();
( function( $ ) {

	/**
	* Theme function declartions
	**/

	var noLazyLoad = jQuery('.cpmagz-post-gallery, .cpmag-carousel')

	/** https://github.com/ressio/lazy-load-xt#horizontal-scroll **/
	$.extend($.lazyLoadXT, {
		edgeY: 200,
		edgeX: 300
	});
	noLazyLoad.lazyLoadXT({show: true});

	function iframeVideo(){
		jQuery('#featured-video-wrap .card-video iframe').each(function(){
			jQuery(this).addClass('sameheight');
		});
	}
	iframeVideo();

	function materializeNav(){
		jQuery('#main-navs li.dropdown').each(function(){
        	var theattr = jQuery(this).find('.dropdown-button').attr('data-activates');
        	jQuery(this).find('.dropdown-button').next().attr( "id", theattr);
      	});
	}
	materializeNav();

	// Slick Carousel - http://kenwheeler.github.io/slick/
	function slickCall(){
		$('.cpmag-carousel').slick({
			responsive: [
			    {
				    breakpoint: 760,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
				    }
			    }
			]
		});
		$('.highlights-carousel').slick({
			responsive: [
		    {
		      breakpoint: 1001,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  	]
		});
		// Post Gallery
		$('.cpmagz-post-gallery').slick();
		//Synced Carousel
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.slider-nav',
			pauseOnHover: true,
		});
		$('.slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			focusOnSelect: true,
			pauseOnHover: true,
			centerMode: true,
			prevArrow: '<span class="slick-prev"></span>',
			nextArrow: '<span class="slick-next"></span>',
			responsive: [
		    {
		      breakpoint: 901,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 501,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
			]
		});
	}

	// Theme Specific Functions
	function equalFeaturedHeight(){
		var video_wrap_height = jQuery('#featured-video-wrap').height()-20;

		jQuery('.card-reveal').css('height', jQuery('.card-reveal').parent('.card-desc').height());
	}
	function cpScrollTop(){
		scroll_top_duration = 900,
        $back_to_top = jQuery('#totop');
        $back_to_top.on('click', function(event){
            event.preventDefault();
            jQuery('body,html').animate({
                scrollTop: 0 ,
                }, scroll_top_duration
            );
        });
    }

    function initMobMenu(){
    	jQuery(".button-collapse").sideNav({
    		menuWidth: 300, // Default is 240
      		edge: 'left'
    	});
    }

    function gmapScroll(){
		jQuery('.map-container iframe').addClass('scrolloff'); // set the pointer events to none on doc ready
        jQuery('.map-container').on('click', function () {
            jQuery('.map-container iframe').removeClass('scrolloff'); // set the pointer events true on click
        });

        jQuery(".map-container iframe").mouseleave(function () {
            jQuery('.map-container iframe').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
        });
	}

	// Fix the header on scroll
	function fixHeader(){
		// Get the header height
		var headerHeight = jQuery('#masthead').height();
		// Get the Scroll
		var scroll = jQuery(window).scrollTop();
        if (scroll > headerHeight) {
            // Add the class if the scroll is greater than header height
            jQuery("#masthead").addClass('fixed-header');
            jQuery("#page").addClass('fixed-head');
        } else {
        	// Remove the class is not.
            jQuery("#page").removeClass('fixed-head');
            jQuery("#masthead").removeClass("fixed-header");
        }
	}
	fixHeader();

	//Fit the Video Height
	function fitVideoHeight(){
		jQuery('.fit-video').each(function(){
			var fitvidheight = jQuery(this).parent().height();
			jQuery(this).find('iframe').addClass('fitiframe').css('height', fitvidheight);
		});
	}

	//	Resize Function.
	function resize() {
		jQuery( window ).resize(function() {
	        equalFeaturedHeight();
	        fitVideoHeight();
	    });
	}

	//	Scroll Function
	function scroll() {
		jQuery( window ).scroll(function() {
	        fixHeader();
	    });
	}

	function resizeAndScroll() {
		resize();
		scroll();
	}

	//Window ready function
	jQuery( document ).ready( function() {

		//	Call the functions
		slickCall();
		initMobMenu();
		equalFeaturedHeight();
		cpScrollTop();
		gmapScroll();
		resizeAndScroll();

		jQuery('html').removeClass('no-js').addClass('js');

		jQuery('#main-navs li.dropdown').each(function(){
	    	var theattr = jQuery(this).find('.dropdown-button').attr('data-activates');
	    	jQuery(this).find('.dropdown-button').next().addClass('classadded').attr( "id", theattr);
	    });

		jQuery(".fit-video").fitVids();
		fitVideoHeight();
		jQuery('#themenu').removeClass('hide');
		jQuery("#themenu").mmenu({
            "extensions": [
              "pageshadow"
            ],
            dragOpen: {
               // drag open options
               open: true
            }
        });
         var API = $("#themenu").data( "mmenu" );
	      $("#menu-close").click(function() {
	         API.close();
	      });

		jQuery("#commentform").validate({
			errorElement: 'span',
			errorClass: 'invalid',
	        // Specify the validation rules
	        rules: {
	            first_name: {
	                required: true,
	            },
	            author: {
	            	required: true,
	            },
	            email_id: {
	                required: true,
	                email: true
	            },
	            email: {
	                required: true,
	                email: true
	            },
	            url: {
	            	required: false
	            },
	            website: {
	            	required: false
	            },
	            textarea1:{
	                required:true
	            },
	            comment:{
	                required:true
	            }
	        },
	        ignore : [],
	        // Specify the validation error messages
	        messages: {
	            first_name:{
	                required: "Please enter your Name",
	            },
	            author:{
	                required: "Please enter your Name",
	            },
	            email_id:{
	                required: "Please enter your Email Address",
	                email: "Please enter a valid Email address",
	            },
	            email:{
	                required: "Please enter your Email Address",
	                email: "Please enter a valid Email address",
	            },
	            textarea1: {
	                required: "Please put your comments in the comment field."
	            },
	            comment: {
	            	required: "Please put your comments in the comment field."
	            }
	        },

	        submitHandler: function(form) {
	            form.submit();
	        }
	    });

	});

	//Window load function
	jQuery(window).load(function() {
	    jQuery('#site-loader').hide();
	});

} )( jQuery );

//# sourceMappingURL=app.js.map
