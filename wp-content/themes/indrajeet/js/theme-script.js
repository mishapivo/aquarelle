
(function($){

	// SmartMenus init
	$(function() {
	$('#primary-menu').smartmenus({
		subMenusSubOffsetX: 1,
		subMenusSubOffsetY: -8
	});
	});
	// SmartMenus mobile menu toggle button
	$(function() {
	var $mainMenuState = $('#main-menu-state');
	if ($mainMenuState.length) {
		// animate mobile menu
		$mainMenuState.change(function(e) {
		var $menu = $('#primary-menu');
		if (this.checked) {
			$menu.hide().slideDown(250, function() { $menu.css('display', ''); });
		} else {
			$menu.show().slideUp(250, function() { $menu.css('display', ''); });
		}
		});
		// hide mobile menu beforeunload
		$(window).bind('beforeunload unload', function() {
		if ($mainMenuState[0].checked) {
			$mainMenuState[0].click();
		}
		});
	}
	});
  //end

  jQuery('.theme-top-header .header-info a').click( function(e){
  	 e.preventDefault();
	  if (jQuery(this).parent().hasClass('disabled'))
	    return false; // Do something else in here if required
	  else
	    window.location.href = jQuery(this).attr('href');
  });

  $('#top-mobile-menu').click(function(){
  	$('.indrajeet-theme-topnavbar-collapse').slideToggle();
  	$(this).toggleClass('open');
  });




	$(document).ready(function() {
			// grab the initial top offset of the navigation
		   	var stickyNavTop = $('#header').offset().top;
		   	
		   	// our function that decides weather the navigation bar should have "fixed" css position or not.
		   	var stickyNav = function(){
			    var scrollTop = $(window).scrollTop(); // our current vertical position from the top
			         
			    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
			    // otherwise change it back to relative
			    if (scrollTop > stickyNavTop) { 
			        $('#header').addClass('sticky');
			    } else {
			        $('#header').removeClass('sticky'); 
			    }
			};

			stickyNav();
			// and run it again every time you scroll
			$(window).scroll(function() {
				stickyNav();
			});


		});

  $('#onload').hide();

})(jQuery);   