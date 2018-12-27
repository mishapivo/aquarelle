<?php
if (!function_exists('galway_lite_the_custom_logo')):
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Galway 1.0.0
 */
function galway_lite_the_custom_logo() {
	if (function_exists('the_custom_logo')) {
		the_custom_logo();
	}
}
endif;

if (!function_exists('galway_lite_body_class')):

/**
 * body class.
 *
 * @since 1.0.0
 */
function galway_lite_body_class($galway_lite_body_class) {
	global $post;
	$global_layout       = galway_lite_get_option('global_layout');
	$input               = '';
	$home_content_status = galway_lite_get_option('home_page_content_status');
	if (1 != $home_content_status) {
		$input = 'home-content-not-enabled';
	}
	// Check if single.
	if ($post && is_singular()) {
		$post_options = get_post_meta($post->ID, 'galway-lite-meta-select-layout', true);
		if (empty($post_options)) {
			$global_layout = esc_attr(galway_lite_get_option('global_layout'));
		} else {
			$global_layout = esc_attr($post_options);
		}
	}
	if ($global_layout == 'left-sidebar') {
		$galway_lite_body_class[] = 'left-sidebar '.esc_attr($input);
	} elseif ($global_layout == 'no-sidebar') {
		$galway_lite_body_class[] = 'no-sidebar '.esc_attr($input);
	} else {
		$galway_lite_body_class[] = 'right-sidebar '.esc_attr($input);

	}
	return $galway_lite_body_class;
}
endif;

add_action('body_class', 'galway_lite_body_class');

add_action('galway_lite_action_sidebar', 'galway_lite_add_sidebar');

/**
 * Returns word count of the sentences.
 *
 * @since Galway 1.0.0
 */
if (!function_exists('galway_lite_words_count')):
function galway_lite_words_count($length = 25, $galway_lite_content = null) {
	$length          = absint($length);
	$source_content  = preg_replace('`\[[^\]]*\]`', '', $galway_lite_content);
	$trimmed_content = wp_trim_words($source_content, $length, '');
	return $trimmed_content;
}
endif;

if (!function_exists('galway_lite_simple_breadcrumb')):

/**
 * Simple breadcrumb.
 *
 * @since 1.0.0
 */
function galway_lite_simple_breadcrumb() {

	if (!function_exists('breadcrumb_trail')) {

		require_once get_template_directory().'/assets/libraries/breadcrumbs/breadcrumbs.php';
	}

	$breadcrumb_args = array(
		'container'   => 'div',
		'show_browse' => false,
	);
	breadcrumb_trail($breadcrumb_args);

}

endif;

if (!function_exists('galway_lite_custom_posts_navigation')):
/**
 * Posts navigation.
 *
 * @since 1.0.0
 */
function galway_lite_custom_posts_navigation() {

	$pagination_type = galway_lite_get_option('pagination_type');

	switch ($pagination_type) {

		case 'default':
			the_posts_navigation();
			break;

		case 'numeric':
			the_posts_pagination();
			break;

		default:
			break;
	}

}
endif;

add_action('galway_lite_action_posts_navigation', 'galway_lite_custom_posts_navigation');

if (!function_exists('galway_lite_excerpt_length') && !is_admin()):

/**
 * Excerpt length
 *
 * @since  Galway 1.0.0
 *
 * @param null
 * @return int
 */
function galway_lite_excerpt_length($length) {
	global $galway_lite_customizer_all_values;
	$excerpt_length = $galway_lite_customizer_all_values['excerpt_length_global'];
	if (empty($excerpt_length)) {
		$excerpt_length = $length;
	}
	return absint($excerpt_length);

}

add_filter('excerpt_length', 'galway_lite_excerpt_length', 999);
endif;

if (!function_exists('galway_lite_excerpt_more') && !is_admin()):

/**
 * Implement read more in excerpt.
 *
 * @since 1.0.0
 *
 * @param string $more The string shown within the more link.
 * @return string The excerpt.
 */
function galway_lite_excerpt_more($more) {

	$flag_apply_excerpt_read_more = apply_filters('galway_lite_filter_excerpt_read_more', true);
	if (true !== $flag_apply_excerpt_read_more) {
		return $more;
	}

	$output         = $more;
	$read_more_text = esc_html(galway_lite_get_option('read_more_button_text'));
	if (!empty($read_more_text)) {
		$output = ' <a href="'.esc_url(get_permalink()).'" class="read-more">'.esc_html($read_more_text).'<i class="ion-ios-arrow-right"></i>'.'</a>';
		$output = apply_filters('galway_lite_filter_read_more_link', $output);
	}
	return $output;

}

add_filter('excerpt_more', 'galway_lite_excerpt_more');
endif;

if (!function_exists('galway_lite_get_link_url')):

/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since 1.0.0
 *
 * @return string The Link format URL.
 */
function galway_lite_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content($content);

	return ($has_url)?$has_url:apply_filters('the_permalink', get_permalink());
}

endif;

if (!function_exists('galway_lite_fonts_url')):

/**
 * Return fonts URL.
 *
 * @since 1.0.0
 * @return string Fonts URL.
 */
function galway_lite_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	$galway_lite_primary_font   = galway_lite_get_option('primary_font');
	$galway_lite_secondary_font = galway_lite_get_option('secondary_font');

	$galway_lite_fonts   = array();
	$galway_lite_fonts[] = $galway_lite_primary_font;
	$galway_lite_fonts[] = $galway_lite_secondary_font;

	$galway_lite_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

	$i = 0;
	for ($i = 0; $i < count($galway_lite_fonts); $i++) {

		if ('off' !== sprintf(_x('on', '%s font: on or off', 'galway-lite'), $galway_lite_fonts[$i])) {
			$fonts[] = $galway_lite_fonts[$i];
		}

	}

	if ($fonts) {
		$fonts_url = add_query_arg(array(
				'family' => urldecode(implode('|', $fonts)),
			), 'https://fonts.googleapis.com/css');
	}

	return $fonts_url;
}

endif;

/*Recomended plugin*/
if (!function_exists('galway_lite_recommended_plugins')):

/**
 * Recommended plugins
 *
 */
function galway_lite_recommended_plugins() {
	$galway_lite_plugins = array(
		array(
			'name'     => __('One Click Demo Import', 'galway-lite'),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
	);
	$galway_lite_plugins_config = array(
		'dismissable' => true,
	);

	tgmpa($galway_lite_plugins, $galway_lite_plugins_config);
}
endif;
add_action('tgmpa_register', 'galway_lite_recommended_plugins');


function galway_lite_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'galway_lite_archive_title' );


function galway_lite_check_other_plugin() {
    // check for plugin using plugin name
    if (is_plugin_active('one-click-demo-import/one-click-demo-import.php')) {
        // Disable PT branding.
        add_filter('pt-ocdi/disable_pt_branding', '__return_true');
        //plugin is activated
        function ocdi_after_import_setup() {
            // Assign menus to their locations.
            $main_menu   = get_term_by('name', 'Primary Nav', 'nav_menu');
            $footer_menu = get_term_by('name', 'Top Nav', 'nav_menu');
            $social_menu = get_term_by('name', 'Social Nav', 'nav_menu');

            set_theme_mod('nav_menu_locations', array(
                    'primary' => $main_menu->term_id,
                    'top'  => $footer_menu->term_id,
                    'social'  => $social_menu->term_id,
                )
            );

            // Assign front page and posts page (blog page).
            $front_page_id = get_page_by_title('');
            $blog_page_id  = get_page_by_title('Blog');

            update_option('show_on_front', 'page');
            update_option('page_on_front', $front_page_id->ID);
            update_option('page_for_posts', $blog_page_id->ID);

        }
        add_action('pt-ocdi/after_import', 'ocdi_after_import_setup');
    }
}
add_action('admin_init', 'galway_lite_check_other_plugin');