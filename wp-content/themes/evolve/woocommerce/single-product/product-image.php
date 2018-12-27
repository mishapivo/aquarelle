<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $post, $product;

$loop = 0;

?>

<div class="<?php evolve_single_product_class(); ?>">
    <div id="carousel-slider-product" class="product-carousel carousel slide" data-ride="carousel">
        <div class="carousel-inner carousel-resize">

			<?php if ( $product->get_image_id() ) {

				$image_title      = esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_link       = wp_get_attachment_url( get_post_thumbnail_id() );
				$image            = get_the_post_thumbnail( $post->ID, 'shop_single', array(
					"alt"      => $image_title,
					"class"    => "d-block w-100",
					'itemprop' => 'image'
				) );
				$attachment_count = count( $product->get_gallery_image_ids() );

				if ( $attachment_count > 0 ) {
					$gallery = '[product-gallery]';
				} else {
					$gallery = '';
				}

				echo sprintf( '<div class="carousel-item active"><a href="%s" itemprop="image" class="woocommerce-product-gallery__image woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '" rel="prettyPhoto">%s</a></div>', $image_link, $image_title, $image );

				$attachment_ids = $product->get_gallery_image_ids();

				foreach ( $attachment_ids as $attachment_id ) {

					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link ) {
						continue;
					}

					$image_title = esc_attr( get_the_title( $attachment_id ) );
					$image       = wp_get_attachment_image( $attachment_id, 'shop_single', "", array(
						"alt"   => $image_title,
						"class" => "d-block w-100"
					) );

					echo sprintf( '<div class="carousel-item"><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '" rel="prettyPhoto">%s</a></div>', $image_link, $image_title, $image );
					$loop ++;
				}
			} else {
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="carousel-item active"><img src="%s" alt="%s" class="wp-post-image d-block w-100" /></div>', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'evolve' ) ), $post->ID );
			}
			if ( $loop > 0 ) {
				echo "<a class='carousel-control-prev carousel-control' href='#carousel-slider-product' role='button' data-slide='prev'>
                    <span class='carousel-control-button carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='screen-reader-text sr-only'>" . __( 'Previous', 'evolve' ) . "</span>
                </a>
                <a class='carousel-control-next carousel-control' href='#carousel-slider-product' role='button' data-slide='next'>
                <span class='carousel-control-button carousel-control-next-icon' aria-hidden='true'></span>
                <span class='screen-reader-text sr-only'>" . __( 'Next', 'evolve' ) . "</span>
                </a>";
			} ?>


        </div><!-- .carousel-inner -->
    </div><!-- #product-slider -->

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>

