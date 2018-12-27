<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Seasonal
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" itemscope="" itemtype="http://schema.org/Blog">
       
       		<?php get_sidebar( 'banner' ); ?>
       
			<?php 
            $blogstyle = esc_attr(get_theme_mod( 'blog_style', 'blog-full' ) );
                    
                switch ($blogstyle) {
                    
                    // Default full featured image style
                    case "blog-full" :                         						
						if ( have_posts() ) :
							if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">' . single_post_title() . '</h1></header>';	endif; 	
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', get_post_format() );
							endwhile;
								seasonal_blog_pagination();
							else :
								get_template_part( 'template-parts/content', 'none' ); 
						endif;						
                    break;		        
            
                    // Small featured image style
                    case "blog-small" : 
						echo '<div class="blog-small">';               
						if ( have_posts() ) :
							if ( is_home() && ! is_front_page() ) : 
								echo '<header><h1 class="page-title screen-reader-text">' . single_post_title() . '</h1></header>';	endif; 	
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'small' );
							endwhile;
								seasonal_blog_pagination();
							else :
								get_template_part( 'template-parts/content', 'none' ); 
						endif;
						echo '</div>'; 
                    break;			        
                
                } 
            ?> 
           
            
            <?php get_sidebar( 'bottom' ); ?>
            
        	<?php get_template_part( 'template-parts/site-footer' ); ?>                   

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
