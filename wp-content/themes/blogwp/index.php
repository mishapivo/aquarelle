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
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="blogwp-main-wrapper clearfix" id="blogwp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="blogwp-main-wrapper-inside clearfix">

<?php blogwp_top_widgets(); ?>

<div class="blogwp-posts-wrapper" id="blogwp-posts-wrapper">

<div class="blogwp-posts">

<?php if ( !(blogwp_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( blogwp_get_option('posts_heading') ) : ?>
<h1 class="blogwp-posts-heading"><span><?php echo esc_html( blogwp_get_option('posts_heading') ); ?></span></h1>
<?php else : ?>
<h1 class="blogwp-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'blogwp' ); ?></span></h1>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="blogwp-posts-content">

<?php if (have_posts()) : ?>

    <div class="blogwp-posts-container">
    <?php $blogwp_total_posts = $wp_query->post_count; ?>
    <?php $blogwp_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', blogwp_post_style() ); ?>

    <?php $blogwp_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php blogwp_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>
</div>

</div><!--/#blogwp-posts-wrapper -->

<?php blogwp_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#blogwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>