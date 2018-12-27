<?php
/**
 * Template part for displaying front page featured.
 *
 * @package Moral
 */

// Get default  mods value.
$featured = get_theme_mod( 'store_mall_featured', 'disable' );

if ( ! store_mall_is_woocommerce_activated() || 'disable' === $featured ) {
	return;
}

$default = store_mall_get_default_mods();
$section_title = get_theme_mod( 'store_mall_featured_title', $default['store_mall_featured_title'] );
?>
<div id="featured-products" class="relative page-section">
    <div class="wrapper">
        <div class="section-header">
        	<h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
        </div><!-- .section-header -->

        <div class="section-content grid">
				<?php
				$featured_num = 6;

				if (  in_array( $featured, array( 'featured-products' ) ) ) {
					if ( 'featured-products' === $featured ) {
						$args = array(
							'order'   => 'desc',
							'orderby' => 'date',
							'featured' => true,
							'posts_per_page' => absint( $featured_num ),
						);
					}

	        	    $products = wc_get_products( $args );

					if ( $products ) {
	        	    	foreach ( $products as $product ) {
	        	    		$url = $product->get_permalink();
		        	        $thumbnail_id = $product->get_image_id();
		        	        $img_url = wp_get_attachment_url( $thumbnail_id );
		        	        $name  = $product->get_name();
							?>
				            <article class="grid-item">
							    <div class="featured-product-wrapper">
							        <a href="<?php echo esc_url( $url ); ?>">
							        	<?php echo woocommerce_get_product_thumbnail(); ?>
							        	<img src="<?php echo esc_url( $img_url );?>" alt="<?php echo esc_attr( $name );?>"></a>
							        <div class="featured-item-wrapper">
							            <header class="entry-header">
							                <h2 class="entry-title"><?php echo esc_html( $name );?></h2>
							            </header>
							            <a href="<?php echo esc_url( $url ); ?>" class="more-link">
							            	<?php esc_html_e( 'View Product', 'store-mall' ); ?>
							                <?php echo store_mall_get_svg( array( 'icon' => 'arrow-right' ) ); ?>
							            </a>
							        </div><!-- .featured-item-wrapper -->
							    </div><!-- .featured-product-wrapper -->
							</article>
						<?php	
						}
						wp_reset_postdata();
					}
				}
				?>
            </div><!-- .section-content -->
    </div><!-- .wrapper -->
</div><!-- #featured-products -->