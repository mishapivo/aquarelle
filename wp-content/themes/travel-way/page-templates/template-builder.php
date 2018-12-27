<?php
/**
 * Template Name: AT Builder Page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Acme Themes
 * @subpackage Travel Way
 */
get_header();
global $travel_way_customizer_all_values;
$travel_way_template_builder_header_options_meta = get_post_meta( $post->ID, 'travel_way_template_builder_header_options', true );

if(
	'hide-header' != $travel_way_template_builder_header_options_meta
){
	?>
	<div class="wrapper inner-main-title">
		<?php
		echo travel_way_get_header_normal_image();
		?>
		<div class="container">
			<header class="entry-header init-animate">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				if( 1 == $travel_way_customizer_all_values['travel-way-show-breadcrumb'] ){
					travel_way_breadcrumbs();
				}
				?>
			</header><!-- .entry-header -->
		</div>
	</div>
	<?php
}

while ( have_posts() ) : the_post();

    the_content();

endwhile; // End of the loop.

get_footer();