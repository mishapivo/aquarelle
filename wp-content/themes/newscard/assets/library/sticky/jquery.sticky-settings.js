// sticky
jQuery(window).load(function(){
	var footer_height = jQuery('.site-footer').outerHeight(),
		doc_width = jQuery(window).outerWidth(),
		wp_adminBar = jQuery('#wpadminbar').outerHeight(),
		top_spacing = 20 + wp_adminBar;

	if (doc_width >= 992 ) {
		if (wp_adminBar){
			jQuery(".sticky-sidebar").sticky({ topSpacing: top_spacing, bottomSpacing: footer_height, });
		} else {
			jQuery(".sticky-sidebar").sticky({ topSpacing: 20, bottomSpacing: footer_height, });
		}
	}
});