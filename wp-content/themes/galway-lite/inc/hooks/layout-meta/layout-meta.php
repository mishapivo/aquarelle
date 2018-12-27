<?php
/**
 * Implement theme metabox.
 *
 * @package Galway Lite
 */

if (!function_exists('galway_lite_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function galway_lite_add_theme_meta_box()
    {

        $apply_metabox_post_types = array('post', 'page');

        foreach ($apply_metabox_post_types as $key => $type) {
            add_meta_box(
                'galway-lite-theme-settings',
                esc_html__('Single Page/Post Settings', 'galway-lite'),
                'galway_lite_render_theme_settings_metabox',
                $type
            );
        }

    }

endif;

add_action('add_meta_boxes', 'galway_lite_add_theme_meta_box');

if (!function_exists('galway_lite_render_theme_settings_metabox')) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function galway_lite_render_theme_settings_metabox($post, $metabox)
    {

        $post_id = $post->ID;
        $galway_lite_post_meta_value = get_post_meta($post_id);

        // Meta box nonce for verification.
        wp_nonce_field(basename(__FILE__), 'galway_lite_meta_box_nonce');
        // Fetch Options list.
        $page_layout = get_post_meta($post_id, 'galway-lite-meta-select-layout', true);
        $page_image_layout = get_post_meta($post_id, 'galway-lite-meta-image-layout', true);
        ?>
        <div id="galway-lite-settings-metabox-container" class="galway-lite-settings-metabox-container">
            <div id="galway-lite-settings-metabox-tab-layout">
                <h4><?php echo esc_html__('Layout Settings', 'galway-lite'); ?></h4>
                <div class="galway-lite-row-content">
                    <!-- Checkbox Field-->
                    <p>
                    <div class="galway-lite-row-content">
                        <label for="galway-lite-meta-checkbox">
                            <input type="checkbox" name="galway-lite-meta-checkbox" id="galway-lite-meta-checkbox"
                                   value="yes" <?php if (isset ($galway_lite_post_meta_value['galway-lite-meta-checkbox'])) checked($galway_lite_post_meta_value['galway-lite-meta-checkbox'][0], 'yes'); ?> />
                            <?php _e('Check To Use Featured Image As Banner Image', 'galway-lite') ?>
                        </label>
                    </div>
                    </p>
                    <!-- Select Field-->
                    <p>
                        <label for="galway-lite-meta-select-layout" class="galway-lite-row-title">
                            <?php _e('Single Page/Post Layout', 'galway-lite') ?>
                        </label>
                        <select name="galway-lite-meta-select-layout" id="galway-lite-meta-select-layout">
                            <option value="left-sidebar" <?php selected('left-sidebar', $page_layout); ?>>
                                <?php _e('Primary Sidebar - Content', 'galway-lite') ?>
                            </option>
                            <option value="right-sidebar" <?php selected('right-sidebar', $page_layout); ?>>
                                <?php _e('Content - Primary Sidebar', 'galway-lite') ?>
                            </option>
                            <option value="no-sidebar" <?php selected('no-sidebar', $page_layout); ?>>
                                <?php _e('No Sidebar', 'galway-lite') ?>
                            </option>
                        </select>
                    </p>

                    <!-- Select Field-->
                    <p>
                        <label for="galway-lite-meta-image-layout" class="galway-lite-row-title">
                            <?php _e('Single Page/Post Image Layout', 'galway-lite') ?>
                        </label>
                        <select name="galway-lite-meta-image-layout" id="galway-lite-meta-image-layout">
                            <option value="full" <?php selected('full', $page_image_layout); ?>>
                                <?php _e('Full', 'galway-lite') ?>
                            </option>
                            <option value="left" <?php selected('left', $page_image_layout); ?>>
                                <?php _e('Left', 'galway-lite') ?>
                            </option>
                            <option value="right" <?php selected('right', $page_image_layout); ?>>
                                <?php _e('Right', 'galway-lite') ?>
                            </option>
                            <option value="no-image" <?php selected('no-image', $page_image_layout); ?>>
                                <?php _e('No Image', 'galway-lite') ?>
                            </option>
                        </select>
                    </p>
                </div><!-- .galway-lite-row-content -->
            </div><!-- #galway-lite-settings-metabox-tab-layout -->
        </div><!-- #galway-lite-settings-metabox-container -->

        <?php
    }

endif;


if (!function_exists('galway_lite_save_theme_settings_meta')) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int $post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function galway_lite_save_theme_settings_meta($post_id, $post)
    {

        // Verify nonce.
        if (!isset($_POST['galway_lite_meta_box_nonce']) || !wp_verify_nonce($_POST['galway_lite_meta_box_nonce'], basename(__FILE__))) {
            return;
        }

        // Bail if auto save or revision.
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
        if (empty($_POST['post_ID']) || $_POST['post_ID'] != $post_id) {
            return;
        }

        // Check permission.
        if ('page' === $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return;
            }
        } else if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $galway_lite_meta_checkbox = isset($_POST['galway-lite-meta-checkbox']) ? esc_attr($_POST['galway-lite-meta-checkbox']) : '';
        update_post_meta($post_id, 'galway-lite-meta-checkbox', sanitize_text_field($galway_lite_meta_checkbox));

        $galway_lite_meta_select_layout = isset($_POST['galway-lite-meta-select-layout']) ? esc_attr($_POST['galway-lite-meta-select-layout']) : '';
        if (!empty($galway_lite_meta_select_layout)) {
            update_post_meta($post_id, 'galway-lite-meta-select-layout', sanitize_text_field($galway_lite_meta_select_layout));
        }
        $galway_lite_meta_image_layout = isset($_POST['galway-lite-meta-image-layout']) ? esc_attr($_POST['galway-lite-meta-image-layout']) : '';
        if (!empty($galway_lite_meta_image_layout)) {
            update_post_meta($post_id, 'galway-lite-meta-image-layout', sanitize_text_field($galway_lite_meta_image_layout));
        }
    }

endif;

add_action('save_post', 'galway_lite_save_theme_settings_meta', 10, 3);