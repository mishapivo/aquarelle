<?php
/**
 * Template part for content posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digimag Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! get_theme_mod( 'single_post_layout' ) ) : ?>
		<header class="entry-header">
			<?php
			digimag_lite_print_single_category();
			the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php
					digimag_lite_posted_by( false );
					digimag_lite_posted_on();
					digimag_lite_print_comment_link();
				?>
			</div><!-- .entry-meta -->

		</header><!-- .entry-header -->
		<div class="entry-media">
			<?php the_post_thumbnail( 'digimag-lite-single' ); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'digimag-lite' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'digimag-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php digimag_lite_entry_footer(); ?>

		<div class="info-box-sharing">
			<h4 class="info-box-heading"><?php esc_html_e( 'Share article:', 'digimag-lite' ); ?></h4>
			<?php sharing_display( '', true ); ?>
		</div>

		<?php digimag_lite_footer_permalink(); ?>
	</footer><!-- .entry-footer -->

	<?php digimag_lite_author_box(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
