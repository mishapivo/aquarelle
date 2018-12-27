<?php 
		// Template Name: Business Template
		get_header();
		get_template_part('index','slider');
		do_action( 'spiceb_spicepress_sections', false );
		get_template_part('index','news');
		get_footer();
?>
		