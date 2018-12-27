<?php

/**
* Is mobile
*/

if ( ! function_exists( 'saul_is_mobile' ) ) {
	
	function saul_is_mobile() {
		
		if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		
			$is_mobile = false;
		
		} elseif ( 
		
			strstr ($_SERVER['HTTP_USER_AGENT'], 'iPhone' )
			|| strstr ($_SERVER['HTTP_USER_AGENT'], 'Mobile' )
			|| strstr ($_SERVER['HTTP_USER_AGENT'], 'Android' )
			|| strstr ($_SERVER['HTTP_USER_AGENT'], 'Silk/' )
			|| strstr ($_SERVER['HTTP_USER_AGENT'], 'Kindle' )
			|| strstr ($_SERVER['HTTP_USER_AGENT'], 'BlackBerry' )
			|| strstr ($_SERVER['HTTP_USER_AGENT'], 'Opera Mini' )
			|| strstr ($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi' )) {
				
			$is_mobile = true;
		
		} else {
		
			$is_mobile = false;
		
		}
	 
		return $is_mobile;
		
	}
	
}

/**
* Body classes
*/

if (!function_exists('saul_body_classes_function')) {

	function saul_body_classes_function($classes) {

		global $wp_customize;

		if ( saul_is_mobile() == true ) :
				
			$classes[] = 'saul_mobile_layout';
	
		else:
				
			$classes[] = 'saul_desktop_layout';
	
		endif;
		
		return $classes;
	
	}
	
	add_filter('body_class', 'saul_body_classes_function');

}

/**
* Override Jax Lite functions
*/

if (!function_exists('saul_function_override')) {

	function saul_function_override() {

		remove_action( 'jaxlite_before_content', 'jaxlite_before_content_function', 10, 2 );
		remove_action( 'jaxlite_after_content', 'jaxlite_after_content_function', 10, 2 );
		remove_action( 'jaxlite_logo','jaxlite_logo_function', 10, 2 );
	}
	
	add_action('init','saul_function_override');

}

/**
* Override Jax Lite logo
*/

if (!function_exists('saul_logo_function')) {

	function saul_logo_function( $class = "class=''" ) { ?>
		
        <div id="logo" <?php echo $class;?>>
        
			<?php
			
				if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) {
				
					echo the_custom_logo();
				
				} else {
				
					echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
					
						echo '<span class="sitename">' .esc_attr(get_bloginfo('name')) . '</span>';
						echo '<span class="clear"></span>';
						echo '<span class="sitedescription">'. esc_attr(get_bloginfo('description')) . '</span>';
				
					echo '</a>';
				
				}
				
            ?>		
        
        </div>
                                    
<?php
				
	}
	
	add_action( 'jaxlite_logo', 'saul_logo_function', 10, 2 );
	
}

/**
* Post details layout
*/

if (!function_exists('saul_after_content_function')) {

	function saul_after_content_function( $type = '' ) {

		if ( has_category() ) :

			echo '<span class="entry-category">';
			the_category(' . ');
			echo '</span>';
	
		endif;
		
		if ( !jaxlite_is_single() ) {

			echo '<div class="post-article post-title">';
			do_action('jaxlite_get_title', 'blog' ); 
			echo '</div>';

		} else {

			echo '<div class="post-article post-title">';
			do_action('jaxlite_get_title', 'post' ); 
			echo '</div>';

		}

		echo '<span class="entry-date">' . esc_html__('On ','saul') . get_the_date() . esc_html__(' by ','saul') . get_the_author_posts_link() . '</span>';

		if ( !jaxlite_is_single() ) {

			the_excerpt();

		} else {

			the_content();
			echo '<div class="clear"></div>';
	
		}

	} 
	
	add_action( 'jaxlite_after_content', 'saul_after_content_function', 10, 2 );

}

/**
* Styles and scripts
*/

if (!function_exists('saul_enqueue_scripts')) {

	function saul_enqueue_scripts() {

		wp_enqueue_style( 'saul_style', get_stylesheet_directory_uri() . '/style.css' );
		wp_enqueue_script( 'saul_jquery_functions', get_stylesheet_directory_uri() . '/assets/js/jquery.functions.js' , array('jquery'), FALSE, TRUE );

		if ( get_theme_mod('jaxlite_skin') ) :

			wp_deregister_style ( 'jaxlite ' . get_theme_mod('jaxlite_skin') );
			wp_enqueue_style( 'saul_' . get_theme_mod('jaxlite_skin') , get_stylesheet_directory_uri() . '/skins/' . get_theme_mod('jaxlite_skin') . '.css' ); 

		else:
		
			wp_enqueue_style( 'saul_turquoise', get_stylesheet_directory_uri() . '/skins/turquoise.css' ); 

		endif;

		
		$fonts_args = array(
			'family' =>	str_replace('|', '%7C','Mukta+Vaani:300,300i,400,400i,500,500i,600,600i,700,700i|Lato'),
			'subset' =>	'latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic'
		);

		wp_enqueue_style( 'saul_google_fonts', add_query_arg ($fonts_args, "https://fonts.googleapis.com/css" ), array(), null);

		$saulLocalize = array(
			'readMore' => esc_html__('Type here to search', 'saul')
		);
				
		wp_localize_script( 'saul_jquery_functions', 'saulLocalize', $saulLocalize );

	}
	
	add_action( 'wp_enqueue_scripts', 'saul_enqueue_scripts', 99 );

}

/**
* Customize section
*/

if (!function_exists('saul_customize_register')) {

	function saul_customize_register( $wp_customize ) {

		$wp_customize->remove_section( 'header_section');
		$wp_customize->remove_control( 'jaxlite_custom_logo');
		$wp_customize->remove_control( 'jaxlite_header_padding');
		$wp_customize->remove_control( 'jaxlite_header_textcolor_hover');

		$wp_customize->add_setting( 'jane_header_bottom_padding', array(
			'default' => '100px',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'jane_header_bottom_padding' , array(

			'priority' => 10,
			'type' => 'text',
			'section' => 'header_image',
			'label' => esc_html__('Header bottom padding', 'saul'),
			'description' => esc_html__('Set the bottom padding for the header', 'saul'),
												
		));

		$wp_customize->add_setting( 'jane_menu_bottom_margin', array(
			'default' => '50px',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'jane_menu_bottom_margin' , array(
									
			'priority' => 11,
			'type' => 'text',
			'section' => 'header_image',
			'label' => esc_html__('Menu bottom margin', 'saul'),
			'description' => esc_html__('Set the bottom margin for the main menu', 'saul'),
												
		));

	}
	
	add_action( 'customize_register', 'saul_customize_register', 11 );

}

/**
* Custom css
*/

if (!function_exists('saul_css_custom')) {
	
	function saul_css_custom() { 
	
		echo '<style type="text/css">';
	
		if ( get_theme_mod('jane_header_bottom_padding'))
			echo "body.saul_desktop_layout #header { padding:0 50px ". esc_html(get_theme_mod('jane_header_bottom_padding'))." 50px ; }"; 
	
		if ( get_theme_mod('jane_menu_bottom_margin'))
			echo "body.saul_desktop_layout #header .saul-menu { margin-bottom: ". esc_html(get_theme_mod('jane_menu_bottom_margin'))."; }"; 
	
		if ( strstr(get_theme_mod('jaxlite_skin'), 'white' ) ) :
			
			echo "body.saul_desktop_layout #header .saul-menu ul ul { background:#fff }"; 
			echo "body.saul_desktop_layout #header .saul-menu ul ul li a { color:#616161; }"; 
		
		endif;
	
		echo '</style>';
		
	}
	
	add_action('wp_head', 'saul_css_custom', 999999);

}

/**
* Add widget class
*/

if (!function_exists('saul_load_widgets')) {

	function saul_load_widgets() {

		unregister_sidebar('footer-sidebar-area');
		
		register_sidebar(array(

			'name' => esc_html__('Footer Sidebar', 'saul'),
			'id'   => 'footer-sidebar-area',
			'description'   => esc_html__('This sidebar will be shown at the end of your site.', 'saul'),
			'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-4 widget-box %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-container"><h4 class="title">',
			'after_title'   => '</h4></div>'
		
		));

	}

	add_action( 'widgets_init', 'saul_load_widgets', 9999 );

}

/**
* Replace default values
*/

if (!function_exists('saul_theme_setup')) {

	function saul_theme_setup() {

		load_child_theme_textdomain( 'saul', get_stylesheet_directory() . '/languages' );
		
		if ( !get_theme_mod('jaxlite_animated_titles') )
			set_theme_mod( 'jaxlite_animated_titles', 'on' );

		
		if ( !get_theme_mod('jaxlite_readmore_button') )
			set_theme_mod( 'jaxlite_readmore_button', 'on' );

		add_theme_support( 'custom-logo');
		add_theme_support( 'custom-header', array( 
			'default-image' => get_stylesheet_directory_uri() . '/assets/images/header-image.jpg',
		));

		register_default_headers( array(
			'header' => array(
				'url' => get_stylesheet_directory_uri() . '/assets/images/header-image.jpg',
				'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/header-image.jpg',
				'description' => esc_html__( 'Default', 'saul' )
			)
		));

	}

	add_action( 'after_setup_theme', 'saul_theme_setup');

}

?>