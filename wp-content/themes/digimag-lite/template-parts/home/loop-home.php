<?php
/**
 * Front Page 3 column.
 *
 * @package Digimag Lite
 */

// Pagination on static front page.
if ( get_query_var( 'paged' ) ) {
	$paged = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) {
	$paged = get_query_var( 'page' );
} else {
	$paged = 1;
}
$query = new WP_Query( array(
	'post_type' => 'post',
	'paged'     => $paged,
) );

$ads_position = get_theme_mod( 'ad_position_homepage', 2 );

if ( $query->have_posts() ) : ?>
	<div class="masonry-posts">
		<?php
		/* Start the Loop */
		while ( $query->have_posts() ) :
			$query->the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
		wp_reset_postdata();
		?>
	</div>
	<?php
	$temp_query = $wp_query;
	$wp_query   = null;
	$wp_query   = $query; // Now $wp_query->max_num_page > 0.
	digimag_lite_pagination();
	// Reset $wp_query.
	$wp_query = null;
	$wp_query = $temp_query;
else :
	get_template_part( 'template-parts/content', 'none' );
endif;
