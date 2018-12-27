<?php
/**
 * responsiveblogily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package responsiveblogily
 */


if ( ! function_exists( 'responsiveblogily_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

function responsiveblogily_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on responsiveblogily, use a find and replace
		 * to change 'responsiveblogily' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'responsiveblogily', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300 );

		add_image_size( 'responsiveblogily-grid', 350 , 230, true );
		add_image_size( 'responsiveblogily-slider', 850 );
		add_image_size( 'responsiveblogily-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'responsiveblogily' ),
			) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'responsiveblogily_custom_background_args', array(
			'default-color' => '#f1f1f1',
			) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'responsiveblogily_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function responsiveblogily_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'responsiveblogily_content_width', 640 );
}
add_action( 'after_setup_theme', 'responsiveblogily_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function responsiveblogily_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'responsiveblogily' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'responsiveblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (1)', 'responsiveblogily' ),
		'id'            => 'footerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'responsiveblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (2)', 'responsiveblogily' ),
		'id'            => 'footerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'responsiveblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (3)', 'responsiveblogily' ),
		'id'            => 'footerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'responsiveblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );
}




add_action( 'widgets_init', 'responsiveblogily_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function responsiveblogily_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'responsiveblogily-style', get_stylesheet_uri() );
	wp_enqueue_script( 'responsiveblogily-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'responsiveblogily-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );	
	wp_enqueue_script( 'responsiveblogily-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'responsiveblogily_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Google fonts, credits can be found in readme.
 */

function responsiveblogily_google_fonts() {

	wp_enqueue_style( 'responsiveblogily-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,900|Merriweather:400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'responsiveblogily_google_fonts' );


/**
 * Dots after excerpt
 */

function responsiveblogily_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'responsiveblogily_new_excerpt_more');



/**
 * Blog Pagination 
 */
if ( !function_exists( 'responsiveblogily_numeric_posts_nav' ) ) {
	
	function responsiveblogily_numeric_posts_nav() {
		
		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(the_posts_pagination(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
				) ));
		}
	}
	
}







/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function responsiveblogily_comparepage_css($hook) {
	if ( 'appearance_page_responsiveblogily-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'responsiveblogily-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'responsiveblogily_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'responsiveblogily_themepage');
function responsiveblogily_themepage(){
	$theme_info = add_theme_page( __('Responsive Blogily','responsiveblogily'), __('Responsive Blogily','responsiveblogily'), 'manage_options', 'responsiveblogily-info.php', 'responsiveblogily_info_page' );
}

function responsiveblogily_info_page() {
	$user = wp_get_current_user();
	?>
	<div class="wrap about-wrap responsiveblogily-add-css">
		<div>
			<h1>
				<?php echo esc_html__('Welcome to Responsive Blogily!','responsiveblogily'); ?>
			</h1>

			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html__("Contact Support", "responsiveblogily"); ?></h3>
						<p><?php echo esc_html__("Getting started with a new theme can be difficult, if you have issues with Responsive Blogily then throw us an email.", "responsiveblogily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'responsiveblogily'); ?>" class="button button-primary">
							<?php echo esc_html__("Contact Support", "responsiveblogily"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html__("View our other themes", "responsiveblogily"); ?></h3>
						<p><?php echo esc_html__("Do you like our concept but feel like the design doesn't fit your need? Then check out our website for more designs.", "responsiveblogily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/wordpress-themes/', 'responsiveblogily'); ?>" class="button button-primary">
							<?php echo esc_html__("View All Themes", "responsiveblogily"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html__("Premium Edition", "responsiveblogily"); ?></h3>
						<p><?php echo esc_html__("If you enjoy Responsive Blogily and want to take your website to the next step, then check out our premium edition here.", "responsiveblogily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/responsiveblogily/', 'responsiveblogily'); ?>" class="button button-primary">
							<?php echo esc_html__("Read More", "responsiveblogily"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php echo esc_html__("Free Vs Premium","responsiveblogily"); ?></h2>
		<div class="responsiveblogily-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/responsiveblogily/', 'responsiveblogily'); ?>" class="button button-primary">
				<?php echo esc_html__("Read Full Description", "responsiveblogily"); ?>
			</a>
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/responsiveblogily/', 'responsiveblogily'); ?>" class="button button-primary">
				<?php echo esc_html__("View Theme Demo", "responsiveblogily"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead>
				<tr>
					<th><strong><?php echo esc_html__("Theme Feature", "responsiveblogily"); ?></strong></th>
					<th><strong><?php echo esc_html__("Basic Version", "responsiveblogily"); ?></strong></th>
					<th><strong><?php echo esc_html__("Premium Version", "responsiveblogily"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php echo esc_html__("Header Background Color", "responsiveblogily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Image Under Navigation", "responsiveblogily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Header Logo Or Text	", "responsiveblogily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Hide Logo Text", "responsiveblogily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Premium Support", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Recent Posts Widget", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Easy Google Fonts", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Pagespeed Plugin", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Recent Posts Widget", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Logo Container Background Image", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Only Show Header Image On Front Page", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Link On Header Image", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Text On Header Image", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Custom Header Image Height", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Only Show Upper Widgets On Front Page", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Replace Copyright Text", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Customize Upper Widgets Colors", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Customize Navigation Color", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Customize Post/Page Color", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Customize Blog Feed Color", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Customize Footer Color", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Customize Sidebar Color", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html__("Customize Background Color", "responsiveblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="No" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="Yes" /></span></td>
				</tr>
			</tbody>
		</table>

	</div>
	<?php
}



