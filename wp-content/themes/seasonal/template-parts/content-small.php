<?php
/**
 * The template for displaying blog summaries
 *
 * Used for the Blog Small Style.
 *
 * @package Seasonal
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
	<?php seasonal_post_thumbnail(); ?>
    <header class="entry-header">
		<?php seasonal_post_header(); ?>
        <div class="category-list">      
            <?php if( esc_attr(get_theme_mod( 'show_categories', 1 ) ) ) {
                seasonal_categories_list();
            } ?>
        </div>      

 		<div class="entry-meta">
            <?php seasonal_entry_meta(); ?>
        </div>
        
    </header><!-- .entry-header -->

 

  <div class="entry-content">
    <?php
			/* translators: %s: Name of current post 
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s', 'seasonal' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );		*/
			
			the_excerpt();
			
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