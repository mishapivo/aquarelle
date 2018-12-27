<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
if ( ! function_exists( 'tourable_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Tourable 1.0.0
    */
    function tourable_add_blog_section() {
    	$options = tourable_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'tourable_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'tourable_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        tourable_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'tourable_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Tourable 1.0.0
    * @param array $input blog section details.
    */
    function tourable_get_blog_section_details( $input ) {
        $options = tourable_get_theme_options();

        $content = array();
        $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 2,
            'category__not_in'  => ( array ) $cat_ids,
            'ignore_sticky_posts'   => true,
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = tourable_trim_content( 20 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg'; 

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
add_filter( 'tourable_filter_blog_section_details', 'tourable_get_blog_section_details' );


if ( ! function_exists( 'tourable_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Tourable 1.0.0
   *
   */
   function tourable_render_blog_section( $content_details = array() ) {
        $options = tourable_get_theme_options();
        $readmore = ! empty( $options['blog_read_more'] ) ? $options['blog_read_more'] : esc_html__( 'Read More', 'tourable' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="latest-posts" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="section-content blog-posts-wrapper clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="post-item-wrapper clear">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image matchheight" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container matchheight">
                                    <div class="entry-meta">
                                        <?php tourable_posted_on( $content['id'] ); ?>
                                    </div><!-- .entry-meta -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->

                                    <?php the_category( '', '', $content['id'] ); ?>

                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="more-link">
                                        <?php  
                                            echo esc_html( $readmore );
                                            echo ' ' . tourable_get_svg( array( 'icon' => 'down' ) );
                                        ?>
                                    </a><!-- .more-link -->
                                </div><!-- .entry-container -->
                            </div><!-- .post-item-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->

            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->

    <?php }
endif;