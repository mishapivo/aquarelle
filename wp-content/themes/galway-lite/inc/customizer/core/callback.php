<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Galway Lite
 */

/*select page for slider*/
if (!function_exists('galway_lite_is_select_page_slider')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function galway_lite_is_select_page_slider($control)
    {

        if ('from-page' === $control->manager->get_setting('select_slider_from')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select cat for slider*/
if (!function_exists('galway_lite_is_select_cat_slider')) :

    /**
     * Check if slider section form page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function galway_lite_is_select_cat_slider($control)
    {

        if ('from-category' === $control->manager->get_setting('select_slider_from')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;