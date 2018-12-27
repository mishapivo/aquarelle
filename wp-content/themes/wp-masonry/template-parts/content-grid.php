<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="wp-masonry-grid-post <?php echo esc_attr( wp_masonry_post_grid_cols() ); ?>">
<div class="wp-masonry-grid-post-inside">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(wp_masonry_get_option('hide_thumbnail')) ) { ?>
    <div class="wp-masonry-grid-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'wp-masonry' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(wp_masonry_grid_thumb_style(), array('class' => 'wp-masonry-grid-post-thumbnail-img')); ?></a>
        <?php wp_masonry_grid_postmeta(); ?>
        <?php if ( !(wp_masonry_get_option('hide_post_categories_home')) ) { wp_masonry_grid_cats(); } ?>
    </div>
    <?php } else { ?>
    <div class="wp-masonry-grid-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'wp-masonry' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( wp_masonry_grid_no_thumb_url() ); ?>" class="wp-masonry-grid-post-thumbnail-img"/></a>
        <?php wp_masonry_grid_postmeta(); ?>
        <?php if ( !(wp_masonry_get_option('hide_post_categories_home')) ) { wp_masonry_grid_cats(); } ?>
    </div>
    <?php } ?>
    <?php } else { ?>
    <div class="wp-masonry-grid-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'wp-masonry' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo esc_url( wp_masonry_grid_no_thumb_url() ); ?>" class="wp-masonry-grid-post-thumbnail-img"/></a>
        <?php wp_masonry_grid_postmeta(); ?>
        <?php if ( !(wp_masonry_get_option('hide_post_categories_home')) ) { wp_masonry_grid_cats(); } ?>
    </div>
    <?php } ?>

    <div class="wp-masonry-grid-post-details">
    <?php the_title( sprintf( '<h3 class="wp-masonry-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php if ( wp_masonry_get_option('show_post_snippet') ) { ?><div class="wp-masonry-grid-post-snippet"><?php the_excerpt(); ?></div><?php } ?>
    </div>

</div>
</div>