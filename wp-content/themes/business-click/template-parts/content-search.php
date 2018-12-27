<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business-click
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="wrapper-grid">
			<div class="entry-summary">
				<?php if ( has_post_thumbnail() ): ?>
				<div class='image-full post-image'>
		        	<a href="<?php echo esc_url(get_permalink() );?>">
		        		<?php the_post_thumbnail( 'business-click-slider-banner-image', array( 'class' => 'aligncenter' ) ); ?>
		        	</a>
		        </div>
		        <?php endif ?>

				<?php //the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php business_click_posted_on(); ?>
					<?php business_click_entry_footer(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div>
	</article><!-- #post-## -->
