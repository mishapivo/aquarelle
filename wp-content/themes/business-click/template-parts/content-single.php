<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business-click
 */

?>

	<div class="entry-content">
		<header class="entry-header">
			<div class="inner-banner-overlay">
				<?php if (is_singular()){ ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php if (! is_page() ){?>
					<header class="entry-header">
						<div class="entry-meta entry-inner">
							<?php business_click_posted_on(); ?>
							<?php business_click_entry_footer(); ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
				<?php } } ?>
			</div>
		</header><!-- .entry-header -->
		<?php
		$business_click_single_post_image_align = business_click_single_post_image_align(get_the_ID());
		if( 'no-image' != $business_click_single_post_image_align ){
			if( 'left' == $business_click_single_post_image_align ){
				echo "<div class='image-left'>";
				the_post_thumbnail('medium');
			}
			elseif( 'right' == $business_click_single_post_image_align ){
				echo "<div class='image-right'>";
				the_post_thumbnail('medium');
			}
			else{
				echo "<div class='image-full'>";
				the_post_thumbnail('full');
			}
			echo "</div>";/*div end*/
		}
		?>

		
		
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-click' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

