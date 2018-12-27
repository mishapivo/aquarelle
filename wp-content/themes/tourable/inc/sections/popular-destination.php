<?php
/**
 * Popular Destination section
 *
 * This is the template for the content of popular destination section
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
if ( ! function_exists( 'tourable_add_popular_destination_section' ) ) :
    /**
    * Add popular destination section
    *
    *@since Tourable 1.0.0
    */
    function tourable_add_popular_destination_section() {
    	$options = tourable_get_theme_options();
        // Check if destination is enabled on frontpage
        $popular_destination_enable = apply_filters( 'tourable_section_status', true, 'popular_destination_section_enable' );

        if ( true !== $popular_destination_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'tourable_filter_popular_destination_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render destination section now.
        tourable_render_popular_destination_section( $section_details );
    }
endif;

if ( ! function_exists( 'tourable_get_popular_destination_section_details' ) ) :
    /**
    * popular destination section details.
    *
    * @since Tourable 1.0.0
    * @param array $input popular destination section details.
    */
    function tourable_get_popular_destination_section_details( $input ) {
        $options = tourable_get_theme_options();

        // Content type.
        $popular_destination_content_type  = $options['popular_destination_content_type'];
        
        $content = array();
        switch ( $popular_destination_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['popular_destination_content_category'] ) ? $options['popular_destination_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'destination':
                $cat_id = ! empty( $options['popular_destination_content_destination'] ) ? $options['popular_destination_content_destination'] : '';
                $args = array(
                    'post_type'      => 'itineraries',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'travel_locations',
                            'field'    => 'id',
                            'terms'    => $cat_id,
                        ),
                    ),
                    'posts_per_page'  => 3,
                    );                    
            break;

            default:
            break;
        }


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// destination section content details.
add_filter( 'tourable_filter_popular_destination_section_details', 'tourable_get_popular_destination_section_details' );


if ( ! function_exists( 'tourable_render_popular_destination_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Tourable 1.0.0
   *
   */
   function tourable_render_popular_destination_section( $content_details = array() ) {
        $options = tourable_get_theme_options();
        $popular_destination_content_type  = $options['popular_destination_content_type'];
        $readmore = ! empty( $options['popular_destination_read_more'] ) ? $options['popular_destination_read_more'] : esc_html__( 'Tour Details', 'tourable' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="popular-destinations" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['popular_destination_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['popular_destination_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="section-content clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="destination-item-wrapper">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                    <?php if ( ! in_array( $popular_destination_content_type, array( 'category', 'page', 'post' ) ) ) : 
                                        $enable_sale     = get_post_meta( $content['id'], 'wp_travel_enable_sale', true );
                                        $trip_duration   = get_post_meta( $content['id'], 'wp_travel_trip_duration', true );
                                        $trip_price      = wp_travel_get_trip_price( $content['id'] );
                                        $sale_price      = wp_travel_get_trip_sale_price( $content['id'] );
                                        $trip_per        = get_post_meta( $content['id'], 'wp_travel_price_per', true );
                                        $settings        = wp_travel_get_settings();
                                        $currency_code   = ( isset( $settings['currency'] ) ) ? $settings['currency'] : '';
                                        $currency_symbol = wp_travel_get_currency_symbol( $currency_code );
                                        ?>
                                        <div class="clearfix">

                                            <?php if ( wp_travel_tab_show_in_menu( 'reviews' ) ) :
                                                $average_rating = wp_travel_get_average_rating( $content['id'] ); ?>
                                                    <div class="wp-travel-average-review" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'tourable' ), $average_rating ); ?>">
                                                        <span style="width:<?php echo esc_attr( ( $average_rating / 5 ) * 100 ); ?>%">
                                                            <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average_rating ); ?></strong> <?php printf( esc_html__( 'out of %1$s5%2$s', 'tourable' ), '<span itemprop="bestRating">', '</span>' ); ?>
                                                        </span>
                                                    </div>
                                            <?php endif; ?>

                                            <span class="trip-price">                       
                                                <span class="current-price">
                                                    <?php 
                                                        echo esc_html( $currency_symbol );
                                                        echo ( true == $enable_sale && $sale_price ) ? esc_html( $sale_price ) : esc_html( $trip_price );
                                                    ?>
                                                </span>
                                            </span><!-- .trip-price -->
                                        </div><!-- .clearfix -->
                                    <?php endif; ?>
                                </div><!-- .featured-image -->

                                <div class="entry-container">
                                    <div class="entry-container-wrap">
                                        <?php if ( ! in_array( $popular_destination_content_type, array( 'category', 'page', 'post' ) ) ) : ?>
                                            <div class="wp-travel-trip-time trip-duration">
                                                <i class="fa fa-clock-o"></i>
                                                <span class="wp-travel-trip-duration">
                                                    <?php tourable_trip_duration( $content['id'] ); ?>
                                                </span>
                                            </div><!-- .wp-travel-trip-time.trip-duration -->
                                        <?php endif; ?>

                                        <h4 class="post-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h4>
                                    </div><!-- .entry-container-wrap -->

                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="more-link">
                                        <?php  
                                            echo esc_html( $readmore );
                                            echo ' ' . tourable_get_svg( array( 'icon' => 'down' ) );
                                        ?>
                                    </a><!-- .more-link -->
                                </div><!-- .entry-container -->
                            </div><!-- .destination-item-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #popular-destinations -->
        
    <?php }
endif;