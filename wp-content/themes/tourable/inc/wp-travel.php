<?php
/**
 * Theme Palace wp travel hooks overwrite
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

function tourable_search_form() { ?>
	<div class="wp-travel-search">
		<form method="get" name="wp-travel_search" action="<?php echo esc_url( home_url( '/' ) );  ?>" > 
			<input type="hidden" name="post_type" value="itineraries" />
			<p>
				<?php $placeholder = esc_attr__( 'Ex: Trekking', 'tourable' ); ?>
				<input type="text" name="s" id="s" value="<?php echo ( isset( $_GET['s'] ) ) ? esc_textarea( wp_unslash( $_GET['s'] ) ) : ''; ?>" placeholder="<?php echo esc_attr( apply_filters( 'wp_travel_search_placeholder', $placeholder ) ); ?>">
			</p>
			<p>
				<?php
				$taxonomy = 'itinerary_types';
				$args = array(
					'show_option_all'    => esc_attr__( 'Trip Type', 'tourable' ),
					'hide_empty'         => 0,
					'selected'           => 1,
					'hierarchical'       => 1,
					'name'               => $taxonomy,
					'class'              => 'wp-travel-taxonomy',
					'taxonomy'           => $taxonomy,
					'selected'           => ( isset( $_GET[$taxonomy] ) ) ? esc_textarea( wp_unslash( $_GET[$taxonomy] ) ) : 0,
					'value_field'		 => 'slug',
				);

				wp_dropdown_categories( $args, $taxonomy );
				?>
			</p>
			<p>
				<?php
				$taxonomy = 'travel_locations';
				$args = array(
					'show_option_all'    => esc_attr__( 'Location', 'tourable' ),
					'hide_empty'         => 0,
					'selected'           => 1,
					'hierarchical'       => 1,
					'name'               => $taxonomy,
					'class'              => 'wp-travel-taxonomy',
					'taxonomy'           => $taxonomy,
					'selected'           => ( isset( $_GET[$taxonomy] ) ) ? esc_textarea( wp_unslash( $_GET[$taxonomy] ) ) : 0,
					'value_field'		 => 'slug',
				);

				wp_dropdown_categories( $args, $taxonomy );
				?>
			</p>
			
			<p class="wp-travel-search"><input type="submit" name="wp-travel_search" id="wp-travel-search" class="button button-primary" value="<?php esc_html_e( 'Search', 'tourable' ) ?>"  /></p>
		</form>
	</div>	
	<?php
}
add_filter( 'wp_travel_search_form', 'tourable_search_form', 999 );

/**
 * Add html for Keywords.
 *
 * @param int $post_id ID of current post.
 */
function tourable_trip_duration( $post_id ) {
	if ( ! $post_id ) {
		return;
	}
	$start_date	= get_post_meta( $post_id, 'wp_travel_start_date', true );
	$end_date 	= get_post_meta( $post_id, 'wp_travel_end_date', true );
	
	$fixed_departure = get_post_meta( $post_id, 'wp_travel_fixed_departure', true );
	$fixed_departure = ( $fixed_departure ) ? $fixed_departure : 'yes';
	$fixed_departure = apply_filters( 'wp_travel_fixed_departure_defalut', $fixed_departure );

	$trip_duration = get_post_meta( $post_id, 'wp_travel_trip_duration', true );
	$trip_duration = ( $trip_duration ) ? $trip_duration : 0;
	$trip_duration_night = get_post_meta( $post_id, 'wp_travel_trip_duration_night', true );
	$trip_duration_night = ( $trip_duration_night ) ? $trip_duration_night : 0;
	
	if ( 'yes' === $fixed_departure ) : 
		if ( $start_date && $end_date ) :
			
			$date_format = get_option( 'date_format' );
			if ( ! $date_format ) :
				$date_format = 'jS M, Y';
			endif;
			printf( '%s - %s', date( $date_format, strtotime( $start_date ) ), date( $date_format, strtotime( $end_date ) ) ); 

		endif;
	else :
		if ( $trip_duration || $trip_duration_night ) :
			printf( __( '%1$s Day(s) %2$s Night(s)', 'tourable' ), $trip_duration, $trip_duration_night );
		endif;

	endif;
}

remove_action( 'wp_travel_after_main_content', 'wp_travel_archive_wrapper_close' );
add_action( 'wp_travel_after_main_content', 'tourable_archive_wrapper_close' );
/**
 * Add html for Keywords.
 */
function tourable_archive_wrapper_close() { ?>
	</div>
<?php }
