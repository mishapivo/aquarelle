<?php
/**
* Post meta functions
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'wp_masonry_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function wp_masonry_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wp-masonry' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="wp-masonry-tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'wp-masonry' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }
}
endif;


if ( ! function_exists( 'wp_masonry_grid_cats' ) ) :
function wp_masonry_grid_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'wp-masonry' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="wp-masonry-grid-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'wp-masonry' ) . '</div>', $categories_list ); // WPCS: XSS OK.
        }
    }
}
endif;


if ( ! function_exists( 'wp_masonry_grid_postmeta' ) ) :
function wp_masonry_grid_postmeta() { ?>
    <?php if ( !(wp_masonry_get_option('hide_post_author_home')) || !(wp_masonry_get_option('hide_posted_date_home')) || !(wp_masonry_get_option('hide_comments_link_home')) ) { ?>
    <div class="wp-masonry-grid-post-footer">
    <?php if ( !(wp_masonry_get_option('hide_post_author_home')) ) { ?><span class="wp-masonry-grid-post-author wp-masonry-grid-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_posted_date_home')) ) { ?><span class="wp-masonry-grid-post-date wp-masonry-grid-post-meta"><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_comments_link_home')) ) { ?><?php if ( comments_open() ) { ?>
    <span class="wp-masonry-grid-post-comment wp-masonry-grid-post-meta"><?php comments_popup_link( esc_attr__( 'Leave a comment', 'wp-masonry' ), esc_attr__( '1 Comment', 'wp-masonry' ), esc_attr__( '% Comments', 'wp-masonry' ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'wp_masonry_single_cats' ) ) :
function wp_masonry_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'wp-masonry' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="wp-masonry-entry-meta-single wp-masonry-entry-meta-single-top"><span class="wp-masonry-entry-meta-single-cats"><i class="fa fa-folder-open-o"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'wp-masonry' ) . '</span></div>', $categories_list ); // WPCS: XSS OK.
        }
    }
}
endif;


if ( ! function_exists( 'wp_masonry_single_postmeta' ) ) :
function wp_masonry_single_postmeta() { ?>
    <?php if ( !(wp_masonry_get_option('hide_post_author')) || !(wp_masonry_get_option('hide_posted_date')) || !(wp_masonry_get_option('hide_comments_link')) || !(wp_masonry_get_option('hide_post_edit')) ) { ?>
    <div class="wp-masonry-entry-meta-single">
    <?php if ( !(wp_masonry_get_option('hide_post_author')) ) { ?><span class="wp-masonry-entry-meta-single-author"><i class="fa fa-user-circle-o"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_posted_date')) ) { ?><span class="wp-masonry-entry-meta-single-date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_comments_link')) ) { ?><?php if ( comments_open() ) { ?>
    <span class="wp-masonry-entry-meta-single-comments"><i class="fa fa-comments-o"></i>&nbsp;<?php comments_popup_link( esc_attr__( 'Leave a comment', 'wp-masonry' ), esc_attr__( '1 Comment', 'wp-masonry' ), esc_attr__( '% Comments', 'wp-masonry' ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_post_edit')) ) { ?><?php edit_post_link( esc_html__( 'Edit', 'wp-masonry' ), '<span class="edit-link">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;