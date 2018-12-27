<?php
/**
 * Di Blog Engine. This file is responsible for theme setup, scripts, styles, sidebar registration.
 *
 * @package Di Blog
 */

/**
 * Class Di_Blog_Engine.
 */
class Di_Blog_Engine {
	/**
	 * Instance object.
	 *
	 * @var instance
	 */
	public static $instance;

	/**
	 * Get_instance method.
	 *
	 * @return instance instance of the class.
	 */
	public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Construct method.
	 */
	public function __construct() {
		$this->set_constants();
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles' ) );
		add_action( 'customize_preview_init', array( $this, 'customizer_scripts_and_styles' ) );
		add_action( 'widgets_init', array( $this, 'sidebar_registration' ) );
	}

	/**
	 *  Set constants.
	 */
	public function set_constants() {
		define( 'DI_BLOG_VERSION', wp_get_theme( 'di-blog' )->get( 'Version' ) );
	}

	/**
	 * [setup description]
	 * @return [type] [description]
	 */
	public function setup() {

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 730;
		}

		load_theme_textdomain( 'di-blog', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1092, 667, true );
		add_image_size( 'di-blog-recentpostthumb', 90, 90, true );
		add_image_size( 'di-blog-owl-img', 450, 300, true );

		// This theme uses wp_nav_menu() at one locations.
		register_nav_menus( array(
			'primary'	=> __( 'Top Main Menu', 'di-blog' ),
			'sidebar'	=> __( 'Sidebar Menu', 'di-blog' ),
		) );

		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		//add_theme_support( 'post-formats', array( 'quote' ) );

		add_theme_support( 'custom-background', array(
			'default-color'      => '#fcfcfc',
			'default-attachment' => 'fixed',
		) );

		add_theme_support( 'custom-header', array(
			'width'         => 1350,
			'height'        => 260,
			'flex-width'    => true,
			'flex-height'   => true,
			'uploads'       => true,
			'header-text'	=> false,
		) );

		add_theme_support( 'custom-logo', array(
			'height'		=> '160',
			'width'			=> '360',
			'flex-height'	=> true,
			'flex-width'	=> true,
		) );

		add_theme_support( 'post-formats', array(
			'video',
			'audio',
			'image',
			'gallery',
			'quote',
			'link',
		) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_editor_style( array( '//fonts.googleapis.com/css?family=Raleway', get_template_directory_uri() . '/assets/css/style.css', get_template_directory_uri() . '/assets/css/editor-style.css' ) );
	}

	/**
	 * [scripts_and_styles description]
	 * @return [type] [description]
	 */
	public function scripts_and_styles() {

		// Load bootstrap css.
		wp_enqueue_style( 'bootstrap', trailingslashit( get_template_directory_uri() ) . 'assets/css/bootstrap.css', array(), '4.0.0', 'all' );

		// Load font-awesome file.
		wp_enqueue_style( 'font-awesome', trailingslashit( get_template_directory_uri() ) . 'assets/css/font-awesome.css', array(), '4.7.0', 'all' );

		// Load default css file.
		wp_enqueue_style( 'di-blog-style-default', get_stylesheet_uri(), array( 'bootstrap', 'font-awesome' ), DI_BLOG_VERSION, 'all' );

		// Load css/style.css file.
		wp_enqueue_style( 'di-blog-style-core', trailingslashit( get_template_directory_uri() ) . 'assets/css/style.css', array( 'bootstrap', 'font-awesome' ), DI_BLOG_VERSION, 'all' );

		// Load woo css file if WooCommerce plugin is active.
		if( class_exists( 'WooCommerce' ) ) {
			wp_enqueue_style( 'di-blog-style-woo', get_template_directory_uri() . '/assets/css/woo.css', array( 'bootstrap', 'font-awesome' ), DI_BLOG_VERSION, 'all' );
		}

		// Load owl.carousel css files if we are on front page and it is enabled in customize.
		if( is_front_page() && get_theme_mod( 'front_slider_endis', '0' ) && get_theme_mod( 'front_slider_tag', '' ) )  {
			// Load owl.carousel css.
			wp_enqueue_style( 'owl-carousel', trailingslashit( get_template_directory_uri() ) . 'assets/css/owl.carousel.css', array( 'di-blog-style-core' ), '2.2.1', 'all' );

			// Load owl.carousel default css.
			wp_enqueue_style( 'owl-theme-default', trailingslashit( get_template_directory_uri() ) . 'assets/css/owl.theme.default.css', array( 'owl-carousel', 'di-blog-style-core' ), '2.2.1', 'all' );
		}


		// Load bootstrap js.
		wp_enqueue_script( 'bootstrap', trailingslashit( get_template_directory_uri() ) . 'assets/js/bootstrap.js', array( 'jquery' ), '4.0.0', true );

		// Load script file.
		wp_enqueue_script( 'di-blog-script', trailingslashit( get_template_directory_uri() ) . 'assets/js/script.js', array( 'jquery' ), DI_BLOG_VERSION, true );

		// Load html5shiv.
		wp_enqueue_script( 'html5shiv', trailingslashit( get_template_directory_uri() ) . 'assets/js/html5shiv.js', array(), '3.7.3', false );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

		// Load respond js.
		wp_enqueue_script( 'respond', trailingslashit( get_template_directory_uri() ) . 'assets/js/respond.js', array(), DI_BLOG_VERSION, false );
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

		// load comment-reply js.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load back to top script file.
		if( get_theme_mod( 'back_to_top', '1' ) == '1' ) {
			wp_enqueue_script( 'di-blog-backtotop', trailingslashit( get_template_directory_uri() ) . 'assets/js/backtotop.js', array( 'jquery' ), DI_BLOG_VERSION, true );
		}

		// Load page load icon script file.
		if( get_theme_mod( 'loading_icon', '1' ) == '1' ) {
			wp_enqueue_script( 'di-blog-loading-icon', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadicon.js', array( 'jquery' ), DI_BLOG_VERSION, true );
		}

		// Load sticky menu script file.
		if( get_theme_mod( 'stickymenu_setting', '0' ) == '1' && ! is_page_template( 'template-landing-page.php' ) ) {
			wp_enqueue_script( 'di-blog-stickymenu', trailingslashit( get_template_directory_uri() ) . 'assets/js/stickymenu.js', array( 'jquery' ), DI_BLOG_VERSION, true );
		}

		// Load owl.carousel js file if we are on front page and it is enabled in customize.
		if( is_front_page() && get_theme_mod( 'front_slider_endis', '0' ) && get_theme_mod( 'front_slider_tag', '' ) )  {
			wp_enqueue_script( 'owl-carousel', trailingslashit( get_template_directory_uri() ) . 'assets/js/owl.carousel.js', array( 'jquery' ), '2.2.1', true );

			wp_enqueue_script( 'di-blog-owl-carousel', trailingslashit( get_template_directory_uri() ) . 'assets/js/owl.carousel.diblog.js', array( 'jquery', 'owl-carousel' ), DI_BLOG_VERSION, true );
		}

		// Load cust masonry js theme code, masonry, imagesloaded IF enabled in customize.
		if ( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid2c' || get_theme_mod( 'blog_list_grid', 'list' ) == 'grid3c' ) {
			wp_enqueue_script( 'di-blog-masonry', trailingslashit( get_template_directory_uri() ) . 'assets/js/masonry.js', array( 'jquery', 'imagesloaded', 'masonry' ), DI_BLOG_VERSION, true );
		}

		// Side bar menu js depends on jquery and if enabled by customizer and not on landing page.
		if ( get_theme_mod( 'sb_menu_onoff', '1' ) == 1 && ! is_page_template( 'template-landing-page.php' ) ) {
			wp_enqueue_script( 'di-blog-sidebarmenu', trailingslashit( get_template_directory_uri() ) . 'assets/js/sidebarmenu.js', array( 'jquery' ), DI_BLOG_VERSION, true );
		}

	}

	/**
	 * [customizer_scripts_and_styles description]
	 * @return [type] [description]
	 */
	public function customizer_scripts_and_styles() {

		wp_enqueue_style( 'di-blog-customize-preview', trailingslashit( get_template_directory_uri() ) . 'assets/css/customizer.css', array( 'customize-preview' ), DI_BLOG_VERSION, 'all' );

		wp_enqueue_script( 'di-blog-customize-preview', trailingslashit( get_template_directory_uri() ) . 'assets/js/customizer.js', array( 'customize-preview' ), DI_BLOG_VERSION, true );

	}
	
	/**
	 * [sidebar_registration description]
	 * @return [type] [description]
	 */
	public function sidebar_registration() {

		register_sidebar( array(
			'name'			=> __( 'Blog Sidebar', 'di-blog' ),
			'id'			=> 'sidebar-1',
			'description'	=> __( 'Widgets for Blog sidebar.', 'di-blog' ),
			'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="right-widget-title">',
			'after_title'	=> '</h3>',
		) );

		register_sidebar( array(
			'name'			=> __( 'Page Sidebar', 'di-blog' ),
			'id'			=> 'sidebar_page',
			'description'	=> __( 'Widgets for Page sidebar.', 'di-blog' ),
			'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="right-widget-title">',
			'after_title'	=> '</h3>',
		) );

		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'			=> __( 'Woocommerce Sidebar', 'di-blog' ),
				'id'			=> 'sidebar_woo',
				'description'	=> __( 'Widgets for Woocommerce Pages (For:- Product Loop, Product Search and Product Single Page). If you are using Full Width Layout in customize, then this sidebar will not display.', 'di-blog' ),
				'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h3 class="right-widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		// Footer widget register base on settings.
		$enordis = absint( get_theme_mod( 'endis_ftr_wdgt', '0' ) );
		$layout = absint( get_theme_mod( 'ftr_wdget_lyot', '3' ) );
		if ( $enordis != 0 ) {
			if ( $layout == 48 || $layout == 84 ) {
				register_sidebar( array(
					'name'			=> __( 'Footer Widget 1', 'di-blog' ),
					'id'			=> 'footer_1',
					'description'	=> __( 'Widgets for footer 1', 'di-blog' ),
					'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h3 class="widgets_footer_title">',
					'after_title'	=> '</h3>',
				) );

				register_sidebar( array(
					'name'			=> __( 'Footer Widget 2', 'di-blog' ),
					'id'			=> 'footer_2',
					'description'	=> __( 'Widgets for footer 2', 'di-blog' ),
					'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h3 class="widgets_footer_title">',
					'after_title'	=> '</h3>',
				) );
			} else {
				for ( $i = 1; $i <= $layout; $i++ ) {
					register_sidebar( array(
						'name'			=> __( 'Footer Widget ', 'di-blog' ) . $i,
						'id'			=> 'footer_' . $i,
						'description'	=> __( 'Widgets for footer ', 'di-blog' ) . $i,
						'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
						'after_widget'	=> '</div>',
						'before_title'	=> '<h3 class="widgets_footer_title">',
						'after_title'	=> '</h3>',
					) );
				}
			}
		}

	}

}
Di_Blog_Engine::get_instance();
