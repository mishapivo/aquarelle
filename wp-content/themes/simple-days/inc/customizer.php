<?php
defined( 'ABSPATH' ) || exit;

class Simple_Days_Customize {

  public static function register ( $wp_customize ) {
    //delete header textcolor control
    $wp_customize->remove_control("header_textcolor");
    $wp_customize->remove_control("background_color");
    $wp_customize->remove_control("display_header_text");

    $wp_customize->register_control_type( 'Simple_Days_Image_Select_Control' );

    $wp_customize->get_control( 'header_image' )->section = 'simple_days_header_image';
    $wp_customize->get_control( 'custom_logo' )->section = 'simple_days_header_logo_image';
    $wp_customize->get_section('title_tagline')->panel = 'simple_days_site_setting';
    $wp_customize->get_section('background_image')->panel = 'simple_days_site_setting';
    $wp_customize->get_section('static_front_page')->panel = 'simple_days_site_setting';

    get_template_part( 'inc/social', 'list' );
    $social = get_query_var('social_list');


    $heading_border_style = array(
      'none' => esc_html__( 'none', 'simple-days' ),
      'solid' => esc_html__( 'Solid', 'simple-days' ),
      'double' => esc_html__( 'Double', 'simple-days' ),
      'groove' => esc_html__( 'Groove', 'simple-days' ),
      'ridge' => esc_html__( 'Ridge', 'simple-days' ),
      'inset' => esc_html__( 'Inset', 'simple-days' ),
      'outset' => esc_html__( 'Outset', 'simple-days' ),
      'dashed' => esc_html__( 'Dashed', 'simple-days' ),
      'dotted' => esc_html__( 'Dotted', 'simple-days' ),
    );
    $border_angle = array(
      'top' => esc_html_x('top','post_heading','simple-days') ,
      'right' => esc_html_x('right','post_heading','simple-days') ,
      'bottom' => esc_html_x('bottom','post_heading','simple-days') ,
      'left' => esc_html_x('left','post_heading','simple-days'),
    );

    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/sanitize.php';

    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/custom_font.php';
    
    require_once SIMPLE_DAYS_THEME_DIR . 'template-parts/post-sort_order.php';

    
    $wp_customize->add_panel( 'simple_days_site_setting', array(
      'priority'    => 0,
      'title'       => esc_html__('Site settings', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-site.php';
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-google_fonts.php';

    $wp_customize->add_panel('simple_days_custom_colors', array(
      'title'         => esc_html__('Colors', 'simple-days'),
      'priority'      => 0
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-colors.php';

    
    $wp_customize->add_panel( 'simple_days_header_setting', array(
      'priority'    => 0,
      'title'       => esc_html__('Header', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-header.php';
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-alert_box.php';

    
    $wp_customize->add_panel( 'simple_days_footer_setting', array(
      'priority'    => 0,
      'title'       => esc_html__('Footer', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-footer.php';


    
    $wp_customize->add_section('simple_days_sidebar_setting',array(
      'title'       => esc_html__('Sidebar', 'simple-days'),
      'priority'   => 0,
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-sidebar.php';



    
    $wp_customize->add_panel( 'simple_days_index_setting', array(
      'priority'    => 1,
      'title'       => esc_html__('Index', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-index.php';

    
    $wp_customize->add_panel( 'simple_days_posts_setting', array(
      'priority'    => 1,
      'title'       => esc_html__('Posts', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-posts.php';


    
    $wp_customize->add_panel( 'simple_days_pages_setting', array(
      'priority'    => 1,
      'title'       => esc_html__('Pages', 'simple-days'),
    ));
    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-pages.php';

    
    $wp_customize->add_panel( 'simple_days_yahman_plugin_setting', array(
      'priority'    => 2,
      'title'       => esc_html__('Yahman Plugin', 'simple-days'),
    ));




    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-menu_icon.php';


    require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/setting-widget_title.php';







































    
    $wp_customize->add_section('simple_days_pageview_setting',array(
      'title' => esc_html__('Pageview', 'simple-days'),
      'panel' => 'simple_days_yahman_plugin_setting',
    ));


    $wp_customize->add_setting('pageview',array('sanitize_callback' => 'absint',));
    $wp_customize->add_control('pageview',array(
      'section' => 'simple_days_pageview_setting',
      'type' => 'hidden'
    ));
    $wp_customize->selective_refresh->add_partial( 'pageview', array(
     'selector' => '.page_view',
   ));


    $wp_customize->add_setting( 'simple_days_pageview',array(
      'default'    => 'none',
      'sanitize_callback' => 'simple_days_sanitize_select',
    ));
    $wp_customize->add_control( 'simple_days_pageview',array(
      'label'   => esc_html__( 'Display page view at the each post.', 'simple-days'),
      'section' => 'simple_days_pageview_setting',
      'type' => 'select',
      'choices' => array(
       'none' =>  esc_html__( 'Hide', 'simple-days' ),
       'all' => esc_html__('Page View', 'simple-days'),
       'yearly' => esc_html__('Yearly Page View', 'simple-days'),
       'monthly' => esc_html__('Monthly Page View', 'simple-days'),
       'weekly' => esc_html__('Weekly Page View', 'simple-days'),
       'daily' => esc_html__('Daily Page View', 'simple-days'),
     ),
    ));

    $wp_customize->add_setting( 'simple_days_pageview_icon',array(
      'default'    => 'fa-signal',
      'sanitize_callback' => 'wp_strip_all_tags',
    ));
    $wp_customize->add_control( 'simple_days_pageview_icon',array(
      'label'   => esc_html__( 'Page view icon', 'simple-days'),
      'section' => 'simple_days_pageview_setting',
      'type' => 'select',
      'choices' => array(
       '&nbsp;' => esc_html('&nbsp;'),
       'fa-signal' => '&#xf012; fa-signal',
       'fa-area-chart' => '&#xf1fe; fa-area-chart',
       'fa-line-chart' => '&#xf201; fa-line-chart',
       'fa-heart-o' => '&#xf08a; fa-heart-o',
       'fa-heart' => '&#xf004; fa-heart',
       'fa-star-o' => '&#xf006; fa-star-o',
       'fa-star' => '&#xf005; fa-star',
       'fa-history' => '&#xf1da; fa-history',
       'fa-history' => '&#xf1da; fa-history',
       'fa-home' => '&#xf015; fa-home',
       'fa-bolt' => '&#xf0e7; fa-bolt',
       'fa-lightbulb-o' => '&#xf0eb; fa-lightbulb-o',
       'fa-smile-o' => '&#xf118; fa-smile-o',
       'fa-rocket' => '&#xf135; fa-rocket',
       'fa-location-arrow' => '&#xf124; fa-location-arrow',
       'fa-info-circle' => '&#xf05a; fa-info-circle',
       'fa-info' => '&#xf129; fa-info',
       'fa-paw' => '&#xf1b0; fa-paw',
       'fa-bomb' => '&#xf1e2; fa-bomb',
       'fa-birthday-cake' => '&#xf1fd; fa-birthday-cake',
       'fa-fort-awesome' => '&#xf286; fa-fort-awesome',
       'fa-gamepad' => '&#xf11b; fa-gamepad',
     ),
    ));

    $wp_customize->add_setting( 'simple_days_pageview_position', array(
      'default'           => 'right',
      'sanitize_callback' => 'simple_days_sanitize_radio',
      'transport'=>'postMessage',
    ));
    $wp_customize->add_control( 'simple_days_pageview_position', array(
      'label'    => esc_html__( 'Post view display position', 'simple-days' ),
      'section'  => 'simple_days_pageview_setting',
      'type'     => 'radio',
      'choices'  => array(
        'left' => esc_html__( 'Left', 'simple-days' ),
        'center' => esc_html__( 'Center', 'simple-days' ),
        'right' => esc_html__( 'Right', 'simple-days' ),
      ),
    ));





    $wp_customize->add_setting( 'simple_days_pageview_logout',array(
      'default'    => false,
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'simple_days_pageview_logout',array(
      'label'   => esc_html__( 'Enable', 'simple-days'),
      'description' => esc_html__('Display page view to logout user.', 'simple-days'),
      'section' => 'simple_days_pageview_setting',
      'type' => 'checkbox',
    ));



  // Add Settings and Controls for Option.
    $wp_customize->add_section('simple_days_yahman_addons',array(
      'title' => esc_html__('YAHMAN Add-ons', 'simple-days'),
      'panel' => 'simple_days_yahman_plugin_setting',
    ));


    $wp_customize->add_setting( 'simple_days_page_install_yahman_addons', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_install_yahman_addons', array(
      'section' => 'simple_days_yahman_addons',
      
      'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'YAHMAN Add-ons', 'simple-days')),
      'plugin' => array(
       'name' => esc_html__('YAHMAN Add-ons', 'simple-days'),
       'dir' => 'yahman-add-ons',
       'filename' => 'yahman-add-ons.php',
     ),
    )));

    
  // Add Settings and Controls for Option.
    $wp_customize->add_section('simple_days_pwcat',array(
      'title' => esc_html__('Pages with category and tag', 'simple-days'),
      'panel' => 'simple_days_yahman_plugin_setting',
    ));


    $wp_customize->add_setting( 'simple_days_page_install_pwcat_2', array(
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_install_pwcat_2', array(
      'section' => 'simple_days_pwcat',
      
      'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'Pages with category and tag', 'simple-days')),
      'plugin' => array(
       'name' => esc_html__('Pages with category and tag', 'simple-days'),
       'dir' => 'pages-with-category-and-tag',
       'filename' => 'pages-with-category-and-tag.php',
     ),
    )));





  // Add Settings and Controls for Option.
$wp_customize->add_section('simple_days_word_balloon',array(
  'title' => esc_html__('Word Balloon', 'simple-days'),
  'panel' => 'simple_days_yahman_plugin_setting',
));

/*
  $wp_customize->add_setting( 'simple_days_page_word_balloon_install', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_html_text_Custom_Content( $wp_customize, 'simple_days_page_word_balloon_install', array(
    'section' => 'simple_days_word_balloon',
    'label' => esc_html__( 'Install Word Balloon Plugins', 'simple-days' ),
    'content' => '<a href="'. esc_url( admin_url( 'plugin-install.php?tab=search&type=author&s=yahman' ) ).'" class="button button-secondary">'.esc_html__( 'Install Plugins', 'simple-days' ).'</a>',
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
  )));
*/

  $wp_customize->add_setting( 'simple_days_page_word_balloon_install', array(
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control( new Simple_Days_plugin_install_Custom_Content( $wp_customize, 'simple_days_page_word_balloon_install', array(
    'section' => 'simple_days_word_balloon',
    
    'label' => sprintf(esc_html__('Install Plugin [ %s ]', 'simple-days'), esc_html__( 'Word Balloon', 'simple-days')),
    'plugin' => array(
     'name' => esc_html__('Word Balloon', 'simple-days'),
     'dir' => 'word-balloon',
     'filename' => 'word-balloon.php',
   ),
    
      
      
      
      
    //'description' => esc_html__( 'Optional: Example Description.', 'simple-days' ),
    )));






















  














  
      /*if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site_title a',
        // PHP 5.2 or earlier 'render_callback' => function() { bloginfo( 'name' ); },
        'render_callback' => 'simple_days_customize_partial_blogname',
        ) );
      }*/


      
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

      if(get_theme_mod( 'simple_days_sidebar_layout','3') != '0'){
        $wp_customize->get_setting( 'simple_days_sidebar_layout' )->transport = 'postMessage';
      }



    }// end of public static function register

    function simple_days_customize_partial_blogname() {
     bloginfo( 'name' );
   }

   public static function live_preview() {
     wp_enqueue_script(
              'simple_days_customizer_script', // Give the script a unique ID
              SIMPLE_DAYS_THEME_URI . 'assets/js/customizer/customizer.min.js', // Define the path to the JS file
              array( 'jquery', 'customize-preview' ), // Define dependencies
              null, // Define a version (optional)
              true // Specify whether to put in footer (leave this true)
            );



   }

   public static function Simple_Days_preview_style() {
     get_template_part( 'inc/preview_style');
   }//end of public static function header_output



   public static function Simple_Days_build_css() {
    get_template_part( 'inc/build_style');
  }

  public static function simple_days_customizer_print_scripts_styles() {
    get_template_part('inc/customizer-script');
  }
}//end of Simple_Days_Customize



// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Simple_Days_Customize' , 'register' ) );

// Output custom CSS to live site
if ( is_customize_preview() ) {
  add_action( 'wp_head' , array( 'Simple_Days_Customize' , 'Simple_Days_preview_style' ) );
  add_action( 'wp_footer', array( 'Simple_Days_Customize' , 'simple_days_customizer_print_scripts_styles' ) ,999999999999999 );
}

// 即時反映用の JavaScript をエンキューします。
add_action( 'customize_preview_init' , array( 'Simple_Days_Customize' , 'live_preview' ) );

//CSS Save
add_action( 'customize_save_after', array( 'Simple_Days_Customize' , 'Simple_Days_build_css' ) );

if ( class_exists( 'WP_Customize_Control' ) ) {

  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-sortable.php';


  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-html_text.php';


  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-plugin_install.php';


  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-image_select.php';


  require SIMPLE_DAYS_THEME_DIR . 'inc/customizer/control-color_alpha.php';

}//end of if ( class_exists( 'WP_Customize_Control' ) ) {

