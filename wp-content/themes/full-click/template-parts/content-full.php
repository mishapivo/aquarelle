<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package full-click
 */

global $business_click_customizer_all_values;


$url = '';
$gradientClass = 'css-gradient';
if(has_post_thumbnail()){
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'business-click-slider-banner-image' );
	$url = $thumb['0'];
	$gradientClass = '';
}
?>
<section class="section img-cover <?php echo esc_html($gradientClass);?>" style="<?php if($url != ''):?>background-image: url(<?php echo esc_url($url);?>);<?php endif;?>">
	<div class="evt-img-overlay">
		<div class="container">
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
							wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'full-click' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					}
					elseif( 'thumbnail-and-full-post' == $business_click_archive_layout ){
						echo "<div class='entry-content-stat'>";
						?> 

						<?php the_content( sprintf(
						/* translators: %s: Name of current post. */
							wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'full-click' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
						echo "</div>";
					}
					else{
						echo "<div class='entry-content-stat'>";
						 ?>
						<?php the_excerpt();
						echo "</div>";
					}
					?>
				</div><!-- .entry-content -->
				</div>
			</article><!-- #post-## -->
		</div>
	</div>
</section>