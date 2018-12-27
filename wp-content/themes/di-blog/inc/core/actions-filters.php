<?php

/**
 * Admin Info bar.
 */

function di_blog_admin_notice() {
	global $current_user ;
	$user_id = $current_user->ID;
	
	/* Check that the user hasn't already clicked to ignore the message */
	if( ! get_user_meta( $user_id, 'di_blog_ignore_notice' ) ) {
		echo '<div class="updated"><p>';
		
		printf( __( 'Thank you for activating Di Blog Theme. Let start from <a target="_blank" href="%1$s">Video Tutorials</a> | <a target="_blank" href="%2$s">Documentation</a> | <a target="_blank" href="%3$s">Visit Demo</a> | <a target="_blank" href="%4$s">Customize Now</a> | <a href="%5$s">Hide it</a>', 'di-blog' ), 'https://www.youtube.com/watch?v=8rhnQTo0QyM&list=PLi1mp3OyXn1ZLtIxS4UWyoA55af198lch', 'https://dithemes.com/di-blog-free-wordpress-theme-documentation/', 'http://demo.dithemes.com/di-blog/', esc_url( get_admin_url() . 'customize.php' ) , esc_url( add_query_arg( 'di_blog_notics_ignore', '0' ) ) );
		
		echo "</p></div>";
	}
}
add_action( 'admin_notices', 'di_blog_admin_notice' );

function di_blog_handle_notic() {
	global $current_user;
	$user_id = $current_user->ID;
	if( isset( $_GET['di_blog_notics_ignore']) && '0' == $_GET['di_blog_notics_ignore'] ) {
		add_user_meta( $user_id, 'di_blog_ignore_notice', 'true', true );
	}
}
add_action( 'admin_init', 'di_blog_handle_notic' );

function di_blog_delete_user_meta_ignore_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	if( get_user_meta( $user_id, 'di_blog_ignore_notice' ) ) {
		delete_user_meta( $user_id, 'di_blog_ignore_notice' );
	}
}
add_action('switch_theme', 'di_blog_delete_user_meta_ignore_notice');

/**
 * Admin Info bar END.
 */

if( ! is_admin() ) {

	// Custom excerpt length.
	function di_blog_custom_excerpt_length( $length ) {
		return absint( get_theme_mod( 'excerpt_length', '40' ) );
	}
	add_filter( 'excerpt_length', 'di_blog_custom_excerpt_length', 999, 1 );


	// Custom excerpt last ...... replace.
	function di_blog_excerpt_more( $more ) {
		global $post;
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '"> ' . __( 'Read more', 'di-blog' ) . '&#8230;</a>';
	}
	add_filter( 'excerpt_more', 'di_blog_excerpt_more', 1001, 1 );
	
}

// Add class="table table-bordered" to default calendar.
function di_blog_calendar_modify( $html ) {
	return str_replace( 'id="wp-calendar"', 'id="wp-calendar" class="table table-bordered"', $html );
}
add_filter( 'get_calendar', 'di_blog_calendar_modify', 10, 1 );

// Add code in head.
function di_blog_the_head_contain() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php } ?>
	
	<?php
}
add_action( 'di_blog_the_head', 'di_blog_the_head_contain' );

// Add overflowhide class to body if page preloader enabled.
if( get_theme_mod( 'loading_icon', '0' ) == 1 ) {
	add_filter( 'body_class', function( $classes ) {
		return array_merge( $classes, array( 'overflowhide' ) );
	} );
}

// Display blog name in header, also function di_blog_header_file_blogname_content used for partial refresh.
add_action( 'di_blog_header_file_blogname', 'di_blog_header_file_blogname_content' );
function di_blog_header_file_blogname_content() {
	echo "<a href='" . esc_url( home_url( '/' ) ) . "' rel='home' >";
	echo esc_attr( get_bloginfo( 'name' ) );
	echo "</a>";
}

// Display blog description in header, also function di_blog_header_file_blogdescription_content used for partial refresh.
add_action( 'di_blog_header_file_blogdescription', 'di_blog_header_file_blogdescription_content' );
function di_blog_header_file_blogdescription_content() {
	echo esc_attr( get_bloginfo( 'description' ) );
}


add_action( 'di_blog_footer_copyright_right_setting_front', 'di_blog_footer_copyright_right_setting_front_contnt' );
function di_blog_footer_copyright_right_setting_front_contnt() {
	echo '<p>' . __( 'WordPress', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/di-blog-free-wordpress-theme/"><span class="fa fa-thumbs-o-up"></span> ' . __( 'Di Blog', 'di-blog' ) . '</a> ' . __( 'Theme', 'di-blog' ) . '</p>';
}

function di_blog_color_options_free_content_field() {
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_clroptions_freecon',
		'label'       => esc_attr__( 'More Colors', 'di-blog' ),
		'section'     => 'color_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'More color options are available in', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/product/di-blog-pro-wordpress-theme/">' . esc_attr__( 'Di Blog Pro', 'di-blog' ) . '</a>.</div>',
	) );
}
add_action( 'di_blog_color_options', 'di_blog_color_options_free_content_field' );

function di_blog_own_slider_settings_free_content_field() {
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_own_slider_settings_freecon',
		'label'       => esc_attr__( 'Color Options', 'di-blog' ),
		'section'     => 'front_slider_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'Color options are available in', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/product/di-blog-pro-wordpress-theme/">' . esc_attr__( 'Di Blog Pro', 'di-blog' ) . '</a>.</div>',
		'active_callback'  => array(
			array(
				'setting'  => 'front_slider_endis',
				'operator' => '==',
				'value'    => '1',
			),
			array(
				'setting'  => 'front_slider_tag',
				'operator' => '!=',
				'value'    => '',
			),
		),
	) );
}
add_action( 'di_blog_own_slider_settings', 'di_blog_own_slider_settings_free_content_field' );

function di_blog_footer_widget_options_free_content_field() {
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_footer_widgets_options_freecon',
		'label'       => esc_attr__( 'Color Options', 'di-blog' ),
		'section'     => 'ftr_wdgt_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'Color options are available in', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/product/di-blog-pro-wordpress-theme/">' . esc_attr__( 'Di Blog Pro', 'di-blog' ) . '</a>.</div>',
		'active_callback'  => array(
			array(
				'setting'  => 'endis_ftr_wdgt',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );
}
add_action( 'di_blog_footer_widget_options', 'di_blog_footer_widget_options_free_content_field' );

function di_blog_sidebar_menu_options_free_content_field() {
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_sidebar_menu_options_freecon',
		'label'       => esc_attr__( 'Color Options', 'di-blog' ),
		'section'     => 'sidebarmenu_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'Color options are available in', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/product/di-blog-pro-wordpress-theme/">' . esc_attr__( 'Di Blog Pro', 'di-blog' ) . '</a>.</div>',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_menu_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );
}
add_action( 'di_blog_sidebar_menu_options', 'di_blog_sidebar_menu_options_free_content_field' );

function di_blog_footer_copyright_free_content_field() {
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_footer_copy_options_freecon',
		'label'       => esc_attr__( 'Footer Right', 'di-blog' ),
		'section'     => 'footer_copy_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'Footer Right Option and Color Options are available in', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/product/di-blog-pro-wordpress-theme/">' . esc_attr__( 'Di Blog Pro', 'di-blog' ) . '</a>.</div>',
	) );
}
add_action( 'di_blog_footer_copyright', 'di_blog_footer_copyright_free_content_field' );

function di_blog_cutmzr_theme_info_free_content_field() {
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_theme_info_sprt_freecon',
		'label'       => esc_attr__( 'Di Blog Support', 'di-blog' ),
		'section'     => 'theme_info',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'If you want our support, Please', 'di-blog' ) . ' <a target="_blank" href="https://wordpress.org/support/theme/di-blog">' . esc_attr__( 'Create a Support Topic', 'di-blog' ) . '</a>.</div>',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_theme_info_pro_freecon',
		'label'       => esc_attr__( 'Di Blog Pro', 'di-blog' ),
		'section'     => 'theme_info',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . __( 'Premium Features:<br />- All Color Options<br />- Option to Update Footer Right Credit<br />- Widget Creation and Selection<br />- Advance Header Image<br />- Slider in Header<br />- Premium Support<br />', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/product/di-blog-pro-wordpress-theme/">' . esc_attr__( 'Get Di Blog Pro', 'di-blog' ) . '</a></div>',
	) );
}
add_action( 'di_blog_cutmzr_theme_info', 'di_blog_cutmzr_theme_info_free_content_field' );


add_action( 'di_blog_page_sidebar_file', 'di_blog_page_sidebar_file_clbk' );
function di_blog_page_sidebar_file_clbk() {
	if( is_active_sidebar( 'sidebar_page' ) ){
		dynamic_sidebar( 'sidebar_page' );
	}
}

add_action( 'di_blog_post_sidebar_file', 'di_blog_post_sidebar_file_clbk' );
function di_blog_post_sidebar_file_clbk() {
	if( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar( 'sidebar-1' );
	}
}

add_action( 'di_blog_hdrimg_file', 'di_blog_hdrimg_file_clbk' );
function di_blog_hdrimg_file_clbk() {
	// Do not load, if disabled using meta box option + we are not on posts page.
	if( get_the_ID() && ! is_home() ) {
		if( get_post_meta( get_the_ID(), '_di_blog_hide_hdrimg', true ) == '1' ) {
			return;
		}
	}

	if( has_header_image() ) { ?>
	<div class="container-fluid hdrimg">
		<div class="row">
			<div class="alignc wd100">
				<?php the_custom_header_markup(); ?>
			</div>
		</div>
	</div>
	<?php
	}
}

// Tag cloud widget css font size fix.
add_filter( 'widget_tag_cloud_args', 'di_blog_tag_cloud_fontsize_fix', 10, 1 );
function di_blog_tag_cloud_fontsize_fix( $args ) {
	$args['largest']  = 11;
	$args['smallest'] = 11;
	$args['unit']     = 'px';
	return $args;
}

// Woo tag cloud widget css font size fix.
if( class_exists( 'WooCommerce' ) ) {
	add_filter( 'woocommerce_product_tag_cloud_widget_args', 'di_blog_woo_tag_cloud_fontsize_fix', 10, 1 );
	function di_blog_woo_tag_cloud_fontsize_fix( $args ) {
		$args['largest']  = 11;
		$args['smallest'] = 11;
		$args['unit']     = 'px';
		return $args;
	}
}
