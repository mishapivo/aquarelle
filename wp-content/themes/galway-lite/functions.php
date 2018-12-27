<?php
/**
 * Galway functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Galway Lite
 */

if (!function_exists('galway_lite_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function galway_lite_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Galway, use a find and replace
         * to change 'galway-lite' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'galway-lite', get_template_directory() . '/languages' );



        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for custom logo.
         */
        add_theme_support('custom-logo', array(
            'header-text' => array('site-title', 'site-description'),
        ));
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('galway-lite-main-banner', 1370, 550, true);
        add_image_size('galway-lite-related-post', 700, 465, true);


        // Set up the WordPress core custom header feature.
        add_theme_support('custom-header', apply_filters('galway_lite_custom_header_args', array(
            'width' => 1920,
            'height' => 600,
            'flex-height' => true,
            'header-text' => false,
        )));

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'top' => esc_html__('Top Nav', 'galway-lite'),
            'primary' => esc_html__('Primary', 'galway-lite'),
            'social' => esc_html__('Social Menu', 'galway-lite'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('galway_lite_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'audio',
        ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, and column width.
         */
        add_editor_style( 'assets/twp/css/editor-style.css' );

        /**
         * Load Init for Hook files.
         */
        require get_template_directory() . '/inc/hooks/hooks-init.php';

    }
endif;
add_action('after_setup_theme', 'galway_lite_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function galway_lite_content_width()
{
    $GLOBALS['content_width'] = apply_filters('galway_lite_content_width', 640);
}

add_action('after_setup_theme', 'galway_lite_content_width', 0);


if (!function_exists('galway_lite_ocdi_files')) :
    /**
     * OCDI files.
     *
     * @since 1.0.0
     *
     * @return array Files.
     */
    function galway_lite_ocdi_files() {
        return array(
            array(
                'import_file_name'             => esc_html__( 'Theme Demo Content', 'galway-lite' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-content/galway-lite.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-content/galway-lite.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-content/galway-lite.dat',
            ),
        );
    }
endif;
add_filter( 'pt-ocdi/import_files', 'galway_lite_ocdi_files');
/**
 * Enqueue scripts and styles.
 */
function galway_lite_scripts()
{
    wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/assets/libraries/owlcarousel/css/owl.carousel.css');
    wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/libraries/ionicons/css/ionicons.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/libraries/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('sidr-nav', get_template_directory_uri() . '/assets/libraries/sidr/css/jquery.sidr.dark.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/libraries/animate/animate.css');
    wp_enqueue_style('vertical', get_template_directory_uri() . '/assets/libraries/vertical/vertical.css');
    wp_enqueue_style('galway-lite-style', get_stylesheet_uri());
    /*inline style*/
    wp_add_inline_style('galway-lite-style', galway_lite_trigger_custom_css_action());

    $fonts_url = galway_lite_fonts_url();
    if (!empty($fonts_url)) {
        wp_enqueue_style('galway-lite-google-fonts', $fonts_url, array(), null);
    }
    wp_enqueue_script('galway-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('galway-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/libraries/owlcarousel/js/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/libraries/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('match-height', get_template_directory_uri() . '/assets/libraries/jquery-match-height/js/jquery.matchHeight.min.js', array('jquery'), '', true);
    wp_enqueue_script('sidr', get_template_directory_uri() . '/assets/libraries/sidr/js/jquery.sidr.min.js', array('jquery'), '', true);
    wp_enqueue_script('theiaStickySidebar', get_template_directory_uri() . '/assets/libraries/theiaStickySidebar/theia-sticky-sidebar.min.js', array('jquery'), '', true);
    wp_enqueue_script('galway-lite-script', get_template_directory_uri() . '/assets/twp/js/custom-script.js', array('jquery'), '', 1);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'galway_lite_scripts');

/**
 * Enqueue admin scripts and styles.
 */
function galway_lite_admin_scripts($hook)
{
    if ('widgets.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_style('galway-lite-custom-admin-style', get_template_directory_uri() . '/assets/twp/css/admin.css', array(), '1.0.0');
        wp_enqueue_script('galway-lite-custom-widgets', get_template_directory_uri() . '/assets/twp/js/widgets.js', array('jquery'), '1.0.0', true);
    }

}

add_action('admin_enqueue_scripts', 'galway_lite_admin_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';