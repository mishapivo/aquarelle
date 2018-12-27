<?php
/**
 * mega-ui Theme Customizer.
 *
 * @package mega-ui
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mega_ui_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//front page panel
	$wp_customize->add_panel( 'mega_ui_frontpage_panel', array(
	    'priority' => 20,
	    'title' => __( 'Front Page Option', 'mega-ui' ),
	    'description' => __( 'Manage Theme\'s front page.', 'mega-ui' ),
	) );
	
	//home banner
	$wp_customize->add_section( 'mega_ui_banner_section', array(
	    'priority' => 20,
	    'title' => __( 'Banner', 'mega-ui' ),
	    'description' => __( 'Manage theme banner and it\'s features', 'mega-ui' ),
	    'panel' => 'mega_ui_frontpage_panel',
	) );
	
	$wp_customize->add_setting('mega_ui_display_banner', array(
		'default'        => 1,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_banner', array(
		'settings' => 'mega_ui_display_banner',
		'label'    => __('Show theme banner', 'mega-ui'),
		'section'  => 'mega_ui_banner_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	
	$wp_customize->add_setting( 'mega_ui_banner_post', array (
		'default'     => '',
		'sanitize_callback' => 'mega_ui_sanitize_integer',
	) );

	$wp_customize->add_control(
		new WP_Customize_Post_Control(
			$wp_customize,
			'mega_ui_banner_post',
			array(
				'label'    => __('Select Posts', 'mega-ui'),
				'settings' => 'mega_ui_banner_post',
				'section'  => 'mega_ui_banner_section',
				'priority'	=> 24
			)
		)
	);
	
	//service section
	$wp_customize->add_section( 'mega_ui_service_section', array(
	    'priority' => 20,
	    'title' => __( 'Services', 'mega-ui' ),
	    'description' => __( 'Manage theme Services.', 'mega-ui' ),
	    'panel' => 'mega_ui_frontpage_panel',
	) );
	
	$wp_customize->add_setting('mega_ui_display_service', array(
		'default'        => 1,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_service', array(
		'settings' => 'mega_ui_display_service',
		'label'    => __('Show theme Services', 'mega-ui'),
		'section'  => 'mega_ui_service_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('mega_ui_service_title', array(
		'default' => 'Our Services',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_service_title', array(
		'settings' => 'mega_ui_service_title',
		'label' => __('Service Section Heading','mega-ui'),
		'section' => 'mega_ui_service_section',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting( 'mega_ui_service_pages', array (
		'default'     => __('Our Services', 'mega-ui'),
		'sanitize_callback' => 'mega_ui_sanitize_post_control',
	) );

	$wp_customize->add_control(
		new WP_Customize_Page_Control(
			$wp_customize,
			'mega_ui_service_pages',
			array(
				'label'    => __('Select Pages', 'mega-ui'),
				'settings' => 'mega_ui_service_pages',
				'section'  => 'mega_ui_service_section',
				'priority'	=> 24
			)
		)
	);

	//blog section
	$wp_customize->add_section( 'mega_ui_blog_section', array(
	    'priority' => 20,
	    'title' => __( 'Latest Post', 'mega-ui' ),
	    'description' => __( 'Manage front-page Blog Section.', 'mega-ui' ),
	    'panel' => 'mega_ui_frontpage_panel',
	) );

	$wp_customize->add_setting('mega_ui_blog_title', array(
		'default' => 'Latest Posts',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_blog_title', array(
		'settings' => 'mega_ui_blog_title',
		'label' => __('Blog Section Heading','mega-ui'),
		'section' => 'mega_ui_blog_section',
		'priority'	=> 24
	));
	
	//home cta
	$wp_customize->add_section( 'mega_ui_cta_section', array(
	    'priority' => 20,
	    'title' => __( 'Call To Action', 'mega-ui' ),
	    'description' => __( 'Please add contact page.', 'mega-ui' ),
	    'panel' => 'mega_ui_frontpage_panel',
	) );
	
	$wp_customize->add_setting('mega_ui_display_cta', array(
		'default'        => 0,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_cta', array(
		'settings' => 'mega_ui_display_cta',
		'label'    => __('Show Call To Action', 'mega-ui'),
		'section'  => 'mega_ui_cta_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	
	$wp_customize->add_setting( 'mega_ui_cta_page', array (
		'default'     => '',
		'sanitize_callback' => 'mega_ui_sanitize_integer',
	) );

	$wp_customize->add_control(
		new WP_Customize_Single_Page_Control(
			$wp_customize,
			'mega_ui_cta_page',
			array(
				'label'    => __('Select Page', 'mega-ui'),
				'settings' => 'mega_ui_cta_page',
				'section'  => 'mega_ui_cta_section',
				'priority'	=> 24
			)
		)
	);

	$wp_customize->add_setting('mega_ui_cta_btn', array(
		'default' => 'Get In Touch',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_cta_btn', array(
		'settings' => 'mega_ui_cta_btn',
		'label' => __('Call To Action Botton text','mega-ui'),
		'section' => 'mega_ui_cta_section',
		'priority'	=> 24
	));

	//Header settings
	$wp_customize->add_section( 'mega_ui_header_section' , array(
		'title'       => __( 'Header', 'mega-ui' ),
		'priority'    => 20,
		'description' => __( 'Header settings ', 'mega-ui' ),
	) );
	
	$wp_customize->add_setting('mega_ui_display_topbar_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_topbar_setting', array(
		'settings' => 'mega_ui_display_topbar_setting',
		'label'    => __('Display TopBar', 'mega-ui'),
		'section'  => 'mega_ui_header_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('mega_ui_mail_address', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_mail_address', array(
		'settings' => 'mega_ui_mail_address',
		'label' => __('Email:','mega-ui'),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_topbar_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('mega_ui_contact_number', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_contact_number', array(
		'settings' => 'mega_ui_contact_number',
		'label' => __('Contact Number:','mega-ui'),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_topbar_active_callback',
		'priority'	=> 24
	));
		
	$wp_customize->add_setting('mega_ui_display_social_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_social_setting', array(
		'settings' => 'mega_ui_display_social_setting',
		'label'    => __('Display Social Icons', 'mega-ui'),
		'section'  => 'mega_ui_header_section',
		'type'     => 'checkbox',
		'active_callback' =>'mega_ui_topbar_active_callback',
		'priority'	=> 24
	));
	for($i=1; $i<=5; $i++){
	$wp_customize->add_setting('mega_ui_social_icon_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_social_icon_'.$i, array(
		'settings' => 'mega_ui_social_icon_'.$i,
		'label' => __('Header Social Icon ','mega-ui').$i,
		'description' => __( 'Please add <strong>FontAwesome</strong> Class of respective social. Like  <strong>fa fa-facebook</strong>', 'mega-ui' ),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_social_active_callback',
		'priority'	=> 24
	));
	
	$wp_customize->add_setting('mega_ui_social_link_'.$i, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('mega_ui_social_link_'.$i, array(
		'settings' => 'mega_ui_social_link_'.$i,
		'label' => __('Social Icon Link ','mega-ui').$i,
		'description' => __( 'Please add Social Icon Link', 'mega-ui' ),
		'section' => 'mega_ui_header_section',
		'active_callback' =>'mega_ui_social_active_callback',
		'priority'	=> 24
	));
	}
	
	//footer
	$wp_customize->add_section( 'mega_ui_footer_section' , array(
		'title'       => __( 'Footer', 'mega-ui' ),
		'priority'    => 25,
		'description' => __( 'Footer Option', 'mega-ui' ),
	) );
	
	$wp_customize->add_setting('mega_ui_display_footer_menu', array(
		'default'        => 0,
		'sanitize_callback' => 'mega_ui_sanitize_checkbox',
	));
	$wp_customize->add_control('mega_ui_display_footer_menu', array(
		'settings' => 'mega_ui_display_footer_menu',
		'label'    => __('Display Footer Manu', 'mega-ui'),
		'section'  => 'mega_ui_footer_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));

	$wp_customize->add_setting('mega_ui_footer_credit', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_footer_credit', array(
		'settings' => 'mega_ui_footer_credit',
		'label' => __('Footer Credit Text:','mega-ui'),
		'section' => 'mega_ui_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('mega_ui_footer_company', array(
		'default' => '',
		'sanitize_callback' => 'mega_ui_sanitize_text_field',
	));

	$wp_customize->add_control('mega_ui_footer_company', array(
		'settings' => 'mega_ui_footer_company',
		'label' => __('Footer Company Name:','mega-ui'),
		'section' => 'mega_ui_footer_section',
		'priority'	=> 30
	));
	
	$wp_customize->add_setting('mega_ui_footer_link', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('mega_ui_footer_link', array(
		'settings' => 'mega_ui_footer_link',
		'label' => __('Footer Company Link:','mega-ui'),
		'section' => 'mega_ui_footer_section',
		'priority'	=> 30
	));
}
add_action( 'customize_register', 'mega_ui_customize_register' );


function mega_ui_topbar_active_callback() {
	if ( get_theme_mod( 'mega_ui_display_topbar_setting', 0 ) ) {
		return true;
	}
	return false;
}
function mega_ui_social_active_callback() {
	if ( get_theme_mod( 'mega_ui_display_social_setting', 0 ) ) {
		return true;
	}
	return false;
}
/**
 * 1Sanitize checkbox
 */

if (!function_exists( 'mega_ui_sanitize_checkbox' ) ) :
	function mega_ui_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

/**
 * Sanitize multiple input
 */
function mega_ui_sanitize_post_control( $input ) {
	if(is_array($input)){
		return $input;
	}else{
		$input= array();
		return $input;
	}
    
}

function mega_ui_sanitize_text_field( $str ) {

	return sanitize_text_field( $str );

}

function mega_ui_sanitize_integer( $input ) {
    return (int)($input);
}
//custom control
if( class_exists( 'WP_Customize_Control' ) ):
	class WP_Customize_Post_Control extends WP_Customize_Control {
		public function render_content() {
		$mega_ui_post_list= array('post_type'=>'post', 'posts_per_page'=>-1);
		$mega_ui_posts= new WP_Query($mega_ui_post_list);
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> style="height: 100%;">
					<?php if($mega_ui_posts->have_posts()){
					while($mega_ui_posts->have_posts()){
					$mega_ui_posts->the_post();
					if(has_post_thumbnail()):
					?>
					<option value="<?php the_ID(); ?>" <?php if($this->value()== get_the_ID()) echo 'selected'; ?>><?php the_title(); ?></option>
					<?php endif;
					}
					} wp_reset_postdata(); ?>
				</select>
			</label>
		<?php
		}
	}
endif;

if( class_exists( 'WP_Customize_Control' ) ):
	class WP_Customize_Page_Control extends WP_Customize_Control {
		public function render_content() {
		$mega_ui_post_list= array('post_type'=>'page', 'posts_per_page'=>-1);
		$mega_ui_posts= new WP_Query($mega_ui_post_list);
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
					<?php if($mega_ui_posts->have_posts()){
					while($mega_ui_posts->have_posts()){
					$mega_ui_posts->the_post();
					?>
					<option value="<?php the_ID(); ?>" <?php if(is_array($this->value())):foreach($this->value() as $post_id){ if($post_id== get_the_ID()) echo 'selected'; } endif; ?>><?php the_title(); ?></option>
					<?php }
					} wp_reset_postdata(); ?>
				</select>
			</label>
		<?php
		}
	}
endif;

if( class_exists( 'WP_Customize_Control' ) ):
	class WP_Customize_Single_Page_Control extends WP_Customize_Control {
		public function render_content() {
		$mega_ui_post_list= array('post_type'=>'page', 'posts_per_page'=>-1);
		$mega_ui_posts= new WP_Query($mega_ui_post_list);
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> style="height: 100%;">
					<?php if($mega_ui_posts->have_posts()){
					while($mega_ui_posts->have_posts()){
					$mega_ui_posts->the_post(); ?>
					<option value="<?php the_ID(); ?>" <?php if($this->value()== get_the_ID()) echo 'selected'; ?>><?php the_title(); ?></option>
					<?php }
					} wp_reset_postdata(); ?>
				</select>
			</label>
		<?php
		}
	}
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mega_ui_customize_preview_js() {
	wp_enqueue_script( 'mega_ui_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mega_ui_customize_preview_js' );