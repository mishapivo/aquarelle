<?php 
/**
 * Alacrity Lite functions and definitions
 *
 * @package Alacrity Lite
 */
if ( ! isset( $content_width ) )
	$content_width = 700; /* pixels */ 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'alacrity_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

function alacrity_lite_setup() {
	load_theme_textdomain( 'alacrity-lite', get_template_directory() . '/languages' );
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Adds <title> tag.
    add_theme_support( 'title-tag' );

    //This theme supports woocommerce
    add_theme_support('woocommerce');
    
	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'alacrity-lite' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme supports custom logo
	add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 300,
    'header-selector' => '.site-title',
	'header-text'     => true,
	'flex-height'     => true,
	) );


	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	//search form
	add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
endif; // alacrity_lite_setup
add_action( 'after_setup_theme', 'alacrity_lite_setup' );


/**
 * Register widget area.
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function alacrity_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'alacrity-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	//Footer widget 1
	$widget_areas = get_theme_mod('footer_widgets', '1');
		register_sidebar( array(
			'name'          => __( 'Footer 1', 'alacrity-lite' ),
			'id'            => 'footer-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	//Footer widget 2
	$widget_areas = get_theme_mod('footer_widgets', '2');
		register_sidebar( array(
			'name'          => __( 'Footer 2', 'alacrity-lite' ),
			'id'            => 'footer-2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	//Footer widget 3
	$widget_areas = get_theme_mod('footer_widgets', '3');
		register_sidebar( array(
			'name'          => __( 'Footer 3', 'alacrity-lite' ),
			'id'            => 'footer-3',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', 'alacrity_lite_widgets_init' );


/**
 * Enqueue Fonts
 */
function alacrity_lite_enqueue_fonts() {
	wp_enqueue_style( 'alacrity-lite-fonts', 'https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i', false );	wp_enqueue_style( 'alacrity-lite-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i', false ); 
	wp_enqueue_style( 'alacrity-lite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'alacrity-lite-nivo-slider-style', get_template_directory_uri() . '/css/nivo-slider.css' );
	wp_enqueue_style( 'alacrity-lite-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
	wp_enqueue_script( 'alacrity-lite-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery'),'', true );
	wp_enqueue_script( 'alacrity-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'alacrity-lite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'),'20170504', true );
	wp_enqueue_script( 'alacrity-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	
}
add_action( 'wp_enqueue_scripts', 'alacrity_lite_enqueue_fonts' );


/**
 * Add support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Walker Class for Navigation Menu
 */

if ( ! function_exists( 'alacrity_lite_social_links' ) ) :
/**
 * Displays the social links
 *
 */
function alacrity_lite_social_links() { ?>
		<?php 
		$fb_link = get_theme_mod('fb_link');
        $twit_link = get_theme_mod('twit_link');
        $gplus_link = get_theme_mod('gplus_link');
        $linked_link = get_theme_mod('linked_link');
        $pinterest_link = get_theme_mod('pinterest_link');

    if($fb_link || $twit_link || $gplus_link || $linked_link || $pinterest_link) { ?>
    <div class="social-icons">
        <?php if (!empty($fb_link)) { ?>
   			<a href="<?php echo esc_url($fb_link); ?>" target="_blank" class="fa fa-facebook fa-1x" title="<?php esc_attr_e('Facebook','alacrity-lite'); ?>"></a>
        <?php } ?>
        <?php if (!empty($twit_link)) { ?>
            <a href="<?php echo esc_url($twit_link); ?>" target="_blank" class="fa fa-twitter fa-1x" title="<?php esc_attr_e('Twitter','alacrity-lite'); ?>"></a>
        <?php } ?>
        <?php if (!empty($gplus_link)) { ?>
            <a href="<?php echo esc_url($gplus_link); ?>" target="_blank" class="fa fa-google-plus fa-1x" title="<?php esc_attr_e('Google Plus','alacrity-lite'); ?>"></a>
        <?php } ?>
        <?php if (!empty($linked_link)) { ?>
            <a href="<?php echo esc_url($linked_link); ?>" target="_blank" class="fa fa-linkedin fa-1x" title="<?php esc_attr_e('Linkedin','alacrity-lite'); ?>"></a>
        <?php } ?>
        <?php if (!empty($pinterest_link)) { ?>
            <a href="<?php echo esc_url($pinterest_link); ?>" target="_blank" class="fa fa-pinterest fa-1x" title="<?php esc_attr_e('Pinterest','alacrity-lite'); ?>"></a>
        <?php } ?>            
    </div>
<?php }
 }
endif;

if ( ! function_exists( 'alacrity_lite_excerpt' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function alacrity_lite_excerpt($limit) {
  $excerpt = explode(' ', get_the_content(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' ';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;

if ( ! function_exists( 'alacrity_lite_custom_pagination' ) ) :
function alacrity_lite_custom_pagination( $nav_query = false ) { 
	 global $wp_query, $wp_rewrite;
    // Don't print empty markup if there's only one page.
    $query  = $nav_query ? $nav_query : $wp_query;
	?>
	<div class="pagination">
    <?php 
     $GLOBALS['wp_query']->max_num_pages = $query->max_num_pages;
        the_posts_pagination( array(
            'mid_size' => 1,
            'prev_text' => __( '&laquo;', 'alacrity-lite' ),
            'next_text' => __( '&raquo;', 'alacrity-lite' ),
            'screen_reader_text' => __( 'Posts navigation', 'alacrity-lite' )
 	) );?>
    </div>
 <?php }
endif;

if( ! function_exists( 'alacrity_lite_excerpt' ) ):

    function alacrity_lite_excerpt( $length = 55, $echo = true, $more = '' ) {
        $length = apply_filters( 'alacrity_lite_excerpt_length', $length );
        return alacrity_lite::get_instance()->excerpt( $length, $echo, $more );
    }
endif;

// alacrity_lite_excerpt(40); 