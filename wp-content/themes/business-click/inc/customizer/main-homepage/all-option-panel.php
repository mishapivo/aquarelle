<?php

global $business_click_panels;

/*creating panel for theme settings*/
$business_click_panels['business-click-main-page-options'] =
    array(
        'title'          => esc_html__( 'Homepage / Front Page', 'business-click' ),
        'priority'       => 230
    );
    
/*top headerbar*/
require get_template_directory().'/inc/customizer/main-homepage/top-header-bar.php';

/*header*/
require get_template_directory().'/inc/customizer/main-homepage/header.php';

/*feature slider*/
require get_template_directory().'/inc/customizer/main-homepage/feature-slider-setting.php';

/*feature*/
require get_template_directory().'/inc/customizer/main-homepage/feature-section.php';

/*about us*/
require get_template_directory().'/inc/customizer/main-homepage/about-us.php';

/*Call tom Action*/
require get_template_directory().'/inc/customizer/main-homepage/call-to-action-section.php';

/*our-team*/
require get_template_directory().'/inc/customizer/main-homepage/testimonial-section.php';

/*Blog-section*/
require get_template_directory().'/inc/customizer/main-homepage/blog-section.php';

/*our-partner*/
require get_template_directory().'/inc/customizer/main-homepage/contact-us.php';

/*footer options */
require get_template_directory().'/inc/customizer/main-homepage/footer.php';

// color options
require get_template_directory().'/inc/customizer/color/color-section.php';

//fonts options
require get_template_directory().'/inc/customizer/font/font-section.php';




