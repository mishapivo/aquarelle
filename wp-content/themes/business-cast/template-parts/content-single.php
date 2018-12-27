<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Cast
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Hook - business_cast_single_image.
	 *
	 * @hooked business_cast_add_image_in_single_display - 10
	 */
	do_action( 'business_cast_single_image' );
	?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php business_cast_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-cast' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php business_cast_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

