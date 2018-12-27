<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Medipress
 */ 
get_header();

 
 ?>


 <!--  Page-title -->

    <div class="grey-title">
        <div class="container">
            <div class="">
                <h2 class="title"><?php wp_title(''); ?></h2>
            </div>
        </div>
    </div>
    
<!-- End page-title -->

<!-- ====== page 404 ====== -->
 
    <main class="main-blog start-block page404">
    	<h2 class="text-center"><?php echo esc_html__('404', 'medipress' ); ?> </h2>
		<h3 class="text-center"><?php echo esc_html__('Page Not Found', 'medipress' ); ?> </h3>
            <div class="text-center blog-btn">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary erbtn">
                   <?php echo esc_html__( 'Back to Home', 'medipress' ); ?>
                   <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
	</main>
 <?php get_footer(); ?>