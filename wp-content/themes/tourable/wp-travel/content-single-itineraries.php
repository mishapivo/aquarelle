<?php
/**
 * Itinerary Single Contnet Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel/content-single-itineraries.php.
 *
 * HOWEVER, on occasion wp-travel will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.wensolutions.com/document/template-structure/
 * @author      WenSolutions
 * @package     wp-travel/Templates
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $wp_travel_itinerary;
?>

<?php
do_action( 'wp_travel_before_single_itinerary', get_the_ID() );
if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

do_action( 'wp_travel_before_content_start');
?>

<div id="itinerary-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="content entry-content">
		<div class="wp-travel trip-headline-wrapper">
         	<?php if ( $wp_travel_itinerary->is_sale_enabled() ) : ?>
      			<div class="wp-travel-offer">
      			    <span><?php esc_html_e( 'Offer', 'tourable' ) ?></span>
      			</div>
  			<?php endif; ?>
  			
	        <div class="wp-travel-feature-slide-content featured-detail-section right-plot">
		    	<div class="right-plot-inner-wrap">
		         	<?php do_action( 'wp_tarvel_before_single_title', get_the_ID() ) ?>
					<?php do_action( 'wp_travel_after_single_title', get_the_ID() ) ?>
				</div>
	        </div>
	    </div>
	    <?php do_action( 'wp_travel_after_single_itinerary_header', get_the_ID() ); ?>
	</div><!-- .summary -->

</div><!-- #itinerary-<?php the_ID(); ?> -->

<?php do_action( 'wp_travel_after_single_itinerary', get_the_ID() ); ?>
