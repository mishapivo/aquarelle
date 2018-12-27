<?php
global $st_blog_panels;

// panel for main home page 
$st_blog_panels['st-blog-homepage-panel']  = array(
	'title'			=> esc_html__('Theme Options','st-blog'),
	'priority'		=> 30	
);

// header and footer
require trailingslashit(get_template_directory() ) .'/inc/customizer/Header-Footer/header-footer-options.php';


// Post display
require trailingslashit(get_template_directory() ) .  '/inc/customizer/post-display/options.php'; 

// social media 
require trailingslashit(get_template_directory() ) .'/inc/customizer/Footer-social-media/options.php';

// color
require trailingslashit(get_template_directory() ) .'/inc/customizer/color/color-section.php';

// fonts
require trailingslashit(get_template_directory() ) .'/inc/customizer/font/font-section.php';

require get_template_directory() .'/inc/customizer/gallery/options.php';

// ticker options
require get_template_directory() .'/inc/customizer/ticker/ticker.php';







