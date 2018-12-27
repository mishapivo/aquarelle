<?php
/**
* Template Name: Home Page With Slider
* @package Zovees
*/

	get_header();

	get_template_part( 'section-parts/section', 'slider' );

	?>
	<!-- Start Main content Wrapper -->
    <div class="main-content-wrapper">

	<?php

		get_template_part( 'section-parts/section', 'services' );

        get_template_part( 'section-parts/section', 'feature' );

        get_template_part( 'section-parts/section', 'portfolio' );

        get_template_part( 'section-parts/section', 'news' );

        get_template_part( 'section-parts/section', 'call' );
		
        get_template_part( 'section-parts/section', 'thecontent' );

	?>

	</div>

<?php
	get_footer();
?>