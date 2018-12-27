<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package st-blog
 */
global $st_blog_customizer_all_values;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink();?>"><div class="image">
		<?php 
		if(is_single()) {
			st_blog_post_thumbnail(); 
		}
		else {
			// archives: for image_size - Box Post Layout
			if( 'full-width' == $st_blog_customizer_all_values['st-blog-default-body-layout'] ) {
			    $imgsize = 'large';
			} else {
			    $imgsize = 'st-blog-feature-content-post-image';
			}
			the_post_thumbnail($imgsize); 
		}
		?>
	</div></a>
	
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			if( 1 == $st_blog_customizer_all_values['latest-post-show-title'] ){
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				st_blog_posted_by();
				st_blog_posted_on();
				
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		// added for design
		if( is_singular() ) 
		{
			the_content();
		}
		else
		{
			if ( 1 == $st_blog_customizer_all_values['latest-post-show-excerpt'] ){
				the_excerpt();
			}
		}	
		

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'st-blog' ),
			'after'  => '</div>',
		) );

		// additional sections
		st_blog_additional_article();
		?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //st_blog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post- -->
