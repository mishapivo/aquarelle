<?php
/**
 * The template for displaying Link post formats.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php mohini_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php
		/**
		 * mohini_before_content hook.
		 *
		 *
		 * @hooked mohini_featured_page_header_inside_single - 10
		 */
		do_action( 'mohini_before_content' );
		?>

		<header class="entry-header">
			<?php
			/**
			 * mohini_before_entry_title hook.
			 *
			 */
			do_action( 'mohini_before_entry_title' );

			the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( mohini_get_link_url() ) ), '</a></h2>' );

			/**
			 * mohini_after_entry_title hook.
			 *
			 *
			 * @hooked mohini_post_meta - 10
			 */
			do_action( 'mohini_after_entry_title' );
			?>
		</header><!-- .entry-header -->

		<?php
		/**
		 * mohini_after_entry_header hook.
		 *
		 *
		 * @hooked mohini_post_image - 10
		 */
		do_action( 'mohini_after_entry_header' );

		if ( mohini_show_excerpt() ) : ?>

			<div class="entry-summary" itemprop="text">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<?php else : ?>

			<div class="entry-content" itemprop="text">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'mohini' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

		<?php endif;

		/**
		 * mohini_after_entry_content hook.
		 *
		 *
		 * @hooked mohini_footer_meta - 10
		 */
		do_action( 'mohini_after_entry_content' );

		/**
		 * mohini_after_content hook.
		 *
		 */
		do_action( 'mohini_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
