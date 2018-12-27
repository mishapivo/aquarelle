<?php
  defined( 'ABSPATH' ) || exit;

  register_sidebar(array(
    'name' => esc_attr__( 'Sidebar', 'simple-days' ),
    'id' => 'sidebar-1',
    'description' => esc_attr__( 'Add widgets here to appear in your sidebar.', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget s_widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title sw_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Content Bottom Left', 'simple-days' ),
    'id' => 'footer-1',
    'description' => esc_attr__( 'Add widgets here to appear in bottom footer(left side)..', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget f_widget f_widget_l %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title fw_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Content Bottom Center', 'simple-days' ),
    'id' => 'footer-2',
    'description' => esc_attr__( 'Add widgets here to appear in bottom footer(center).', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget f_widget f_widget_c %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title fw_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Content Bottom Right', 'simple-days' ),
    'id' => 'footer-3',
    'description' => esc_attr__( 'Add widgets here to appear in bottom footer(right side)', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget f_widget f_widget_r %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title fw_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'On the pagination', 'simple-days' ),
    'id' => 'on_pagination',
    'description' => esc_attr__( 'Add widgets here to appear on the pagination', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Under the post', 'simple-days' ),
    'id' => 'under_post',
    'description' => esc_attr__( 'Add widgets under in the contents of the post', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Under the page', 'simple-days' ),
    'id' => 'under_page',
    'description' => esc_attr__( 'Add widgets under in the contents of the page', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));



  register_sidebar(array(
    'name' => esc_attr__( 'Over Header', 'simple-days' ),
    'id' => 'over_header',
    'description' => esc_attr__( 'Add widgets here to over header.', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget oh_widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title oh_title">',
    'after_title' => '</h3>'
  ));
/*
  register_sidebar(array(
    'name' => esc_attr__( 'Over Header Left', 'simple-days' ),
    'id' => 'over_header_left',
    'description' => esc_attr__( 'Add widgets here to over header left.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget oh_widget oh_widget_l %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title oh_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Over Header Right', 'simple-days' ),
    'id' => 'over_header_right',
    'description' => esc_attr__( 'Add widgets here to over header right.', 'simple-days' ),
    'before_widget' => '<div id="%1$s" class="widget oh_widget oh_widget_r %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget_title oh_title">',
    'after_title' => '</h3>'
  ));
*/
  register_sidebar(array(
    'name' => esc_attr__( 'Header', 'simple-days' ),
    'id' => 'header_widget',
    'description' => esc_attr__( 'Add widgets here to header.', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget h_widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title hw_title">',
    'after_title' => '</h3>'
  ));
      //global $hook_suffix;
      //if( 'customize.php' == $hook_suffix ){
      //  $setting_url = esc_js('javascript:wp.customize.section(\"simple_days_index_page_setting\").focus();' );
      //}else{
        $setting_url = esc_url(admin_url('customize.php?autofocus[section]=simple_days_index_page_setting'));
      //}

  register_sidebar(array(
    'name' => esc_attr__( 'Index List', 'simple-days' ),
    'id' => 'index_list',
    'description' => esc_attr__( 'Add widgets here to index list insert.', 'simple-days' ).' <a href="'.$setting_url.'">'.esc_html__( 'change the number of insert widget area.', 'simple-days' ).'</a>',
    'before_widget' => '<aside id="%1$s" class="widget %2$s i_widget box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Before the first H2 of the post', 'simple-days' ),
    'id' => 'before_h2_no1',
    'description' => esc_attr__( 'Add widgets before the first h2 in the contents of the post', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the second H2 of the post', 'simple-days' ),
    'id' => 'before_h2_no2',
    'description' => esc_attr__( 'Add widgets before the second h2 in the contents of the post', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the third H2 of the post', 'simple-days' ),
    'id' => 'before_h2_no3',
    'description' => esc_attr__( 'Add widgets before the third h2 in the contents of the post', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
  register_sidebar(array(
    'name' => esc_attr__( 'Before the first H2 of the page', 'simple-days' ),
    'id' => 'page_before_h2_no1',
    'description' => esc_attr__( 'Add widgets before the first h2 in the contents of the page', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the second H2 of the page', 'simple-days' ),
    'id' => 'page_before_h2_no2',
    'description' => esc_attr__( 'Add widgets before the second h2 in the contents of the page', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => esc_attr__( 'Before the third H2 of the page', 'simple-days' ),
    'id' => 'page_before_h2_no3',
    'description' => esc_attr__( 'Add widgets before the third h2 in the contents of the page', 'simple-days' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s box_shadow">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ));
