<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Alacrity Lite
 */

get_header(); ?>
<div id="content" role="main">
  <div class="container">
    <div class="content_box">
    <?php if ( have_posts() ) : ?>
         <header class="page-header">
          <h1 class="entry-title"><?php printf( /* translators: %s: search-term */
            esc_html_e( 'Search Results for: %s', 'alacrity-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header>
        <div class="blog-container">
            <?php /* Start the Loop */
             while (have_posts() ) : the_post();?>
               <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
            <?php endwhile; /* End the Loop */ ?>
        </div> <!-- blog-container-->
        <?php  
        // Previous/next post navigation.
        alacrity_lite_custom_pagination();    
        else : 
        get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
      </div>
      <!-- blog-post --> 
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- .container -->  
</div><!-- #content -->

<?php get_footer(); ?>