<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="greatwp-fp04-post">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(greatwp_get_option('hide_thumbnail')) ) { ?>
    <div class="greatwp-fp04-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'greatwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('greatwp-medium-image', array('class' => 'greatwp-fp04-post-thumbnail-img')); ?></a>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(greatwp_get_option('hide_thumbnail'))) { ?><div class="greatwp-fp04-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (greatwp_get_option('hide_thumbnail'))) { ?><div class="greatwp-fp04-post-details-full"><?php } ?>

    <?php if ( !(greatwp_get_option('hide_post_categories_home')) ) { ?><?php greatwp_style_4_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="greatwp-fp04-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php greatwp_style_4_postmeta(); ?>

    <?php if ( !(greatwp_get_option('hide_post_snippet')) ) { ?><div class="greatwp-fp04-post-snippet"><?php the_excerpt(); ?></div><?php } ?>

    <?php if ( !(greatwp_get_option('hide_read_more_button')) ) { ?><div class='greatwp-fp04-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><span class="greatwp-read-more-text"><?php echo esc_html( greatwp_read_more_text() ); ?></span></a></div><?php } ?>

    <?php if(!(has_post_thumbnail()) || (greatwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(greatwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>