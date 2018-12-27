(function( $ ) {

	// NAVIGATION CALLBACK FOR Woocommerce MENU
	var ww = jQuery(window).width();
	jQuery(document).ready(function() { 
		jQuery(".topbar .nav li a").each(function() {
			if (jQuery(this).next().length > 0) {
				jQuery(this).addClass("parent");
			};
		})
		jQuery(".toggletopMenu").click(function(e) { 
			e.preventDefault();
			jQuery(this).toggleClass("active");
			jQuery(".topbar .nav").slideToggle('fast');
		});
		adjustMenu();
	})

	// navigation orientation resize callbak
	jQuery(window).bind('resize orientationchange', function() {
		ww = jQuery(window).width();
		adjustMenu();
	});

	var adjustMenu = function() {
		if (ww < 720) {
			jQuery(".toggletopMenu").css("display", "block");
			if (!jQuery(".toggletopMenu").hasClass("active")) {
				jQuery(".topbar .nav").hide();
			} else {
				jQuery(".topbar .nav").show();
			}
			jQuery(".topbar .nav li").unbind('mouseenter mouseleave');
		} else {
			jQuery(".toggletopMenu").css("display", "none");
			jQuery(".topbar .nav").show();
			jQuery(".topbar .nav li").removeClass("hover");
			jQuery(".topbar .nav li a").unbind('click');
			jQuery(".topbar .nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
				jQuery(this).toggleClass('hover');
			});
		}
	}


	// NAVIGATION CALLBACK
	var ww = jQuery(window).width();
	jQuery(document).ready(function() { 
		jQuery(".menu-header .nav li a").each(function() {
			if (jQuery(this).next().length > 0) {
				jQuery(this).addClass("parent");
			};
		})
		jQuery(".toggleMenu").click(function(e) { 
			e.preventDefault();
			jQuery(this).toggleClass("active");
			jQuery(".menu-header .nav").slideToggle('fast');
		});
		adjustMenu();
	})

	// navigation orientation resize callbak
	jQuery(window).bind('resize orientationchange', function() {
		ww = jQuery(window).width();
		adjustMenu();
	});

	var adjustMenu = function() {
		if (ww < 720) {
			jQuery(".toggleMenu").css("display", "block");
			if (!jQuery(".toggleMenu").hasClass("active")) {
				jQuery(".menu-header .nav").hide();
			} else {
				jQuery(".menu-header .nav").show();
			}
			jQuery(".menu-header .nav li").unbind('mouseenter mouseleave');
		} else {
			jQuery(".toggleMenu").css("display", "none");
			jQuery(".menu-header .nav").show();
			jQuery(".menu-header .nav li").removeClass("hover");
			jQuery(".menu-header .nav li a").unbind('click');
			jQuery(".menu-header .nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
				jQuery(this).toggleClass('hover');
			});
		}
	}

	$(document).ready(function(){
		$(".product-cat").hide();
	    $("button").click(function(){
	        $(".product-cat").toggle();
	    });
	});

})( jQuery );