<?php
/**
 * Traveler Choice section
 *
 * This is the template for the content of traveler choice section
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
if ( ! function_exists( 'tourable_add_traveler_choice_section' ) ) :
    /**
    * Add traveler choice section
    *
    *@since Tourable 1.0.0
    */
    function tourable_add_traveler_choice_section() {
    	$options = tourable_get_theme_options();
        // Check if destination is enabled on frontpage
        $traveler_choice_enable = apply_filters( 'tourable_section_status', true, 'traveler_choice_section_enable' );

        if ( true !== $traveler_choice_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'tourable_filter_traveler_choice_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render destination section now.
        tourable_render_traveler_choice_section( $section_details );
    }
endif;

if ( ! function_exists( 'tourable_get_traveler_choice_section_details' ) ) :
    /**
    * traveler choice section details.
    *
    * @since Tourable 1.0.0
    * @param array $input traveler choice section details.
    */
    function tourable_get_traveler_choice_section_details( $input ) {
        $options = tourable_get_theme_options();

        // Content type.
        $traveler_choice_content_type  = $options['traveler_choice_content_type'];
        
        $content = array();
        switch ( $traveler_choice_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['traveler_choice_content_category'] ) ? $options['traveler_choice_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;


            case 'trip-types':
                $cat_id = ! empty( $options['traveler_choice_content_trip_types'] ) ? $options['traveler_choice_content_trip_types'] : '';
                $args = array(
                    'post_type'      => 'itineraries',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'itinerary_types',
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
                    $page_post['excerpt']   = tourable_trim_content( 25 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

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
add_filter( 'tourable_filter_traveler_choice_section_details', 'tourable_get_traveler_choice_section_details' );


if ( ! function_exists( 'tourable_render_traveler_choice_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Tourable 1.0.0
   *
   */
   function tourable_render_traveler_choice_section( $content_details = array() ) {
        $options = tourable_get_theme_options();
        $traveler_choice_content_type  = $options['traveler_choice_content_type'];
        $readmore = ! empty( $options['traveler_choice_read_more'] ) ? $options['traveler_choice_read_more'] : esc_html__( 'See Details', 'tourable' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="travellers-choice" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['traveler_choice_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['traveler_choice_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->
            </div><!-- .wrapper -->

            <div class="choice-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <article style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <div class="overlay"></div>
                        <div class="entry-container">
                            <?php if ( in_array( $traveler_choice_content_type, array( 'post', 'category' ) ) ) : ?>
                                <span>
                                    <?php the_category( ' ', '', $content['id'] ); ?>
                                </span>
                            <?php elseif ( in_array( $traveler_choice_content_type, array( 'trip', 'trip-types', 'destination', 'activity' ) ) ) :
                                $terms = wp_get_post_terms( $content['id'], 'travel_locations' ); ?>
                                <span>
                                    <?php foreach ( $terms as $term ) : ?>
                                        <a href="<?php echo esc_url( get_term_link( $term->term_id, 'travel_locations' ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
                                    <?php endforeach; ?>
                                </span>
                            <?php endif; ?>
                            
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->

                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                            </div><!-- .read-more -->
                        </div>
                    </article>
                <?php endforeach; ?>
            </div><!-- .choice-slider -->
        </div><!-- #travellers-choice -->
        
    <?php }
endif;