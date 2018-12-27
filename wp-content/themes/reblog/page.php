<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

get_header(); ?>
<div class="wrapper singular-section page-section">
	<?php while ( have_posts() ) : the_post(); 
		$reblog_page_featured_img = get_theme_mod( 'reblog_enable_single_page_featured_img', true ); ?>
		<?php if ( has_post_thumbnail() && $reblog_page_featured_img ) : ?>
		    <div class="single-featured-image">
		        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		    </div><!-- .single-featured-image -->
		<?php endif; ?>
	    
	    <header class="entry-header">
	        <?php
			if ( is_singular() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;	        
	        ?>
	    </header>
    <?php endwhile; ?>

    <div id="primary" class="content-area">
	    <main id="main" class="site-main" role="main">
	    	<?php  
	    	while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );
				
				$post_pagination_enable = get_theme_mod( 'reblog_enable_single_page_pagination', false );
				if ( $post_pagination_enable ) {
					the_post_navigation( array(
							'prev_text'          => reblog_get_svg( array( 'icon' => 'left' ) ) . '<span>%title</span>',
							'next_text'          => '<span>%title</span>' . reblog_get_svg( array( 'icon' => 'right' ) ),
						) );
				}

				// Check if page is not homepage
				if ( ! ( is_front_page() && ! is_home() ) ){

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				}

			endwhile; // End of the loop.
	    	?>
	        
	    </main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .wrapper -->

<?php
get_footer();
