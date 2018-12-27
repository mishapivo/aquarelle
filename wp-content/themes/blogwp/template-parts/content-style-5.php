<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="blogwp-fp05-post blogwp-box">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(blogwp_get_option('hide_thumbnail')) ) { ?>
    <div class="blogwp-fp05-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'blogwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('blogwp-medium-image', array('class' => 'blogwp-fp05-post-thumbnail-img')); ?></a>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(blogwp_get_option('hide_thumbnail'))) { ?><div class="blogwp-fp05-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (blogwp_get_option('hide_thumbnail'))) { ?><div class="blogwp-fp05-post-details-full"><?php } ?>

    <?php if ( !(blogwp_get_option('hide_post_categories_home')) ) { ?><?php blogwp_style_5_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="blogwp-fp05-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php blogwp_style_5_postmeta(); ?>

    <?php if ( !(blogwp_get_option('hide_post_snippet')) ) { ?><div class="blogwp-fp05-post-snippet"><?php the_excerpt(); ?></div><?php } ?>

    <?php if ( !(blogwp_get_option('hide_read_more_button')) ) { ?><div class='blogwp-fp05-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><span class="blogwp-read-more-text"><?php echo esc_html( blogwp_read_more_text() ); ?></span></a></div><?php } ?>

    <?php if(!(has_post_thumbnail()) || (blogwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(blogwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>