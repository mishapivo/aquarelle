<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

get_header(); 
if ( true === apply_filters( 'edumag_filter_frontpage_content_enable', true ) ) : 

// make content full width if front-page-sidebar is disabled in static front page
if ( is_front_page() && ! is_home() ) {
	$sidebar_layout = edumag_layout();

	$page_sidebar 	= get_post_meta( get_the_id(), 'edumag-selected-sidebar', true );
	if ( empty( $page_sidebar ) ) {
    	$page_sidebar ='sidebar-1';
    } 
	if ( ! is_active_sidebar( $page_sidebar ) || ( 'no-sidebar' == $sidebar_layout ) ) {
		$sidebar_disabled_class = 'sidebar-disabled';
	} else {
		$sidebar_disabled_class = '';
	}
} else {
	$sidebar_disabled_class = '';
}
?>
<div class="container page-section">
	<div id="primary" class="content-area <?php echo esc_attr( $sidebar_disabled_class ); ?>">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// Check if page is not homepage
				if ( ! ( is_front_page() && ! is_home() ) ){

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	if ( edumag_is_sidebar_enable() ) {
		get_sidebar();
	} 
endif;
?>

</div><!-- .container -->
<?php
get_footer();
