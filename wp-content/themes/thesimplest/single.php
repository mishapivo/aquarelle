<?php get_header(); ?>

<?php
/**
 * TheSimplest Layout Options
 */
$thesimplest_site_layout    =   get_theme_mod( 'thesimplest_layout_options_setting' );
$thesimplest_layout_class   =   'col-md-8 col-sm-12';

if( $thesimplest_site_layout == 'left-sidebar' && is_active_sidebar( 'sidebar-1' ) ) :
	$thesimplest_layout_class = 'col-md-8 col-sm-12  site-main-right';
elseif( $thesimplest_site_layout == 'no-sidebar' || !is_active_sidebar( 'sidebar-1' ) ) :
	$thesimplest_layout_class = 'col-md-8 col-sm-12 col-md-offset-2';
endif;

?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main <?php echo esc_attr($thesimplest_layout_class); ?>" role="main">

			<?php
			// Start the loop
			while( have_posts() ) : the_post();

                // Include the single post content template.
                get_template_part( 'template-parts/content', 'single' );

                if( is_singular( 'attachment' ) ) {
	                // Parent post navigation.
                    the_post_navigation( array(
                            'prev_text'     =>  _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'thesimplest' ),
                    ) );
                } elseif( is_singular( 'post' ) ) {
	                // Previous/next post navigation.
                    the_post_navigation( array(
                            'next_text'     =>  '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'thesimplest' ) . '</span>' . '<span class="screen-reader-text">' . __( 'Next post:', 'thesimplest' ) . '</span> ' . '<span class="post-title">%title</span>' ,
                            'prev_text'     =>  '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'thesimplest' ) . '</span>' . '<span class="screen-reader-text">' . __( 'Previous post:', 'thesimplest' ) . '</span> ' . '<span class="post-title">%title</span>' ,
                    ) );
                }

                // If comments are open or we have at least one comment, load up the comment template.
                if( comments_open() || get_comments_number() ) {
                    comments_template();
                }

            // End the loop
			endwhile;

			?>

		</main><!-- .site-main -->
		<?php get_sidebar(); ?>
	</div><!-- content-area -->

<?php get_footer(); ?>