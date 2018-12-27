<?php
/**
* Post meta functions
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'clean_grid_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function clean_grid_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'clean-grid' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="clean-grid-tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'clean-grid' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }
}
endif;


if ( ! function_exists( 'clean_grid_grid_cats' ) ) :
function clean_grid_grid_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'clean-grid' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="clean-grid-grid-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'clean-grid' ) . '</div>', $categories_list ); // WPCS: XSS OK.
        }
    }
}
endif;


if ( ! function_exists( 'clean_grid_grid_postmeta' ) ) :
function clean_grid_grid_postmeta() { ?>
    <?php if ( !(clean_grid_get_option('hide_post_author')) || !(clean_grid_get_option('hide_posted_date')) || !(clean_grid_get_option('hide_comments_link')) ) { ?>
    <div class="clean-grid-grid-post-footer">
    <?php if ( !(clean_grid_get_option('hide_post_author')) ) { ?><span class="clean-grid-grid-post-author clean-grid-grid-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(clean_grid_get_option('hide_posted_date')) ) { ?><span class="clean-grid-grid-post-date clean-grid-grid-post-meta"><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(clean_grid_get_option('hide_comments_link')) ) { ?><?php if ( comments_open() ) { ?>
    <span class="clean-grid-grid-post-comment clean-grid-grid-post-meta"><?php comments_popup_link( esc_attr__( 'Leave a comment', 'clean-grid' ), esc_attr__( '1 Comment', 'clean-grid' ), esc_attr__( '% Comments', 'clean-grid' ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'clean_grid_single_cats' ) ) :
function clean_grid_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'clean-grid' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="clean-grid-entry-meta-single clean-grid-entry-meta-single-top"><span class="clean-grid-entry-meta-single-cats"><i class="fa fa-folder-open-o"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'clean-grid' ) . '</span></div>', $categories_list ); // WPCS: XSS OK.
        }
    }
}
endif;


if ( ! function_exists( 'clean_grid_single_postmeta' ) ) :
function clean_grid_single_postmeta() { ?>
    <?php if ( !(clean_grid_get_option('hide_post_author')) || !(clean_grid_get_option('hide_posted_date')) || !(clean_grid_get_option('hide_comments_link')) || !(clean_grid_get_option('hide_post_edit')) ) { ?>
    <div class="clean-grid-entry-meta-single">
    <?php if ( !(clean_grid_get_option('hide_post_author')) ) { ?><span class="clean-grid-entry-meta-single-author"><i class="fa fa-user-circle-o"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(clean_grid_get_option('hide_posted_date')) ) { ?><span class="clean-grid-entry-meta-single-date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(clean_grid_get_option('hide_comments_link')) ) { ?><?php if ( comments_open() ) { ?>
    <span class="clean-grid-entry-meta-single-comments"><i class="fa fa-comments-o"></i>&nbsp;<?php comments_popup_link( esc_attr__( 'Leave a comment', 'clean-grid' ), esc_attr__( '1 Comment', 'clean-grid' ), esc_attr__( '% Comments', 'clean-grid' ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(clean_grid_get_option('hide_post_edit')) ) { ?><?php edit_post_link( esc_html__( 'Edit', 'clean-grid' ), '<span class="edit-link">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;