<?php
/**
 * Thankyou page
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( $order ) :

	if ( $order->has_status( 'failed' ) ) :
		?>

        <div class="alert alert-danger"
             role="alert"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'evolve' ); ?></div>

        <p><?php
			if ( is_user_logged_in() ) {
				esc_html_e( 'Please attempt your purchase again or go to your account page.', 'evolve' );
			} else {
				esc_html_e( 'Please attempt your purchase again.', 'evolve' );
			}
			?></p>

        <p>
            <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
               class="btn"><?php esc_html_e( 'Pay', 'evolve' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"
                   class="btn"><?php esc_html_e( 'My Account', 'evolve' ); ?></a>
			<?php endif; ?>
        </p>

	<?php else : ?>

        <div class="alert alert-success"
             role="alert"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'evolve' ), $order ); ?></div>

        <ul class="order_details">
            <li class="order">
				<?php esc_html_e( 'Order:', 'evolve' ); ?>
                <strong><?php echo $order->get_order_number(); ?></strong>
            </li>
            <li class="date">
				<?php esc_html_e( 'Date:', 'evolve' ); ?>
                <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
            </li>
            <li class="total">
				<?php esc_html_e( 'Total:', 'evolve' ); ?>
                <strong><?php echo $order->get_formatted_order_total(); ?></strong>
            </li>
			<?php if ( $order->get_payment_method_title() ) : ?>
                <li class="method">
					<?php esc_html_e( 'Payment method:', 'evolve' ); ?>
                    <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                </li>
			<?php endif; ?>
        </ul>

	<?php
	endif;

	do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() );
	do_action( 'woocommerce_thankyou', $order->get_id() );

else :
	?>

    <p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'evolve' ), null ); ?></p>

<?php endif;