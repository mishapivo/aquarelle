<?php
/**
* The template for displaying archive pages.
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

<header class="page-header">
<div class="page-header-inside">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</div>
</header>

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