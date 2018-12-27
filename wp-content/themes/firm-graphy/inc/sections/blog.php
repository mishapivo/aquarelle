<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
if ( ! function_exists( 'firm_graphy_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Firm Graphy 1.0.0
    */
    function firm_graphy_add_blog_section() {
    	$options = firm_graphy_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'firm_graphy_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'firm_graphy_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        firm_graphy_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'firm_graphy_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Firm Graphy 1.0.0
    * @param array $input blog section details.
    */
    function firm_graphy_get_blog_section_details( $input ) {
        $options = firm_graphy_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];

        
        $content = array();
        switch ( $blog_content_type ) {

            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
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
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
                $page_post['author']    = get_the_author();
                $page_post['author_id'] = get_the_author_meta('ID');

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
// blog section content details.
add_filter( 'firm_graphy_filter_blog_section_details', 'firm_graphy_get_blog_section_details' );


if ( ! function_exists( 'firm_graphy_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Firm Graphy 1.0.0
   *
   */
   function firm_graphy_render_blog_section( $content_details = array() ) {
        $options = firm_graphy_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="blog" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                    <div class="section-header align-center">
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ) ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content posts-wrapper col-3">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry match-height <?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-featured-image">
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">

                                <div class="entry-meta">
                                    <?php echo firm_graphy_article_footer_meta( $content['id'] ); ?>
                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>



                                <div class="entry-meta">
                                    <span class="byline"><?php esc_html_e( 'By:', 'firm-graphy' ); ?>
                                        <span class="author vcard"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( $content['author_id'] ) ); ?>"><?php echo wp_kses_post( $content['author'] ); ?></a></span>
                                    </span><!-- .byline -->

                                    <?php firm_graphy_posted_on( $content['id'] ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #blog -->

    <?php }
endif;