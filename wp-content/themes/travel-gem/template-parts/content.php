<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Gem
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content-outer-wrapper">

		<?php travel_gem_archive_post_thumbnail(); ?>

		<div class="entry-content-wrapper">

			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php travel_gem_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

		</div><!-- .entry-content-wrapper -->

	</div><!-- .entry-content-outer-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->
