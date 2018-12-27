jQuery(document).ready(function($) {
   
   // It contains tab
   if($('.nav-tab-wrapper').length > 0) {
        profitmag_tabs();
   }
   
   
   function profitmag_tabs() {
    // Initially hide all tab content 
    $('.group').hide();
    
    
    // Find if a selected tab is saved in localStorage
		var active_tab = '';
		if ( typeof(localStorage) != 'undefined' ) {
			active_tab = localStorage.getItem("active_tab");
		}

		// If active tab is saved and exists, load it's .group
		if (active_tab != '' && $(active_tab).length ) {
			$(active_tab).fadeIn();
			$(active_tab + '-tab').addClass('options-nav-tab-active');
		} else {
			$('.group:first').fadeIn();
			$('.nav-tab-wrapper a:first').addClass('options-nav-tab-active');
		}

		// Bind tabs clicks
		$('.nav-tab-wrapper a').click(function(evt) {

			evt.preventDefault();

			// Remove active class from all tabs
			$('.nav-tab-wrapper a').removeClass('options-nav-tab-active');

			$(this).addClass('options-nav-tab-active').blur();

			var group = $(this).attr('href');

			if (typeof(localStorage) != 'undefined' ) {
				localStorage.setItem("active_tab", $(this).attr('href') );
			}

			$('.group').hide();
			$(group).fadeIn();
            


		});
     
   }
   
   // Show Post Selection for Slider
   $('#single_post_slider').click(function() {
        $('.cat-as-slider').hide();
        $('.post-as-slider').show();
   });
   
   // Show Category Selection for Slider
   $('#cat_post_slider').click(function() {
        $('.cat-as-slider').show();
        $('.post-as-slider').hide();
   });
   if($('#single_post_slider input').is(':checked')){
  	$('.post-as-slider').show();
    $('.cat-as-slider').hide();
   }
    if($('#cat_post_slider input').is(':checked')){
  	 $('.cat-as-slider').show();
     $('.post-as-slider').hide();
    }
    
});