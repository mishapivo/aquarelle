jQuery(window).load(function() {
	// Top Header Bar
	jQuery('.menu_locations').click(function() {
		wp.customize.section( 'menu_locations' ).focus();
	});
});