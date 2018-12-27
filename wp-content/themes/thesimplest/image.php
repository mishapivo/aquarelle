<?php

/**
 * The template for displaying image attachments
 *
 * @since TheSimplest 1.0
 */

get_header(); ?>

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
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


					<div id="image-navigation" class="navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'thesimplest' ) ); ?></div>
							<div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'thesimplest' ) ); ?></div>
						</div><!-- .nav-links -->
					</div><!-- .image-navigation -->

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">','</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="entry-attachment">
							<?php
							/**
							 * Filter the default thesimplest image attachment size.
							 *
							 * @since TheSimplest 1.0
							 *
							 * @param string $image_size Image size. Default 'large'.
							 */
							$image_size =   apply_filters( 'thesimplest_attachment_size', 'large' );

							echo wp_get_attachment_image( get_the_ID(), $image_size );

							thesimplest_excerpt( 'entry-caption' );
							?>


						</div><!-- .entry-attachment -->

						<?php
						the_content();
						wp_link_pages( array(
							'before'        =>  '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'thesimplest' ) . '</span>',
							'after'         =>  '</div>',
							'link_before'   =>  '<span>',
							'link_after'    =>  '</span>',
							'pagelink'      => '<span class="screen-reader-text">' . __( 'Page', 'thesimplest' ) . ' </span>%',
							'separator'     => '<span class="screen-reader-text">, </span>',
						) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php
						// Retrieve attachment metadata.
						$metadata   =   wp_get_attachment_metadata();
						if( $metadata ) {
							printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
								esc_html_x( 'Full size', 'Used before full size attachment link.', 'thesimplest' ),
								esc_url( wp_get_attachment_url() ),
								absint( $metadata['width'] ),
								absint( $metadata['height'] )
							);
						}
						?>

						<?php
						edit_post_link(
							sprintf(
							/* translators: %s: Name of current post */
								__( 'Edit<span class="screen-reader-text"> "%s"', 'thesimplest' ),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer>
				</article>


				<?php

				the_post_navigation( array(
					'prev_text'     =>  _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent Post Link', 'thesimplest' ),
				) );

				// If comments are open or we have at least one comment, load up the comment template.
				if( comments_open() || get_comments_number() ) {
					comments_template();
				}

				// End the loop.
			endwhile;
			?>

		</main><!-- .site-main -->
		<?php get_sidebar(); ?>
	</div><!-- content-area -->

<?php get_footer(); ?>