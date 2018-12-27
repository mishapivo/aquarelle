<?php
/**
* Top Featured Area
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'blogwp_featured_content' ) ) :

function blogwp_featured_content() { ?>
<div class="blogwp-featured-content">
<div class="blogwp-outer-wrapper">
<div class="blogwp-featured-content-inner clearfix">

    <?php
    $featured_content_length = 5;
    if ( blogwp_get_option('featured_content_length') ) {
        $featured_content_length = blogwp_get_option('featured_content_length');
    }

    $featured_content_post_type = 'recent-posts';
    if ( blogwp_get_option('featured_content_post_type') ) {
        $featured_content_post_type = blogwp_get_option('featured_content_post_type');
    }

    $featured_content_cat = blogwp_get_option('featured_content_cat');

    if(($featured_content_post_type === 'category-posts') && $featured_content_cat) {
        $featured_content_query = new WP_Query("orderby=date&posts_per_page=".$featured_content_length."&nopaging=0&post_status=publish&ignore_sticky_posts=1&post_type=post&cat=$featured_content_cat");
    } else {
        $featured_content_query = new WP_Query("orderby=date&posts_per_page=".$featured_content_length."&nopaging=0&post_status=publish&ignore_sticky_posts=1&post_type=post");
    }

    if ($featured_content_query->have_posts()) : ?>

    <div class="blogwp-featured-content-posts">
    <?php while ($featured_content_query->have_posts()) : $featured_content_query->the_post();  ?>
    <div class="blogwp-featured-content-post">

        <?php if(has_post_thumbnail()) { ?>
        <div class="blogwp-featured-content-post-thumbnail">
            <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'blogwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('blogwp-mediumh-image', array('class' => 'blogwp-featured-content-post-thumbnail-img', 'title' => get_the_title())); ?></a>
        </div>
        <?php } else { ?>
        <div class="blogwp-featured-content-post-thumbnail">
            <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'blogwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/no-image-5-3.jpg' ); ?>" class="blogwp-featured-content-post-thumbnail-img"/></a>
        </div>
        <?php } ?>

        <div class="blogwp-featured-content-post-details">
        <?php
        if ( 'post' == get_post_type() ) {
            /* translators: used between list items, there is a space */
            $categories_list = get_the_category_list( ' ' );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<div class="blogwp-featured-content-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'blogwp' ) . '</div>', $categories_list ); // WPCS: XSS OK.
            }
        }
        ?>
        <h3 class="blogwp-featured-content-post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'blogwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h3>
        <div class="blogwp-featured-content-post-footer">
        <span class="blogwp-featured-content-post-author blogwp-featured-content-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
        <span class="blogwp-featured-content-post-date blogwp-featured-content-post-meta"><?php echo get_the_date('Y-m-d'); ?></span>
        <span class="blogwp-featured-content-post-comment blogwp-featured-content-post-meta"><?php comments_popup_link( esc_attr__( '0 Comments', 'blogwp' ), esc_attr__( '1 Comment', 'blogwp' ), esc_attr__( '% Comments', 'blogwp' ) ); ?></span>
        </div>
        </div>

    </div>
    <?php endwhile; ?>
    </div>

    <?php wp_reset_postdata();  // Restore global post data stomped by the_post().
    endif; ?>

</div>
</div>
</div>
<?php }

endif;