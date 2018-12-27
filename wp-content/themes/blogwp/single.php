<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', 'single' ); ?>

    <?php the_post_navigation(array('prev_text' => esc_html__( '&larr; %title', 'blogwp' ), 'next_text' => esc_html__( '%title &rarr;', 'blogwp' ))); ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>

<?php endwhile; ?>
<div class="clear"></div>

</div><!--/#blogwp-posts-wrapper -->

<?php blogwp_bottom_widgets(); ?>

</div>
</div>
</div><!-- /#blogwp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>