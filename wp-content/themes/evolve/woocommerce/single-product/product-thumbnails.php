<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version    3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $post, $product;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids ) { ?>

    <div id="carousel-slider-thumbnails" class="product-carousel carousel-multiple-items carousel slide mb-4 mb-md-0"
         data-ride="carousel" data-wrap="false">
        <div class="carousel-inner row w-100 mx-auto">

			<?php
			// From product-image.php
			if ( $product->get_image_id() ) {

				$image_title      = esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_link       = wp_get_attachment_url( get_post_thumbnail_id() );
				$image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_thumbnail' ), array(
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

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="carousel-item col-6 col-md-4 p-0 px-sm-3 active" data-target="#carousel-slider-product" data-slide-to="0">%s</div>', $image ), $post->ID );
			}

			$loop    = 0;
			$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

			foreach ( $attachment_ids as $attachment_id ) {

				$classes[] = 'image-' . $attachment_id;

				$image_link = wp_get_attachment_url( $attachment_id );

				if ( ! $image_link ) {
					continue;
				}

				$image_title = esc_attr( get_the_title( $attachment_id ) );
				$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), '', array(
					"alt"   => $image_title,
					"class" => "d-block w-100"
				) );

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="carousel-item col-6 col-md-4 p-0 px-sm-3" data-target="#carousel-slider-product" data-slide-to="%s">%s</div>', $loop + 1, $image ), $attachment_id, $post->ID );
				$loop ++;
			} ?>

        </div>

		<?php if ( $loop > 2 ) {
			echo "<a class='left carousel-control-prev carousel-control' href='#carousel-slider-thumbnails' role='button'
           data-slide='prev'>
            <span class='carousel-control-button carousel-control-prev-icon' aria-hidden='true'></span>
            <span class='screen-reader-text sr-only'><?php echo __( 'Previous', 'evolve' ); ?></span>
        </a>
        <a class='right carousel-control-next carousel-control' href='#carousel-slider-thumbnails' role='button'
           data-slide='next'>
            <span class='carousel-control-button carousel-control-next-icon' aria-hidden='true'></span>
            <span class='screen-reader-text sr-only'><?php echo __( 'Next', 'evolve' ); ?></span>
        </a>";
		} ?>

    </div>

<?php }