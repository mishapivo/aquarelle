<?php
/**
 * Review order table
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<table class="shop_table woocommerce-checkout-review-order-table table">
    <thead>
    <tr>
        <th colspan="2" class="product-name" scope="col"><?php esc_html_e( 'Product', 'evolve' ); ?></th>
        <th class="product-total" scope="col"><?php esc_html_e( 'Total', 'evolve' ); ?></th>
    </tr>
    </thead>
    <tbody>

	<?php
	do_action( 'woocommerce_review_order_before_cart_contents' );

	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) { ?>

            <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                <th scope="row" class="product-name">

					<?php $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

					if ( ! $_product->is_visible() ) {
						echo $thumbnail;
					} else {
						printf( '<a class="product-thumbnail" href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
					} ?>

                </th>
                <td class="product-name-link">

					<?php
					echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key );
					echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                </td>
                <td class="product-total">

					<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>

                </td>
            </tr>

		<?php }
	}

	do_action( 'woocommerce_review_order_after_cart_contents' ); ?>

    </tbody>
    <tfoot>

    <tr class="cart-subtotal">
        <th colspan="2"><?php esc_html_e( 'Cart Subtotal', 'evolve' ); ?></th>
        <td><?php wc_cart_totals_subtotal_html(); ?></td>
    </tr>

	<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>

        <tr class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
            <th colspan="2"><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
            <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
        </tr>

	<?php endforeach;

	if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) :

		do_action( 'woocommerce_review_order_before_shipping' );

		wc_cart_totals_shipping_html();

		do_action( 'woocommerce_review_order_after_shipping' );

	endif;

	foreach ( WC()->cart->get_fees() as $fee ) : ?>

        <tr class="fee">
            <th colspan="2"><?php echo esc_html( $fee->name ); ?></th>
            <td><?php wc_cart_totals_fee_html( $fee ); ?></td>
        </tr>

	<?php endforeach;

	if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
		if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) :
			foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>

                <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                    <th colspan="2"><?php echo esc_html( $tax->label ); ?></th>
                    <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                </tr>

			<?php endforeach;
		else : ?>

            <tr class="tax-total">
                <th colspan="2"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                <td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
            </tr>

		<?php endif;
	endif;

	do_action( 'woocommerce_review_order_before_order_total' ); ?>

    <tr class="order-total">
        <th colspan="2"><?php esc_html_e( 'Order Total', 'evolve' ); ?></th>
        <td><?php wc_cart_totals_order_total_html(); ?></td>
    </tr>

	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

    </tfoot>
</table>
</div><!-- .table-responsive-lg -->


