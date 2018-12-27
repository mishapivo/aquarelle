<?php
/**
 * Template part for displaying front page popular.
 *
 * @package Moral
 */

// Get default  mods value.
$popular = get_theme_mod( 'store_mall_popular', 'disable' );

if ( ! store_mall_is_woocommerce_activated() || 'disable' === $popular ) {
	return;
}

$default = store_mall_get_default_mods();
$section_title = get_theme_mod( 'store_mall_popular_title', $default['store_mall_popular_title'] );
?>
<div id="popular-products" class="relative page-section">
    <div class="wrapper">
        <div class="section-header">
        	<h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
        </div><!-- .section-header -->

        <div class="section-content">
            <ul class="products col-4">
				<?php
				// Get the total number of products to display.
				$popular_num = 8;
				// Button text value
				$btn_txt = esc_html( 'View All Products', 'store-mall' );
				// Button URL
				$btn_url = get_theme_mod( 'store_mall_popular_btn_url', '#'  );

				// Initialize $args array.
				$args = array();
				//   Make $args array as per the content type.
				if ( 'popular-products' === $popular ) {
					$args = array(
						'order'   => 'desc',
						'orderby' => 'date',
						'meta_key'       => '_wc_average_rating',
						'orderby'        => 'meta_value_num',
						'meta_query'     => WC()->query->get_meta_query(),
						'tax_query'      => WC()->query->get_tax_query(),
						'posts_per_page' => absint( $popular_num ),
					);
				}

				// Get all the products with provided arguments.
				$products = wc_get_products( $args );

				if ( $products ) {
        	    	foreach ( $products as $product ) {
        	    		// Get product url
        	    		$url = $product->get_permalink();
	        	        // Get the image URL.
	        	        $img_url = wp_get_attachment_url( $product->get_image_id() );
	        	        // Get the product name.
	        	        $name  = $product->get_name();
	        	        // Get all the category ids.
	        	        $cat_ids = $product->get_category_ids();

						?>
					    <li <?php wc_product_class(); ?>>
		                    <div class="post-thumbnail">
		                        <a href="<?php echo esc_url( $img_url );?>" data-gal="prettyPhoto"><img src="<?php echo esc_url( $img_url );?>" alt="<?php echo esc_attr( $name ); ?>">
		                            <span class="icon-view">
		                                <strong>
		                            		<?php echo store_mall_get_svg( array( 'icon' => 'eye' ) ); ?>
		                                </strong>
		                            </span>
		                        </a>
		                    </div><!-- .post-thumbnail -->

		                    <div class="entry-container">
		                        <div class="product-meta">
		                            <div class="cat-links">
		                                <?php foreach ( $cat_ids as $cat_id ) { 
			                	            	$term_obj = get_term( $cat_id, '', OBJECT, 'raw' );
			                	            	?>
			                	        		<a href="<?php echo esc_url( get_term_link( $cat_id, 'product_cat' ) ); ?>"><?php echo esc_html( $term_obj->name ); ?></a>
			                	        <?php } ?>            
		                            </div><!-- .cat-links -->
		                        </div><!-- .product-meta -->

		                        <a href="<?php echo esc_url( $url ); ?>"><h2 class="woocommerce-loop-product__title"><?php echo esc_html( $name );?></h2></a>
		                        
	                            <?php 
	                            $rating_count = $product->get_rating_count();
								$average      = $product->get_average_rating();

								if ( $rating_count > 0 ) : ?>

									<div class="woocommerce-product-rating">
										<?php echo wc_get_rating_html( $average, $rating_count ); ?>
										
									</div>

								<?php endif; ?>

		                        <span class="price">
									
									<?php echo $product->get_price_html(); ?>

		                        </span><!-- .price -->

		                        <div class="button-actions">
		                            <a href="<?php echo esc_url( $product->add_to_cart_url() );?>" class="button product_type_simple add_to_cart_button ajax_add_to_cart">
		                            	<?php echo store_mall_get_svg( array( 'icon' => 'cart' ) ); ?>
		                            </a>  
		                            <?php 
		                            if ( store_mall_is_yww_activate() ) {
			                            $obj = new YITH_WCWL_Shortcode();
			                            echo $obj->add_to_wishlist( 
			                            	array( 
			                            		'product_id' => $product->get_id(),
			                            		'label'	=> '',
			                            		'icon' => 'fa-heart'

			                            	) 
			                            );
		                            }
		                            ?>
		                           
		                        </div><!-- .button-actions -->  
		                    </div><!-- .entry-container -->
		                </li>
					<?php	
					}
				}
				?>
            </ul><!-- .products -->
            <div class="more-link">
                <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary"><span><?php echo esc_html( $btn_txt ); ?></span></a>
            </div><!-- .more-link -->
        </div><!-- .section-content -->
    </div><!-- .wrapper -->
</div><!-- #popular-products -->