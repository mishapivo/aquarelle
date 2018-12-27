<?php
function FoodiesGetCategoryListOptions(){
    $foodiesCategory = get_terms( array(
        'taxonomy' => 'category',
    ) );
    foreach($foodiesCategory as $foodiesCategory){
        $foodiesCategoryList[$foodiesCategory->name] = $foodiesCategory->name;
    }
    return $foodiesCategoryList;
}
function foodies_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
  $wp_customize->add_setting( 'themeColor' , array(
    'default'     => '#000000',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'themeColor', array(
  'label'        => __( 'Theme Color', 'foodies' ),
  'section'    => 'colors',
  'settings'   => 'themeColor',
  ) ) );
/** endit.. **/
  //Food blog Settings
  $wp_customize->add_section( 'foodiesBlogSettings' , array(
    'title'      => __( 'Blog Settings', 'foodies' ),
    'priority'   => 30,
  ) );
  $wp_customize->add_setting( 'foodiesCategoryOne' , array(
     'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_setting( 'foodiesCategoryOneColor' , array(
    'default'     => '#FF0000',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'foodiesCategoryOneColor', array(
  'label'        => __( 'Set Category Color', 'foodies' ),
  'section'    => 'foodiesBlogSettings',
  'settings'   => 'foodiesCategoryOneColor',
  'priority'  => 2
  ) ) );
  $wp_customize->add_control('foodiesCategoryOne', array(
  'label'        => __( 'Category 1', 'foodies' ),
  'section'    => 'foodiesBlogSettings',
  'settings'   => 'foodiesCategoryOne',
  'type' => 'select',
  'priority'  => 1,
  'choices' => FoodiesGetCategoryListOptions()
  ) );
  $wp_customize->add_setting( 'foodiesCategoryTwo' , array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control('foodiesCategoryTwo', array(
  'label'        => __( 'Category 2', 'foodies' ),
  'section'    => 'foodiesBlogSettings',
  'settings'   => 'foodiesCategoryTwo',
  'type' => 'select',
  'priority'  => 3,
  'choices' => FoodiesGetCategoryListOptions()
  ) );
  $wp_customize->add_setting( 'foodiesCategoryTwoColor' , array(
    'default'     => '#008000',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'foodiesCategoryTwoColor', array(
  'label'        => __( 'Set Category Color', 'foodies' ),
  'section'    => 'foodiesBlogSettings',
  'settings'   => 'foodiesCategoryTwoColor',
  'priority'  => 4
  ) ) );
  $wp_customize->add_setting( 'foodiesCategoryThree' , array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'transport' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control('foodiesCategoryThree', array(
  'label'        => __( 'Category 3', 'foodies' ),
  'section'    => 'foodiesBlogSettings',
  'settings'   => 'foodiesCategoryThree',
  'type' => 'select',
  'priority'  => 5,
  'choices' => FoodiesGetCategoryListOptions()
  ) );
  $wp_customize->add_setting( 'foodiesCategoryThreeColor' , array(
    'default'     => '#FFFF00',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'foodiesCategoryThreeColor', array(
  'label'        => __( 'Set Category Color', 'foodies' ),
  'section'    => 'foodiesBlogSettings',
  'settings'   => 'foodiesCategoryThreeColor',
  'priority'  => 6
  ) ) );

 $wp_customize->remove_control('header_image');
}
add_action( 'customize_register', 'foodies_customize_register' );

function foodies_custom_css(){ ?>
                
  <style type="text/css">
      span.category.<?php echo esc_attr(get_theme_mod('foodiesCategoryThree')); ?>{
        background: <?php echo esc_attr(get_theme_mod('foodiesCategoryThreeColor','#FFFF00')); ?>;
      }
      span.category.<?php echo esc_attr(get_theme_mod('foodiesCategoryTwo')); ?>{
        background: <?php echo  esc_attr(get_theme_mod('foodiesCategoryTwoColor','#008000')); ?>;
      }
      span.category.<?php echo esc_attr(get_theme_mod('foodiesCategoryOne'));?>{
        background: <?php echo esc_attr(get_theme_mod('foodiesCategoryOneColor','#FF0000'));?>;
      }

  body, #menubar,#footer-widget, .panel , .entry-content, .wc-tab, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
  .woocommerce-checkout #payment div.payment_box, #page-title,
  .comment-area.form-basic input[type='text'], .comment-area.form-basic input[type='email'], .comment-area.form-basic textarea,
  .form-basic textarea, #menubar.stuck, .slicknav_nav a, .slicknav_nav a:hover > a, .slicknav_nav a:hover, .sf-menu > li ul a
  {
    background-color: <?php echo esc_attr(get_theme_mod('background_color','#F2F2F2')); ?>;
  }
  .side-bar-collapse h4, input[type="search"].search-field{
    border-bottom-color: <?php echo  esc_attr(get_theme_mod('themeColor','#69A612')); ?>;
  }
  button, html input[type="button"], input[type="reset"], input[type="submit"]{
    background: <?php echo esc_attr(get_theme_mod('themeColor','#69A612')); ?>;
  }
  .page-numbers.current, a.page-numbers:hover,
  textarea:focus,
  input:focus,
  select:focus,
  select:hover,
  textarea:hover,
  input:hover,
  button,
  html input[type="button"],
  input[type="reset"],
  input[type="submit"]{
    border-color: <?php echo esc_attr(get_theme_mod('themeColor','#69A612')); ?>;
  }
  a:hover, a:focus,
  .page-numbers.current, a.page-numbers:hover,
  .widget-area a:hover, .side-bar a:focus{
    color: <?php echo esc_attr(get_theme_mod('themeColor','#69A612')) ;?>;
  }
  <?php if ( ! display_header_text() ) : ?>
		.site-title,
		.site-description {
  		position: absolute;
  		clip: rect(1px, 1px, 1px, 1px);
		}
	<?php else: ?>
  a .site-title,
  a .site-description {
    color: #<?php header_textcolor(); ?>;
  }
  <?php endif; ?>
	
  </style>
<?php }
add_action('wp_head','foodies_custom_css',900);