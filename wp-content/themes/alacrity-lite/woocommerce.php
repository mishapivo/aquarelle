<?php 
/**
 * The template for displaying WooCommerce.
 *
 * @package Alacrity Lite
 */

 get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">
    	<?php woocommerce_content(); ?>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
