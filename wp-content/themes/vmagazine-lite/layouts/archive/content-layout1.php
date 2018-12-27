<?php
/**
 * Template part for displaying archive posts in layout 1.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="archive-wrapper">
		<?php 
		$image_id = get_post_thumbnail_id();
        $img_src = vmagazine_lite_home_element_img('vmagazine-lite-vertical-slider-thumb');
        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

        if( $img_src ): ?>
			<div class="entry-thumb">
				<a class="thumb-zoom" href="<?php the_permalink(); ?>">
					<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
					<div class="image-overlay"></div>
				</a>
			</div><!-- .entry-thumb -->
		<?php endif; ?>
		<div class="list-left-wrap">
			<div class="entry-header">
				<?php if( 'post' === get_post_type() ) { ?>
					<div class="entry-meta">
						<?php vmagazine_lite_icon_meta();?>
					</div><!-- .entry-meta -->
				<?php } ?>
			</div><!-- .entry-header.layout1-header -->
			<div class="post-title-wrap">
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						 <?php the_title(); ?>
					</a>
				</h2>
			</div>
			<div class="entry-content">
				<p>
				<?php
					$vmagazine_lite_post_content = get_the_content();
					$vmagazine_lite_excerpt_length = get_theme_mod( 'vmagazine_lite_archive_excerpt_lenght', '150' );
					echo vmagazine_lite_get_excerpt_content( $vmagazine_lite_excerpt_length ); // WPCS: XSS OK.
				?>
				</p>
				<?php 
					$vmagazine_lite_read_more_txt = get_theme_mod( 'vmagazine_lite_archive_read_more_text', __( 'Read More', 'vmagazine-lite' ) );
				 ?>		
				<a class="vmagazine-lite-archive-more" href="<?php the_permalink(); ?>">
					<?php echo esc_html( $vmagazine_lite_read_more_txt ); ?>
				</a>
			</div><!-- .entry-content -->
		</div><!-- .list-left-wrap -->
	</div><!-- .archive-btm-wrapper -->
</article><!-- #post-## -->