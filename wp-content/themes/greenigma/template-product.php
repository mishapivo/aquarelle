<?php //Template Name:Product Template
get_header(); 
$wl_theme_options = weblizar_get_options();
get_template_part('home','slideshow');  ?>
<div class="container product">  <!-- product section -->
	<?php if($wl_theme_options['product_title']!='') {  ?>
		<h1> <?php echo esc_attr($wl_theme_options['product_title']); ?> </h1> <?php } ?> 
			<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
				$args = array( 'post_type' => 'product','orderby' => 'rand' );
				$loop = new WP_Query( $args ); ?>
				<?php if( $loop->have_posts() ){ 
				   while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					<div class="col-md-3 about-men-top">
					<div class="col-md-12 presto-product">
						<div class="img-thumbnail gallery">
							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img
							   src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" class="img-responsive" />'; ?>
						</div>
						<div class="col-md-12 col-sm-12 about-men-name">
							<h3><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
							<span class="price"><?php echo $product->get_price_html(); ?></span><br>
							<div class="col-md-12 pro_btn">
							 <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
							</div>    
						</div> 
					</div>
					</div> 
					<?php endwhile; ?>
					<?php } else {
					echo "<p class='title' style='color:#fff;'>No Featured Products Added Yet..!!</p>";
			} } ?>
</div> 
<?php get_footer(); ?>