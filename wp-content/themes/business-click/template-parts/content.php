<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package business-click
 */

global $business_click_customizer_all_values;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <div class="wrapper-grid">

	<div class="entry-content <?php if (!has_post_thumbnail( )) { echo 'non-image';}?>">
		<?php
		$business_click_archive_layout = $business_click_customizer_all_values['business-click-archive-layout'];
		$business_click_archive_image_align = $business_click_customizer_all_values['business-click-archive-image-align']; ?>
		<a href="<?php the_permalink()?>"><h2><?php echo get_the_title(); ?></h2></a> 
		<div class="entry-meta">
			<?php business_click_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php 
		if( 'excerpt-only' == $business_click_archive_layout ){ 
			echo wp_trim_excerpt( get_the_excerpt() );

		}
		elseif( 'full-post' == $business_click_archive_layout ){ 
			
			the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'business-click' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}
		elseif( 'thumbnail-and-full-post' == $business_click_archive_layout ){
			if (has_post_thumbnail( )) {
				if( 'left' == $business_click_archive_image_align ){
					echo "<div class='image-left post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('medium');
				}
				elseif( 'right' == $business_click_archive_image_align ){
					echo "<div class='image-right post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('medium');
				}
				else{
					echo "<div class='image-full post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('business-click-slider-banner-image');
				}
				echo "</a>";
				echo "</div>";/*div end*/ 
			}
				echo "<div class='entry-content-stat'>";
			?> 

			<?php the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'business-click' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			echo "</div>";
		}
		else{
			if (has_post_thumbnail( )) {
				if( 'left' == $business_click_archive_image_align ){
					echo "<div class='image-left post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('medium');
				}
				elseif( 'right' == $business_click_archive_image_align ){
					echo "<div class='image-right post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('medium');
				}
				else{
					echo "<div class='image-full post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('business-click-slider-banner-image');
				}
				echo "</a>";
				echo "</div>";/*div end*/
			}
				echo "<div class='entry-content-stat'>";
			 ?>
			<header class="entry-header">
				<?php
				if ( is_single() ) {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				} 
				
				?>
			</header><!-- .entry-header -->
			<?php the_excerpt();
			echo "</div>";
		}
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-click' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->