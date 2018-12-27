<?php
/**
* The template for displaying archive pages.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="wp-masonry-main-wrapper clearfix" id="wp-masonry-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="wp-masonry-main-wrapper-inside clearfix">

<?php wp_masonry_top_widgets(); ?>

<div class="wp-masonry-posts-wrapper" id="wp-masonry-posts-wrapper">

<header class="page-header">
<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</header>

<div class="wp-masonry-posts-content">
<div class="wp-masonry-posts-container">

<?php if (have_posts()) : ?>

    <div class="wp-masonry-posts">
    <div class="<?php echo esc_attr( wp_masonry_post_grid_cols() ); ?>-sizer"></div>
    <div class="<?php echo esc_attr( wp_masonry_post_grid_cols() ); ?>-gutter"></div>
    <?php $wp_masonry_total_posts = $wp_query->post_count; ?>
    <?php $wp_masonry_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', wp_masonry_post_style() ); ?>

    <?php $wp_masonry_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php wp_masonry_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>
</div>

</div><!--/#wp-masonry-posts-wrapper -->

<?php wp_masonry_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#wp-masonry-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>