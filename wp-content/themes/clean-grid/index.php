<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
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

<div class="clean-grid-posts">

<?php if ( !(clean_grid_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( clean_grid_get_option('posts_heading') ) : ?>
<div class="clean-grid-posts-heading"><h1 class="clean-grid-posts-title"><span><?php echo esc_html( clean_grid_get_option('posts_heading') ); ?></span></h1></div>
<?php else : ?>
<div class="clean-grid-posts-heading"><h1 class="clean-grid-posts-title"><span><?php esc_html_e( 'Recent Posts', 'clean-grid' ); ?></span></h1></div>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="clean-grid-posts-content">

<?php if (have_posts()) : ?>

    <div class="clean-grid-posts-container">
    <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', clean_grid_post_style() ); ?>

    <?php endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php clean_grid_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>
</div>

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

<?php //get_sidebar(); ?>

<?php get_footer(); ?>