<?php
/**
 * Trip Search section
 *
 * This is the template for the content of trip_search section
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
if ( ! function_exists( 'tourable_add_trip_search_section' ) ) :
    /**
    * Add trip_search section
    *
    *@since Tourable 1.0.0
    */
    function tourable_add_trip_search_section() {
    	$options = tourable_get_theme_options();
        // Check if trip_search is enabled on frontpage
        $trip_search_enable = apply_filters( 'tourable_section_status', true, 'trip_search_section_enable' );

        if ( true !== $trip_search_enable || ! class_exists( 'WP_Travel' ) ) {
            return false;
        }

        // Render trip_search section now.
        tourable_render_trip_search_section();
    }
endif;

if ( ! function_exists( 'tourable_render_trip_search_section' ) ) :
  /**
   * Start trip_search section
   *
   * @return string trip_search content
   * @since Tourable 1.0.0
   *
   */
   function tourable_render_trip_search_section() {
        $options = tourable_get_theme_options();
        ?>
        <div id="travel-search-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['trip_search_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['trip_search_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="wp-travel-filter">
                    <?php wp_travel_search_form(); ?>
                </div><!-- wp-travel-filter -->

            </div><!-- .wrapper -->      
        </div><!-- #travel-search-section -->
    <?php }
endif;