<?php
/**
 * Destinations section
 *
 * This is the template for the content of destinations section
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
if ( ! function_exists( 'tourable_add_destinations_section' ) ) :
    /**
    * Add destinations section
    *
    *@since Tourable 1.0.0
    */
    function tourable_add_destinations_section() {
    	$options = tourable_get_theme_options();
        // Check if destinations is enabled on frontpage
        $destinations_enable = apply_filters( 'tourable_section_status', true, 'destinations_section_enable' );

        if ( true !== $destinations_enable ) {
            return false;
        }
        // Get destinations section details
        $section_details = array();
        $section_details = apply_filters( 'tourable_filter_destinations_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render destinations section now.
        tourable_render_destinations_section( $section_details );
    }
endif;

if ( ! function_exists( 'tourable_get_destinations_section_details' ) ) :
    /**
    * destinations section details.
    *
    * @since Tourable 1.0.0
    * @param array $input destinations section details.
    */
    function tourable_get_destinations_section_details( $input ) {
        $options = tourable_get_theme_options();

        // Content type.
        $destinations_content_type  = $options['destinations_content_type'];
        
        $content = array();
        switch ( $destinations_content_type ) {
        	
            case 'category':
                $cat_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['destinations_content_category_' . $i] ) ) :
                        $cat_ids['id'] = $options['destinations_content_category_' . $i];
                        $cat_ids['image'] = ! empty( $options['destinations_background_image_' . $i] ) ? $options['destinations_background_image_' . $i] : '';
                        $cat = get_category( $cat_ids['id'] );
                        $cat_ids['title'] = $cat->name;
                        $cat_ids['count'] = $cat->category_count;
                        $cat_ids['url'] = get_category_link( $cat_ids['id'] );
                    endif;

                    if ( ! empty( $options['destinations_content_category_' . $i] ) )
                        array_push( $content, $cat_ids );
                }                
            break;

            case 'destination':
                $cat_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['destinations_content_destination_' . $i] ) ) :
                        $cat_ids['id'] = $options['destinations_content_destination_' . $i];
                        $cat_ids['image'] = ! empty( $options['destinations_background_image_' . $i] ) ? $options['destinations_background_image_' . $i] : '';
                        $cat = get_term_by( 'id', $cat_ids['id'], 'travel_locations' );
                        $cat_ids['title'] = $cat->name;
                        $cat_ids['count'] = $cat->count;
                        $cat_ids['url'] = get_term_link( $cat_ids['id'], 'travel_locations' );
                    endif;

                    if ( ! empty( $options['destinations_content_destination_' . $i] ) )
                        array_push( $content, $cat_ids );
                }                
            break;

            default:
            break;
        }

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// destinations section content details.
add_filter( 'tourable_filter_destinations_section_details', 'tourable_get_destinations_section_details' );


if ( ! function_exists( 'tourable_render_destinations_section' ) ) :
  /**
   * Start destinations section
   *
   * @return string destinations content
   * @since Tourable 1.0.0
   *
   */
   function tourable_render_destinations_section( $content_details = array() ) {
        $options = tourable_get_theme_options();
        $suffix = ! empty( $options['destinations_suffix'] ) ? $options['destinations_suffix'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="destinations" class="relative page-section">
            <div class="wrapper">
                <div class="section-content col-3 clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    <span>
                                        <?php 
                                            echo absint( $content['count'] ); 
                                            echo ' ' . esc_html( $suffix );
                                        ?>
                                    </span>
                                </header>   
                            </div><!-- .featured-image -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #destinations -->

    <?php }
endif;