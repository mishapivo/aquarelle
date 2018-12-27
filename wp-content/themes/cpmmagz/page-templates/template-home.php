<?php
 /**
 *
 * Template Name: Homepage
 * Description: A page template that displays the Homepage or a Front page as in theme main page with slider and some other contents of the
 * post.
 *
 * @package Cpmmagz
 */
get_header();?>
<!-- Start Site Content -->
<div id="main-wrapper">
    <?php get_template_part('home-page-sections/featured');?>
    <!-- End Featured-section -->
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">
                <div class="col l8 s12 m12 right">
                    <div id="primary" class="content-area">
                        <?php get_template_part('home-page-sections/highlights');?>
                        <!-- End Highlights -->
                        <?php get_template_part('home-page-sections/hot');?>
                        <!-- End Hot Section -->
                        <?php get_template_part('home-page-sections/homepage', 'category');?>
                        <!-- End Category Highlights-->
                        <?php get_template_part('home-page-sections/video');?>
                        <!-- End Video Highlights-->
                    </div>
                    <!-- End Primary -->
                </div>
                <div class="col l4 s12 m12 left">
                    <aside id="sidebar" class="sidebar left-side">
                        <?php get_sidebar();?>
                    </aside>
                    <!-- Sidebar -->
                </div>
                <!-- End Column -->
            </div>
        </div>
        <!-- End Container -->
    </div>
</div>
<!-- End Main Wrapper -->
<?php get_footer(); ?>
