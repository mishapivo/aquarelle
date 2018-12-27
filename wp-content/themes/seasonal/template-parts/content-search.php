<?php
/**
 * The default template for displaying search results
 *
 * @package Seasonal
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
       		<div class="entry-meta">
            <?php seasonal_entry_meta(); ?>
        </div>
      </header>

      <div class="entry-summary">
        <?php the_excerpt(); ?>
      </div>
      
      <footer></footer>
      
</article>
