<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galway Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header article-header text-center">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header><!-- .entry-header -->
            <div class="entry-meta">
                <?php galway_lite_posted_details(); ?>
            </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

</article><!-- #post-## -->
