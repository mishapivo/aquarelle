<?php
/**
* More Custom Functions
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get custom-logo URL
function wp_masonry_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $wp_masonry_custom_logo_id = get_theme_mod( 'custom_logo' );
    $wp_masonry_logo = wp_get_attachment_image_src( $wp_masonry_custom_logo_id , 'full' );
    return $wp_masonry_logo[0];
}

// Category ids in post class
function wp_masonry_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
        }
        return $classes;
}
add_filter('post_class', 'wp_masonry_category_id_class');

// Change excerpt length
function wp_masonry_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 20;
    if ( wp_masonry_get_option('read_more_length') ) {
        $read_more_length = wp_masonry_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'wp_masonry_excerpt_length');

// Change excerpt more word
function wp_masonry_excerpt_more($more) {
       if ( is_admin() ) {
         return $more;
       }
       return '...';
}
add_filter('excerpt_more', 'wp_masonry_excerpt_more');

function wp_masonry_site_header_style() {
       $site_header_style = 'full-width';
       return $site_header_style;
}

// Adds custom classes to the array of body classes.
function wp_masonry_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'wp-masonry-group-blog';
    }

    if( is_singular() ) {
        if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
           $classes[] = 'wp-masonry-layout-full-width';
        }
    } else {
        if ( is_404() ) {
            $classes[] = 'wp-masonry-layout-full-width';
        } else {
            $classes[] = 'wp-masonry-layout-full-width';
        }
    }

    if ( ('full-width' === wp_masonry_site_header_style()) ) {
        $classes[] = 'wp-masonry-header-full-width';
    }

    if ( !is_active_sidebar( 'wp-masonry-home-bottom-widgets' ) && !is_active_sidebar( 'wp-masonry-bottom-widgets' ) ) {
        $classes[] = 'wp-masonry-no-bottom-widgets';
    }

    return $classes;
}
add_filter( 'body_class', 'wp_masonry_body_classes' );


function wp_masonry_post_style() {
       $post_style = 'grid';
       return $post_style;
}


function wp_masonry_grid_thumb_style() {
       $thumb_style = 'wp-masonry-hauto-image';
       return $thumb_style;
}


function wp_masonry_post_grid_cols() {
       $post_column = 'wp-masonry-4-col';
       return $post_column;
}

function wp_masonry_grid_no_thumb_url() {
       $thumb_url = get_template_directory_uri() . '/assets/images/no-image-4-4.jpg';
       return $thumb_url;
}

function wp_masonry_header_image() {
    if ( get_header_image() ) : ?>
    <div class="wp-masonry-header-image clearfix">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="wp-masonry-header-img-link">
        <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="wp-masonry-header-img"/>
    </a>
    </div>
    <?php endif;
}

function wp_masonry_featured_header_image() {
    if ( wp_masonry_get_option('disable_featured_header') ) { return; }
    if( is_singular() ) {
        if ( has_post_thumbnail() ) {
            if ( !(wp_masonry_get_option('hide_thumbnail_single')) ) {
                    if ( wp_masonry_get_option('thumbnail_link') == 'no' ) { ?>
                        <div class="wp-masonry-header-image clearfix">
                        <?php the_post_thumbnail('wp-masonry-header-image', array('class' => 'wp-masonry-header-img')); ?>
                        </div>
                    <?php } else { ?>
                        <div class="wp-masonry-header-image clearfix">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="wp-masonry-header-img-link"><?php the_post_thumbnail('wp-masonry-header-image', array('class' => 'wp-masonry-header-img')); ?></a>
                        </div>
            <?php   }
            } else {
                    wp_masonry_header_image();
            }
        } else {
                wp_masonry_header_image();
        }
    } else {
        wp_masonry_header_image();
    }
}