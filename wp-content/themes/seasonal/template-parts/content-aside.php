<?php
/**
 * The template for displaying aside post formats
 *
 * @package Seasonal
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
    

    
        <div class="category-list">      
            <?php 
			$format = get_post_format();
				if ( current_theme_supports( 'post-formats', $format ) ) {
					printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
					sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'seasonal' ) ),
					esc_url( get_post_format_link( $format ) ),
					get_post_format_string( $format )
				);
			}
	 		?>        
        </div>      
 
 		<?php seasonal_post_thumbnail(); ?>        
 
 		<div class="entry-meta">
            <?php seasonal_entry_meta(); ?>
        </div>
    </header><!-- .entry-header -->

 

  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->
  
</article><!-- #post-## -->
