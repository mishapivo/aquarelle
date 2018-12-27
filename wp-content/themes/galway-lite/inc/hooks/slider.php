<?php
if (!function_exists('galway_lite_banner_slider_args')) :
    /**
     * Banner Slider Details
     *
     * @since Galway 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function galway_lite_banner_slider_args()
    {
        $galway_lite_banner_slider_number = absint(galway_lite_get_option('number_of_home_slider'));
        $galway_lite_banner_slider_from = esc_attr(galway_lite_get_option('select_slider_from'));
        switch ($galway_lite_banner_slider_from) {
            case 'from-page':
                $galway_lite_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $galway_lite_banner_slider_number; $i++) {
                    $galway_lite_banner_slider_page_list = galway_lite_get_option('select_page_for_slider_' . $i);
                    if (!empty($galway_lite_banner_slider_page_list)) {
                        $galway_lite_banner_slider_page_list_array[] = absint($galway_lite_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($galway_lite_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => absint($galway_lite_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => absint($galway_lite_banner_slider_page_list_array),
                );
                return $qargs;
                break;

            case 'from-category':
                $galway_lite_banner_slider_category = absint(galway_lite_get_option('select_category_for_slider'));
                $qargs = array(
                    'posts_per_page' => absint($galway_lite_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => absint($galway_lite_banner_slider_category),
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;


if (!function_exists('galway_lite_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since Galway 1.0.0
     *
     */
    function galway_lite_banner_slider()
    {
        $galway_lite_slider_button_text = esc_html(galway_lite_get_option('button_text_on_slider'));
        $galway_lite_slider_layout = esc_attr(galway_lite_get_option('slider_section_layout'));
        $galway_lite_slider_excerpt_number = absint(galway_lite_get_option('number_of_content_home_slider'));
        if (1 != galway_lite_get_option('show_slider_section')) {
            return null;
        }
        $galway_lite_banner_slider_args = galway_lite_banner_slider_args();
        $galway_lite_banner_slider_query = new WP_Query($galway_lite_banner_slider_args); ?>
        <section class="twp-slider-wrapper pt-40 pb-10 secondary-bgcolor">
            <div class="twp-slider <?php echo esc_attr($galway_lite_slider_layout);
            ?>">
                <?php
                if ($galway_lite_banner_slider_query->have_posts()) :
                    while ($galway_lite_banner_slider_query->have_posts()) : $galway_lite_banner_slider_query->the_post();
                        if (has_excerpt()) {
                            $galway_lite_slider_content = get_the_excerpt();
                        } else {
                            $galway_lite_slider_content = galway_lite_words_count($galway_lite_slider_excerpt_number, get_the_content());
                        }
                        ?>
                        <div class="single-slide">
                            <?php if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'galway-lite-main-banner');
                                $url = $thumb['0'];  ?>
                                <div class="slide-bg bg-image animated">
                                    <img src="<?php echo esc_url($url); ?>">
                                </div>
                            <?php } ?>
                            <div class="slide-text animated pb-30">
                                <h2 class="secondary-textcolor"><?php the_title(); ?></h2>
                                <div class="title-seperator secondary-bgcolor"></div>
                                <?php if ($galway_lite_slider_excerpt_number != 0) { ?>
                                    <p class="secondary-textcolor visible hidden-xs"><?php echo wp_kses_post($galway_lite_slider_content); ?></p>
                                <?php } ?>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php echo esc_html($galway_lite_slider_button_text); ?> <i
                                        class="ion-ios-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </section>
        <!-- end slider-section -->
        <?php
    }
endif;
add_action('galway_lite_action_slider_post', 'galway_lite_banner_slider', 10);