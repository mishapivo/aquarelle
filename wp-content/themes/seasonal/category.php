<?php
/**
 * The Category template file
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
							echo '<header class="page-header">';	
							the_archive_title( '<h1 class="page-title" itemprop="name">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							echo '</header>';									
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
							echo '<header class="page-header">';	
							the_archive_title( '<h1 class="page-title" itemprop="name">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
							echo '</header>';	
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
