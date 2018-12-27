<?php
/**
 * Checkout Form
 *
 * @package    WooCommerce/Templates
 * @version     3.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

wc_print_notices();

$woocommerce_one_page_checkout = evolve_theme_mod( 'evl_woocommerce_one_page_checkout', '0' );

global $woocommerce, $current_user;
$woo_acc_msg_1 = evolve_theme_mod( 'evl_woo_acc_msg_1', '' );
$woo_acc_msg_2 = evolve_theme_mod( 'evl_woo_acc_msg_2', '' );
?>

    <div class="myaccount_user_container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-12 col-md-6 col-lg-3 mb-3">

				<?php if ( is_user_logged_in() ) { ?>

                    <h3><?php
						printf(
							__( 'Hello, %s', 'evolve' ), $current_user->display_name
						);
						?></h3>

				<?php } ?>

            </div>

			<?php if ( $woo_acc_msg_1 ): ?>

                <div class="col-sm-12 col-md-6 col-lg-3 mb-3 message-1">

					<?php echo $woo_acc_msg_1; ?>

                </div>

			<?php endif;
			if ( $woo_acc_msg_2 ): ?>

                <div class="col-sm-12 col-md-6 col-lg-3 mb-3 message-2">

					<?php echo $woo_acc_msg_2; ?>

                </div>

			<?php endif; ?>

            <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <form action="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>">
                    <button type="submit"
                            class="btn btn-sm float-lg-right"><?php echo evolve_get_svg( 'shop' ); esc_html_e( 'View Cart', 'evolve' ); ?></button>
                </form>
            </div>
        </div>
    </div>

<?php
wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout', 'evolve' ) );

	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', wc_get_checkout_url() );
?>

    <form name="checkout" method="post" class="checkout woocommerce-checkout"
          action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

		<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

            <div class="tab-pane fade" id="checkout-billing" role="tabpanel" aria-labelledby="checkout-billing-tab">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
            </div>

            <div class="tab-pane fade" id="checkout-shipping" role="tabpanel" aria-labelledby="checkout-shipping-tab">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
            </div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif;
		do_action( 'woocommerce_checkout_before_order_review' ); ?>

        <div class="tab-pane fade" id="review-order" role="tabpanel" aria-labelledby="review-order-tab">
            <div class="border p-4 mb-4">
                <h4 id="order_review_heading"><?php _e( 'Your order', 'evolve' ); ?></h4>
                <div class="table-responsive-lg">

					<?php do_action( 'woocommerce_checkout_order_review' ); ?>

                </div>
            </div>

			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

    </form>

<?php
do_action( 'woocommerce_after_checkout_form', $checkout );
