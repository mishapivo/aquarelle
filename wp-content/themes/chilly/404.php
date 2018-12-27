<?php 
/**
 * The main template file
 */
get_header();
chilly_banner_image();
spicepress_breadcrumbs(); ?>
<!-- 404 Error Section -->
<section class="404-section">		
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="error_404 wow flipInX animated" data-wow-delay=".5s">
					<h4><?php esc_html_e('Oops! Page not found','chilly'); ?></h4>
					<h1><?php esc_html_e('4','chilly'); ?><i class="fa fa-frown-o"></i><?php esc_html_e('4','chilly'); ?> </h1>
					<p><?php esc_html_e("We are sorry, but the page you are looking for does not exist.","chilly"); ?> 
					<p><a href="<?php echo esc_url(site_url());?>" class="error_404_btn"><i class="fa fa-arrow-circle-left"></i><?php esc_html_e('Go Back','chilly'); ?></a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /404 Error Section -->
<div class="clearfix"></div>
<?php get_footer(); ?>