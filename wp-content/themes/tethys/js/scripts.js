jQuery(document).ready(function($) {
	'use strict';

		// Float Header Start

		var stickyOffset = $('.space-header').offset().top;

		$(window).scroll(function(){
			'use strict';
		  var sticky = $('.space-header'),
		      scroll = $(window).scrollTop();
		    
		  if (scroll >= 200) sticky.addClass('fixed');
		  else sticky.removeClass('fixed');
		});

		// Float Header End

		// Search Block Start

		$('.desktop-search-button').on('click', function(){
		'use strict';
			$('.space-header-search-block').addClass('active');
		});

		$('.desktop-search-close-button').on('click', function(){
		'use strict';
			$('.space-header-search-block').removeClass('active');
		});

		// Search Block End

		// Mobile Menu Open Start

		$('.space-mobile-menu-icon').on('click', function(){
		'use strict';
			$('.space-mobile-menu').addClass('active');
		});

		$('.space-mobile-menu-close-button').on('click', function(){
		'use strict';
			$('.space-mobile-menu').removeClass('active');
		});

		// Mobile Menu Open End

		// Mobile Children Start

		$(".menu-item-has-children a").on('click', function(event){
			'use strict';
			  event.stopPropagation();
			  location.href = this.href;
		  	});

			$(".menu-item-has-children").on('click', function(){
			'use strict';
		    	  $(this).addClass("toggled");
		    	  if($(".menu-item-has-children").hasClass("toggled"))
		    	  {
		    	  $(this).children("ul").toggle();
			  }
			  $(this).toggleClass("space-up");
		    	  return false;
	  	});

		// Mobile Children End

		// Scroll To Top Start

		if ($('#scrolltop').length) {

		    var scrollTrigger = 100, // px

		        backToTop = function () {
				'use strict';
		            var scrollTop = $(window).scrollTop();
		            if (scrollTop > scrollTrigger) {
		                $('#scrolltop').addClass('show');
		            } else {
		                $('#scrolltop').removeClass('show');
		            }
		        };

		    backToTop();

		    $(window).on('scroll', function () {
			'use strict';
		        backToTop();
		    });

		    $('#scrolltop').on('click', function (e) {
			'use strict';
		        e.preventDefault();
		        $('html,body').animate({
		            scrollTop: 0
		        }, 1000);
		    });

		}

		// Scroll To Top End

});