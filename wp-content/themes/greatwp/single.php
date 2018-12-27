<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'single' ); ?>

    <?php the_post_navigation(array('prev_text' => esc_html__( '&larr; %title', 'greatwp' ), 'next_text' => esc_html__( '%title &rarr;', 'greatwp' ))); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

<?php endwhile; ?>
<div class="clear"></div>

</div><!--/#greatwp-posts-wrapper -->

<?php greatwp_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#greatwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>