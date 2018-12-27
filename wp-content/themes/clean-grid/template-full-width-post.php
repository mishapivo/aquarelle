<?php
/**
* The template for displaying full-width post.
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*
* Template Name: Full Width, no sidebar
* Template Post Type: post
*/

get_header(); ?>

<div class="clean-grid-main-wrapper clearfix" id="clean-grid-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">

<?php if(is_front_page() && !is_paged()) { ?>
<div class="clean-grid-featured-posts-area clearfix">
<?php dynamic_sidebar( 'clean-grid-home-top-widgets' ); ?>
</div>
<?php } ?>

<div class="clean-grid-featured-posts-area clearfix">
<?php dynamic_sidebar( 'clean-grid-top-widgets' ); ?>
</div>

<div class="clean-grid-posts-wrapper" id="clean-grid-posts-wrapper">

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'singlefull' ); ?>

    <?php the_post_navigation(array('prev_text' => esc_html__( '&larr; %title', 'clean-grid' ), 'next_text' => esc_html__( '%title &rarr;', 'clean-grid' ))); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

<?php endwhile; ?>
<div class="clear"></div>

</div><!--/#clean-grid-posts-wrapper -->

<?php if(is_front_page() && !is_paged()) { ?>
<div class="clean-grid-featured-posts-area clearfix">
<?php dynamic_sidebar( 'clean-grid-home-bottom-widgets' ); ?>
</div>
<?php } ?>

<div class="clean-grid-featured-posts-area clearfix">
<?php dynamic_sidebar( 'clean-grid-bottom-widgets' ); ?>
</div>

</div>
</div><!-- /#clean-grid-main-wrapper -->

<?php get_footer(); ?>