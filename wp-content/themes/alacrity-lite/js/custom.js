// NAVIGATION CALLBACK
var ww = jQuery(window).width();
jQuery(document).ready(function() { 
jQuery(".mainnav li a").each(function() {
if (jQuery(this).next().length > 0) {
jQuery(this).addClass("parent");
};
})
jQuery(".toggleMenu").click(function(e) { 
e.preventDefault();
jQuery(this).toggleClass("active");
jQuery(".mainnav").slideToggle('fast');
});
adjustMenu();
})

// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
ww = jQuery(window).width();
adjustMenu();
});

var adjustMenu = function() {
if (ww < 992) {
jQuery(".toggleMenu").css("display", "block");
if (!jQuery(".toggleMenu").hasClass("active")) {
jQuery(".mainnav").hide();
} else {
jQuery(".mainnav").show();
}
jQuery(".mainnav li").unbind('mouseenter mouseleave');
} else {
jQuery(".toggleMenu").css("display", "none");
jQuery(".mainnav").show();
jQuery(".mainnav li").removeClass("hover");
jQuery(".mainnav li a").unbind('click');
jQuery(".mainnav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
jQuery(this).toggleClass('hover');
});
}
}

/* ============= Custom Js ==================*/

jQuery(document).ready(function(){
	"use strict";
	if( jQuery( '#slider' ).length > 0 ){
	jQuery('.nivoSlider').nivoSlider({
	effect:'fold',
	animSpeed: 500,
	pauseTime: 100,
	directionNav: true,
	controlNav: false,
	pauseOnHover:false,
	});
	}
});