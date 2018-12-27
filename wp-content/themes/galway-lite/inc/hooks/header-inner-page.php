<?php
global $post;
if (!function_exists('galway_lite_single_page_title')) :
    function galway_lite_single_page_title()
    {
        global $post;
        $global_banner_image = get_header_image();
        // Check if single.
        if (is_singular()) {
            if (has_post_thumbnail($post->ID)) {
                $banner_image_single_post = get_post_meta($post->ID, 'galway-lite-meta-checkbox', true);
                if ('yes' == $banner_image_single_post) {
                    $banner_image_array = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'galway-lite-header-image');
                    $global_banner_image = $banner_image_array[0];
                }
            }
        }
        ?>

        <div class="wrapper page-inner-title inner-banner primary-bgcolor data-bg"
             data-background="<?php echo esc_url($global_banner_image); ?>">
            <header class="entry-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <?php if (is_singular()) { ?>
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                <div class="title-seperator secondary-bgcolor"></div>
                                <div class="inner-meta-info">
                                    <?php galway_lite_posted_details(); ?>
                                </div>
                            <?php } elseif (is_404()) { ?>
                                <h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'galway-lite'); ?></h1>
                                <div class="title-seperator secondary-bgcolor"></div>
                            <?php } elseif (is_archive()) {
                                the_archive_title('<h1 class="entry-title">', '</h1>'); ?>
                                <div class="title-seperator secondary-bgcolor"></div>
                                <?php the_archive_description('<div class="taxonomy-description">', '</div>');
                            } elseif (is_search()) { ?>
                                <h1 class="entry-title"><?php printf(esc_html__('Search Results for: %s', 'galway-lite'), '<span>' . get_search_query() . '</span>'); ?></h1>
                                <div class="title-seperator secondary-bgcolor"></div>
                            <?php } else { } ?>
                            <?php
                            /**
                             * Hook - galway_lite_add_breadcrumb.
                             */
                            do_action('galway_lite_action_breadcrumb');
                            ?>
                        </div>
                    </div>
                </div>
            </header><!-- .entry-header -->
            <div class="inner-header-overlay"></div>
        </div>

        <?php
    }
endif;
add_action('galway-lite-page-inner-title', 'galway_lite_single_page_title', 15);
