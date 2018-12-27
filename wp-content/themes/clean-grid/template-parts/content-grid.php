<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="clean-grid-grid-post <?php echo esc_attr( clean_grid_post_grid_cols() ); ?>">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(clean_grid_get_option('hide_thumbnail')) ) { ?>
    <div class="clean-grid-grid-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'clean-grid' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(clean_grid_grid_thumb_style(), array('class' => 'clean-grid-grid-post-thumbnail-img')); ?></a>
        <?php if ( !(clean_grid_get_option('hide_read_more_button')) ) { ?>
        <div class="clean-grid-grid-post-mask">
        <div class="clean-grid-grid-post-mask-inside">
        <div class='clean-grid-grid-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( clean_grid_read_more_text() ); ?></a></div>
        </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(clean_grid_get_option('hide_thumbnail'))) { ?><div class="clean-grid-grid-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (clean_grid_get_option('hide_thumbnail'))) { ?><div class="clean-grid-grid-post-details-full"><?php } ?>

    <?php if ( !(clean_grid_get_option('hide_post_categories')) ) { ?><?php clean_grid_grid_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="clean-grid-grid-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php clean_grid_grid_postmeta(); ?>

    <?php if ( clean_grid_get_option('show_post_snippet') ) { ?><div class="clean-grid-grid-post-snippet"><?php the_excerpt(); ?></div><?php } ?>

    <?php if(!(has_post_thumbnail()) || (clean_grid_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(clean_grid_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>