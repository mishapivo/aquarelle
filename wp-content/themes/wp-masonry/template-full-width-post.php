<?php
/**
* The template for displaying full-width post.
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*
* Template Name: Full Width, no sidebar
* Template Post Type: post
*/

get_header(); ?>

<div class="wp-masonry-main-wrapper clearfix" id="wp-masonry-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="wp-masonry-main-wrapper-inside clearfix">

<?php wp_masonry_top_widgets(); ?>

<div class="wp-masonry-posts-wrapper" id="wp-masonry-posts-wrapper">

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'singlefull' ); ?>

    <?php the_post_navigation(array('prev_text' => esc_html__( '&larr; %title', 'wp-masonry' ), 'next_text' => esc_html__( '%title &rarr;', 'wp-masonry' ))); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

<?php endwhile; ?>
<div class="clear"></div>

</div><!--/#wp-masonry-posts-wrapper -->

<?php wp_masonry_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#wp-masonry-main-wrapper -->

<?php get_footer(); ?>