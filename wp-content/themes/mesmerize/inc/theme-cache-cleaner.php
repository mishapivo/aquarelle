<?php

add_action('after_setup_theme', function () {
    if (isset($_GET['mesmerize_clear_theme_cache']) && current_user_can('edit_theme_options')) {
        mesmerize_clear_cached_values();
        wp_redirect(site_url());
        exit;
    }
});
