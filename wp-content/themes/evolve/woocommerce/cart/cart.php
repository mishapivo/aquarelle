<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

    <div class="table-responsive-lg">
        <table class="table shop_table cart woocommerce-cart-form__contents">
            <thead>
            <tr>
                <th colspan="2" scope="col" class="product-name"><?php esc_html_e( 'Product', 'evolve' ); ?></th>
                <th scope="col" class="product-price text-center"><?php esc_html_e( 'Price ', 'evolve' ); ?></th>
                <th scope="col"
                    class="product-quantity text-center"><?php esc_html_e( 'Quantity', 'evolve' ); ?></th>
                <th scope="col" class="product-subtotal text-center"><?php esc_html_e( 'Total', 'evolve' ); ?></th>
                <th scope="col" class="product-remove text-center"><?php esc_html_e( 'Action', 'evolve' ); ?></th>
            </tr>
            </thead>
            <tbody>

			<?php do_action( 'woocommerce_before_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
                    <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                        <th scope="row" class="product-name">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a class="product-thumbnail" href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
							?>

                        </th>

                        <td class="product-name-link">

							<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
							}

							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification alert alert-warning mt-2">' . esc_html__( 'Available on backorder', 'evolve' ) . '</p>', $product_id ) );
							}
							?>

                        </td>

                        <td class="product-price text-center">
							<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
                        </td>

                        <td class="product-quantity text-center">
							<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
							?>
                        </td>

                        <td class="product-subtotal text-center">
							<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
                        </td>

                        <!-- Remove from cart link -->
                        <td class="product-remove text-center">
							<?php
							// @codingStandardsIgnoreLine
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'evolve' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
							?>
                        </td>

                    </tr>
					<?php
				}
			}

			do_action( 'woocommerce_cart_contents' );
			?>

			<?php
			wp_nonce_field( 'woocommerce-cart' );
			do_action( 'woocommerce_after_cart_contents' );
			?>
            </tbody>
        </table>
    </div>

<?php do_action( 'woocommerce_after_cart_table' ); ?>
    <div class="row">
		<?php

		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */

		do_action( 'woocommerce_cart_collaterals' ); ?>

        <div class="cart-totals-buttons col-md-6 mb-4">
			<?php woocommerce_cart_totals(); ?>

            <input type="submit" class="btn mt-4 mr-3" name="update_cart"
                   value="<?php esc_html_e( 'Update Cart', 'evolve' ); ?>"/>
            <input type="submit" class="btn mt-4 float-lg-right" name="proceed"
                   value="<?php esc_html_e( 'Proceed to Checkout', 'evolve' ); ?> &rarr;"/>

			<?php do_action( 'woocommerce_cart_actions' ); ?>
        </div>

    </div>

<?php do_action( 'woocommerce_after_cart' ); ?>