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
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="greatwp-main-wrapper clearfix" id="greatwp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="greatwp-main-wrapper-inside clearfix">

<?php greatwp_top_widgets(); ?>

<div class="greatwp-posts-wrapper" id="greatwp-posts-wrapper">

<div class="greatwp-posts greatwp-box">

<?php if ( !(greatwp_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( greatwp_get_option('posts_heading') ) : ?>
<h1 class="greatwp-posts-heading"><span><?php echo esc_html( greatwp_get_option('posts_heading') ); ?></span></h1>
<?php else : ?>
<h1 class="greatwp-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'greatwp' ); ?></span></h1>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="greatwp-posts-content">

<?php if (have_posts()) : ?>

    <div class="greatwp-posts-container">
    <?php $greatwp_total_posts = $wp_query->post_count; ?>
    <?php $greatwp_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', greatwp_post_style() ); ?>

    <?php $greatwp_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php greatwp_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>
</div>

</div><!--/#greatwp-posts-wrapper -->

<?php greatwp_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#greatwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>