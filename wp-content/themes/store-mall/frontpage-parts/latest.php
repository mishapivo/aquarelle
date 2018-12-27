<?php
/**
 * Template part for displaying front page partner.
 *
 * @package Moral
 */

$enable_cat_tab = get_theme_mod( 'store_mall_cat_tab_enable', false );

if ( ! $enable_cat_tab ) {
    return;
}

$cat_num = 4;

?>
<div id="latest-products-collection" class="relative page-section">
    <div class="wrapper">
        <div class="product-filtering">
            <ul>
                <?php for ( $i=1; $i <= $cat_num; $i++ ) { 
                    $cat_id = get_theme_mod( 'store_mall_cat_tab_cat_' . $i );
                    if ( $cat_id ) :
                        $term_obj = get_term( $cat_id, '', OBJECT, 'raw' );
                        $cat_name = $term_obj->name;
                        $cat_slug = $term_obj->slug;
                        $count = $term_obj->count;
                        ?>
                        <li class="">
                            <a href="#" data-slug="<?php echo esc_attr( $cat_slug );?>">
                                <small><?php echo esc_html( $cat_name ); ?></small>
                                <span><?php printf( _nx( '%1$s item', '%1$s items', $count, 'product count', 'store-mall' ), $count );
                                ?></span>
                            </a>
                        </li>
                    <?php 
                    endif;
                } ?>
            </ul>
        </div><!-- .product-filtering -->
        
        <ul class="products latest-products" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "fade": false }'>
            <?php 
            // All this double loop lang lang is to solve the repeating posts to use array_unique.
            $proudcts_arr = array();
            for ( $i=1; $i <= $cat_num; $i++ ) { 
                $cat_id = get_theme_mod( 'store_mall_cat_tab_cat_' . $i );
                if ( $cat_id ) :
                    $args = array(
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'terms'    => $cat_id,
                            ),
                        ),
                        'posts_per_page'    => -1,
                    );
                    // Get all the products with provided arguments.
                    $products = wc_get_products( $args );
                    if ( $products ) :
                        foreach ( $products as $product ) {
                            $proudcts_arr[] = $product;
                        }
                    endif;
                endif;
            }

            if ( $proudcts_arr ) :
                foreach ( array_unique( $proudcts_arr ) as $product ) {
                    $url = $product->get_permalink();
                    // Get the image URL.
                    $img_url = wp_get_attachment_url( $product->get_image_id() );
                    // Get the product name.
                    $name  = $product->get_name();
                    // Get all the category ids.
                    $cat_ids = $product->get_category_ids();
                    ?>
                    <li class="<?php 
                        foreach ( $cat_ids as $cat_id ) { 
                            $term_obj = get_term( $cat_id, '', OBJECT, 'raw' );
                            echo esc_attr( $term_obj->slug ) . ' ';
                        } 
                        ?>">
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
                                            'label' => '',
                                            'icon' => 'fa-heart',
                                        ) 
                                    );
                                }
                                ?>
                               
                            </div><!-- .button-actions -->  
                        </div><!-- .entry-container -->
                    </li>
                <?php
                } 
            endif; ?>
        </ul><!-- .products -->
    </div><!-- .wrapper -->
</div><!-- #latest-products-collection -->