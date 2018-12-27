<?php
/**
 * EduMag Pro woocommerce compatibility.
 *
 * This is the template that includes all the other files for core featured of EduMag
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag Pro  1.0
 */


/**
 * Make theme WooCommerce ready
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


add_action('woocommerce_before_main_content', 'edumag_product_wrapper_content_start', 10);
add_action('woocommerce_after_main_content', 'edumag_product_wrapper_content_end', 20);

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

function edumag_product_wrapper_content_start() {
  echo '<section id="shop-products" class="page-section">
        	<div class="container">
        	    <header class="entry-header wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">';
}

if ( ! function_exists( 'edumag_product_wrapper_content_end' ) ) :
    function edumag_product_wrapper_content_end() {
      echo '</div><!-- .container -->
      </section>';
    }
endif;

if ( ! function_exists( 'edumag_header_close' ) ) :
    function edumag_header_close(){
    	echo '</header>';
    }
endif;
add_action( 'woocommerce_archive_description', 'edumag_header_close' , 10 );

if ( ! function_exists( 'edumag_result_count_and_catalog_ordering' ) ) :
    function edumag_result_count_and_catalog_ordering(){
    	echo 	'<div class="shop-products clear wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
                	<div class="pull-left">';
            			woocommerce_result_count();
        echo   		'</div><!-- .pull-left -->
         			<div class="pull-right">';
            			woocommerce_catalog_ordering();
        echo 		'</div><!-- .pull-right -->
        		</div><!-- .shop-products -->';

    }
endif;
add_action( 'woocommerce_before_shop_loop', 'edumag_result_count_and_catalog_ordering', 20 );

add_action( 'woocommerce_single_product_summary', 'edumag_people_likes', 40 );
function edumag_people_likes() { ?>
    <div class="product-slider">
        <h2 class="product_slider_title"><?php esc_html_e( 'People also buy', 'edumag' ); ?></h2>
        <div class="row regular" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": false, "draggable": false }'>
            <?php 
            global $product;
            $terms_obj = get_the_terms( $product->get_id(), 'product_cat' );
            $args = array(
                'post_type'         => 'product',
                'posts_per_page'    => 6,
                'product_cat'       => $terms_obj[0]->slug,
                'post__not_in'      => array( $product->get_id() ),
                'orderby'           => 'rand'
            );
            $posts = get_posts( $args );
            foreach ( $posts as $post ) :
                if ( has_post_thumbnail( $post->ID ) ) : ?>
                    <div class="slider-item">
                        <a href="<?php the_permalink( $post->ID ); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
                            ?>
                        </a>
                    </div><!-- .slider-item -->
                <?php endif; 
            endforeach; 
            wp_reset_postdata(); ?>
        </div><!-- .regular -->
    </div><!-- .product-slider -->

<?php }
add_action( 'edumag_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'edumag_shop_page_product', 10 );

if( ! function_exists( 'edumag_shop_page_product' ) ) :
    function edumag_shop_page_product() { 
        global $product; 
        
        $attachment_ids[0] = get_post_thumbnail_id( $product->get_id() );
        $attachment = wp_get_attachment_image_src($attachment_ids[0], 'full' );
        ?>
        <div class="hover-buttons">
            <div class="popup-image">
                <a href="<?php echo esc_url( $attachment[0] ); ?>" class="popup">
                    <i class="fa fa-eye"></i>
                    <?php echo woocommerce_template_loop_product_thumbnail(); ?>
                </a>
            </div><!-- .popup-image -->

            <div class="portfolio-link">
                <a href="<?php echo esc_url( get_the_permalink( $product->get_id() ) ); ?>"><i class="fa fa-link"></i></a>
            </div><!-- .portfolio-link -->

            <div class="add-to-cart-link">
                <?php do_action( 'edumag_add_to_cart', 10 ); ?>
            </div><!-- .portfolio-link -->

        </div><!-- .hover-buttons -->
        <a href="<?php echo esc_url( get_the_permalink( $product->get_id() ) ); ?>" class="woocommerce-LoopProduct-link">
            <div class="blue-overlay"></div>
            <?php 
                $sale_price = $product->get_sale_price();
                if( !empty( $sale_price ) ) {
                    echo '<span class="onsale">'. esc_html__( 'Sale', 'edumag' ) .'</span>';
                }
                ?>
            
            <?php echo woocommerce_template_loop_product_thumbnail(); ?>
            <h3><?php echo esc_html( get_the_title( $product->get_id() ) ); ?></h3>
            <span class="price">
            <?php echo wp_kses_post( $product->get_price_html() ); ?>
            </span><!-- .price -->
        </a>
    <?php
    }
endif;
