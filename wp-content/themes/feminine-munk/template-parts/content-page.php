<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Feminine_Munk
 */
$sidebar_layout = feminine_munk_sidebar_layout();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <?php
    if ( has_post_thumbnail() ) {
        if ( $sidebar_layout == 'sidebar' ) {
            the_post_thumbnail( 'feminine-munk-with-sidebar-img' );
        } else {
            the_post_thumbnail( 'feminine-munk-without-sidebar-img' );
        }
    }
    ?>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'feminine-munk' ),
            'after' => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

 <?php 
        /**
         * Entry Footer (Continue Reading and Edit ) 
         * 
         * @hooked feminine_munk_edit_post
        */
        do_action( 'feminine_munk_edit_post' );
    ?>
</article><!-- #post-<?php the_ID(); ?> -->