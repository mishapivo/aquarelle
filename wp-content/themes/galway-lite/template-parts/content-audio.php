<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galway Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="pb-30 mb-60 twp-article-wrapper clearfix">
    <?php if (!is_single()) { ?>
        <header class="article-header text-center">
            <div class="post-category secondary-font">
                <span class="meta-span">
                    <?php galway_lite_entry_category(); ?>
                </span>
            </div>
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            <div class="entry-meta text-uppercase">
                <?php galway_lite_posted_details(); ?>
            </div><!-- .entry-meta -->
        </header>
    <?php } ?>

        <div class="entry-content twp-entry-content">
            <div class="twp-text-align">
                <?php  
                $read_more_text = esc_html(galway_lite_get_option('read_more_button_text')); 
                the_content(sprintf(
                /* translators: %s: Name of current post. */
                    wp_kses($read_more_text, __('%s <i class="ion-ios-arrow-right read-more-right"></i>', 'galway-lite'), array('span' => array('class' => array()))),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                )); ?>
            </div>
        </div><!-- .entry-content -->
        <?php if (is_single()) { ?>
            <div class="single-meta">
            <?php if (has_category('',$post->ID)) { ?>
                <footer class="entry-footer alternative-bgcolor">
                    <?php galway_lite_entry_category(); ?>
                </footer><!-- .entry-footer -->
            <?php } ?>
            <?php if(has_tag()) { ?>
                <div class="post-tags alternative-bgcolor">
                    <?php galway_lite_entry_tags(); ?>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
</article><!-- #post-## -->
