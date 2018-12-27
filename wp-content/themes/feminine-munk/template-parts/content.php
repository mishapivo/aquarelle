<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Feminine_Munk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h2 class="entry-title">
            <?php if( ! is_single() ){ ?>
                <a href=" <?php the_permalink(); ?> "> <?php the_title(); ?> </a>
            <?php }else{ the_title(); } ?>
        </h2>
        <?php if ( 'post' === get_post_type() ) : 
                feminine_munk_posted_by(); ?>
            <div class="entry-meta">
                <?php 
                    feminine_munk_posted_on_time();
                    feminine_munk_categories();
                    feminine_munk_comment_count();
                ?>
            </div>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if( ! is_single() ){ ?>
        <a href=" <?php the_permalink(); ?>" class="post-thumbnail">
        <?php }
            if ( has_post_thumbnail() ) {
                if ( is_active_sidebar( 'sidebar' ) ) {
                    the_post_thumbnail( 'feminine-munk-with-sidebar-img' );
                } else {
                    the_post_thumbnail( 'feminine-munk-without-sidebar-img' );
                }
            }
        ?>
    </a>
    
    <div class="entry-content">
        <?php if ( ! is_single() ) {
            the_excerpt();
        } else {
            the_content();
        }
        ?>
    </div><!-- .entry-content -->

    <?php 
        /**
         * Entry Footer (Continue Reading and Edit ) 
         * 
         * @hooked feminine_munk_entry_footer
         * @hooked feminine_munk_edit_post
        */
        do_action( 'feminine_munk_entry_footer' );
        do_action( 'feminine_munk_edit_post' );
    ?>
</article><!-- #post-<?php //the_ID(); ?> -->