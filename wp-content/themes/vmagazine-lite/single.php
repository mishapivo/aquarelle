<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */

get_header(); 
?>
	 <div class="vmagazine-lite-container">
	 	<?php
		do_action( 'vmagazine_lite_before_body_content' );

		while ( have_posts() ) : 
			the_post();
			$post_id = get_the_ID();

			get_template_part( 'layouts/post/single', 'layout1' );
			/**
			 * Set post view
			 */
			if( function_exists('vmagazine_lite_setPostViews')){
				vmagazine_lite_setPostViews( get_the_ID() );	
			}
			

		endwhile; // End of the loop.

		do_action( 'vmagazine_lite_after_lite_body_content' );
?>
</div>
<?php

get_footer();
