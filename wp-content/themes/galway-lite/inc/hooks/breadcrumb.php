<?php

if (!function_exists('galway_lite_add_breadcrumb')) :

    /**
     * Add breadcrumb.
     *
     * @since 1.0.0
     */
    function galway_lite_add_breadcrumb()
    {

        // Bail if Breadcrumb disabled.
        $breadcrumb_type = galway_lite_get_option('breadcrumb_type');
        if ('disabled' === $breadcrumb_type) {
            return;
        }
        // Bail if Home Page.
        if (is_front_page() || is_home()) {
            return;
        }
        // Render breadcrumb.
        switch ($breadcrumb_type) {
            case 'simple':
                galway_lite_simple_breadcrumb();
                break;

            case 'advanced':
                if (function_exists('bcn_display')) {
                    bcn_display();
                }
                break;

            default:
                break;
        }
        return;

    }

endif;

add_action('galway_lite_action_breadcrumb', 'galway_lite_add_breadcrumb', 10);
