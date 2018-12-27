<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Travel Way
 */
$no_blog_image = '';
global $travel_way_customizer_all_values;


?>
<article id="post-<?php the_ID(); ?>" <?php post_class('init-animate'); ?>>
	<div class="content-wrapper">
		<?php
		$travel_way_hide_single_featured_image = travel_way_featured_image_display( );
		if( has_post_thumbnail() && 'disable' != $travel_way_hide_single_featured_image ):
			echo '<div class="image-wrap"><figure class="post-thumb">';
			the_post_thumbnail( $travel_way_hide_single_featured_image );
			if ( 'post' === get_post_type() && has_category() ) : ?>
                <header class="entry-header <?php echo $no_blog_image; ?>">
                    <div class="entry-meta">
						<?php
						travel_way_cats_lists()
						?>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->
				<?php
				echo "</figure></div>";
			endif;
		endif;
		?>
		<div class="entry-content <?php echo $no_blog_image?>">
			
            <div class="entry-header-title">
	            <?php
	            the_title( '<h1 class="entry-title">', '</h1>' );
	            ?>
            </div>
            <footer class="entry-footer">
	            <?php travel_way_entry_footer(); ?>
            </footer><!-- .entry-footer -->
			<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-way' ),
				'after'  => '</div>',
			) );
            ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->