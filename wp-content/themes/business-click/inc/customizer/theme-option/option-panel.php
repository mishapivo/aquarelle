<?php
global $business_click_panels;

/*creating panel for theme settings*/
$business_click_panels['business-click-theme-options'] =
    array(
        'title'          => esc_html__( 'Theme Options', 'business-click' ),
        'priority'       => 235
    );

/*layout options */
require get_template_directory().'/inc/customizer/theme-option/layout-options.php';

/*breadcrumb options */
require get_template_directory().'/inc/customizer/theme-option/breadcrumb.php';

/*breadcrumb */
require get_template_directory().'/inc/customizer/theme-option/breadcrumb.php';



