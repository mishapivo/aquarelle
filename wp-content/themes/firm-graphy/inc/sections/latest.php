<?php
/**
 * Latest section
 *
 * This is the template for the content of latest section
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
if ( ! function_exists( 'firm_graphy_add_latest_section' ) ) :
    /**
    * Add latest section
    *
    *@since Firm Graphy 1.0.0
    */
    function firm_graphy_add_latest_section() {
    	$options = firm_graphy_get_theme_options();
        // Check if latest is enabled on frontpage
        $latest_enable = apply_filters( 'firm_graphy_section_status', true, 'latest_section_enable' );

        if ( true !== $latest_enable ) {
            return false;
        }
        // Get latest section details
        $section_details = array();
        $section_details = apply_filters( 'firm_graphy_filter_latest_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render latest section now.
        firm_graphy_render_latest_section( $section_details );
    }
endif;

if ( ! function_exists( 'firm_graphy_get_latest_section_details' ) ) :
    /**
    * latest section details.
    *
    * @since Firm Graphy 1.0.0
    * @param array $input latest section details.
    */
    function firm_graphy_get_latest_section_details( $input ) {
        $options = firm_graphy_get_theme_options();
        
        $content = array();
        $cat_id = ! empty( $options['latest_content_category'] ) ? $options['latest_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 4,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// latest section content details.
add_filter( 'firm_graphy_filter_latest_section_details', 'firm_graphy_get_latest_section_details' );


if ( ! function_exists( 'firm_graphy_render_latest_section' ) ) :
  /**
   * Start latest section
   *
   * @return string latest content
   * @since Firm Graphy 1.0.0
   *
   */
   function firm_graphy_render_latest_section( $content_details = array() ) {
        $options = firm_graphy_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 
        ?>

        <div id="project" class="page-section">
            <?php if ( ! empty( $options['latest_title'] ) ) : ?>
                <div class="section-header align-center">
                    <h2 class="section-title"><?php echo esc_html( $options['latest_title'] ); ?></h2>
                </div><!-- .section-header -->
            <?php endif; ?>

            <div class="project-slider col-4" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "fade": false }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="project-slider-wrapper match-height <?php echo ! empty( $content['image'] ) ? '' : 'no-featured-image'; ?>">
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <div class="featured-image">
                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                <div class="overlay"></div>
                                <div class="icon-content">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>">
                                        <?php echo firm_graphy_get_svg( array( 'icon' => 'plus' ) ); ?>
                                    </a>
                                </div><!-- .icon-content -->
                            </div><!-- .featured-image -->
                        <?php endif; ?>
                        <div class="slider-content">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php 
                                    the_category( '', '', absint( $content['id'] ) );
                                ?>
                            </header>
                        </div><!-- .slider-content -->
                    </article><!-- .slick-item -->
                <?php endforeach; ?>
            </div><!-- .project-slider -->
        </div><!-- #project-slider -->

    <?php }
endif;