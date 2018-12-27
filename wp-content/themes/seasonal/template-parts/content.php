<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive.
 *
 * @package Seasonal
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">

    <header class="entry-header">
		<?php seasonal_post_header(); ?>
        <div class="category-list">      
            <?php if( esc_attr(get_theme_mod( 'show_categories', 1 ) ) ) {
                seasonal_categories_list();
            } ?>
        </div>      
 
 		<?php seasonal_post_thumbnail(); ?>        
 
 		<div class="entry-meta">
            <?php seasonal_entry_meta(); ?>
        </div>
    </header><!-- .entry-header -->

 

  <div class="entry-content">
    <?php
			/* translators: %s: Name of current post */		
			the_content( sprintf(
				__( 'Continue reading %s', 'seasonal' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );		
			
    // load our nav is our post is split into multiple pages
	seasonal_multipage_nav(); 
    ?>
  </div><!-- .entry-content -->
  
  <footer class="entry-footer">
  <?php
    if( is_single() && esc_attr(get_theme_mod( 'show_tags_list', 1 ) ) ) {
      seasonal_tags_list( '<div class="entry-tags">', '</div>' );
    }
  ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->