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

<?php if ( !(wp_masonry_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( wp_masonry_get_option('posts_heading') ) : ?>
<h1 class="wp-masonry-posts-heading"><span><?php echo esc_html( wp_masonry_get_option('posts_heading') ); ?></span></h1>
<?php else : ?>
<h1 class="wp-masonry-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'wp-masonry' ); ?></span></h1>
<?php endif; ?>
<?php } ?>
<?php } ?>

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