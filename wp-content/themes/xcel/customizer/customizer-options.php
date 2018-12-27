<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_xcel_options() {

	// Theme defaults
	$primary_color = '#0c3768';
    $secondary_color = '#0d4a87';
    
    $title_color = '#2B598E';
    $title_font_color = '#FFFFFF';
    
    $body_font_color = '#4F4F4F';
    $heading_font_color = '#5E5E5E';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
    
    
    // Layout Settings
    $section = 'xcel-setting-layout';
    $font_choices = customizer_library_get_font_choices();

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Options', 'xcel' ),
        'priority' => '30'
    );
    
    $options['xcel-setting-main-color'] = array(
        'id' => 'xcel-setting-main-color',
        'label'   => __( 'Main Color', 'xcel' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
    $options['xcel-setting-main-color-hover'] = array(
        'id' => 'xcel-setting-main-color-hover',
        'label'   => __( 'Secondary Color', 'xcel' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $secondary_color,
    );
    
    $options['xcel-setting-body-font'] = array(
        'id' => 'xcel-setting-body-font',
        'label'   => __( 'Body Font', 'xcel' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Open Sans'
    );
    $options['xcel-setting-body-font-color'] = array(
        'id' => 'xcel-setting-body-font-color',
        'label'   => __( 'Body Font Color', 'xcel' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    $options['xcel-setting-heading-font'] = array(
        'id' => 'xcel-setting-heading-font',
        'label'   => __( 'Headings Font', 'xcel' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_choices,
        'default' => 'Raleway'
    );
    $options['xcel-setting-heading-font-color'] = array(
        'id' => 'xcel-setting-heading-font-color',
        'label'   => __( 'Heading Font Color', 'xcel' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    
    $options['xcel-setting-upsell-site'] = array(
        'id' => 'xcel-setting-upsell-site',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Site Boxed / Full Width layouts', 'xcel' )
    );
    
    
    // Header Settings
    $section = 'xcel-setting-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header Options', 'xcel' ),
        'priority' => '30'
    );
    
    $options['xcel-header-menu-text'] = array(
        'id' => 'xcel-header-menu-text',
        'label'   => __( 'Menu Button Text', 'xcel' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'menu',
        'description' => __( 'This is the text for the menu button (mobile)', 'xcel' )
    );
    
    $options['xcel-setting-header-search'] = array(
        'id' => 'xcel-setting-header-search',
        'label'   => __( 'Show Search', 'xcel' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    
    $options['xcel-setting-upsell-header'] = array(
        'id' => 'xcel-setting-upsell-header',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Right aligned header layout<br />- Remove Site Title border<br />- Select from 4 header colors & no color<br />- Remove WooCommerce Cart', 'xcel' )
    );
    
    
    // Title Settings
    $section = 'xcel-setting-title';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Page Title Options', 'xcel' ),
        'priority' => '30'
    );
    
    $options['xcel-setting-title-color'] = array(
        'id' => 'xcel-setting-title-color',
        'label'   => __( 'Title Bar Color', 'xcel' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $title_color,
    );
    $options['xcel-setting-title-font-color'] = array(
        'id' => 'xcel-setting-title-font-color',
        'label'   => __( 'Title Bar Font Color', 'xcel' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $title_font_color,
    );
    
    $choices = array(
        'xcel-setting-title-bgimg-top' => __( 'Align Top', 'xcel' ),
        'xcel-setting-title-bgimg-middle' => __( 'Align Centered', 'xcel' ),
        'xcel-setting-title-bgimg-bottom' => __( 'Align Bottom', 'xcel' )
    );
    $options['xcel-setting-title-bgimg'] = array(
        'id' => 'xcel-setting-title-bgimg',
        'label'   => __( 'Background Image Position', 'xcel' ),
        'section' => $section,
        'type'    => 'select',
        'description' => __( 'To set the image for the post/page you need to set a "Featured Image" on each post/page.', 'xcel' ),
        'choices' => $choices,
        'default' => 'xcel-setting-title-bgimg-middle'
    );
    
    $options['xcel-setting-upsell-page-title'] = array(
        'id' => 'xcel-setting-upsell-page-title',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Change Page Title Size<br />- Page Title layout - Standard/Centered', 'xcel' )
    );
    
    
    // Slider Settings
    $section = 'xcel-setting-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider Options', 'xcel' ),
        'priority' => '35'
    );
    
    $choices = array(
        'xcel-setting-slider-default' => __( 'Default Slider', 'xcel' ),
        'xcel-setting-meta-slider' => __( 'Meta Slider', 'xcel' ),
        'xcel-setting-no-slider' => __( 'None', 'xcel' )
    );
    $options['xcel-setting-slider-type'] = array(
        'id' => 'xcel-setting-slider-type',
        'label'   => __( 'Choose a Slider', 'xcel' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'xcel-setting-slider-default'
    );
    $options['xcel-setting-slider-cats'] = array(
        'id' => 'xcel-setting-slider-cats',
        'label'   => __( 'Slider Categories', 'xcel' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you want to display in the slider. Eg: "13,17,19" (no spaces and only comma\'s)<br /><br />Get the ID at <b>Posts -> Categories</b>.<br /><br />Or <a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank"><b>See more instructions here</b></a>', 'xcel' )
    );
    $choices = array(
        'xcel-setting-slider-size-small' => __( 'Small Slider', 'xcel' ),
        'xcel-setting-slider-size-medium' => __( 'Medium Slider', 'xcel' ),
        'xcel-setting-slider-size-large' => __( 'Large Slider', 'xcel' )
    );
    
    $options['xcel-setting-meta-slider-shortcode'] = array(
        'id' => 'xcel-setting-meta-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'xcel' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the shortcode give by meta slider.', 'xcel' )
    );
    
    $options['xcel-setting-upsell-slider'] = array(
        'id' => 'xcel-setting-upsell-slider',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Link slides to any custom url<br />- Change Slider size<br />- Change Slider scroll effect<br />- Remove Slider text<br />- Link slides to their post', 'xcel' )
    );

    
    // Blog Settings
    $section = 'xcel-setting-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog Options', 'xcel' ),
        'priority' => '50'
    );
    
    $options['xcel-setting-blog-title'] = array(
        'id' => 'xcel-setting-blog-title',
        'label'   => __( 'Blog Page Title', 'xcel' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Blog'
    );
    $options['xcel-setting-blog-cats'] = array(
        'id' => 'xcel-setting-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'xcel' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br /><br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.<br /><br />Get the ID at <b>Posts -> Categories</b>.', 'xcel' )
    );
    
    $options['xcel-setting-upsell-blog'] = array(
        'id' => 'xcel-setting-upsell-blog',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Set Blog List/Archive & Single pages to Full Width', 'xcel' )
    );
    
    
    // Layout Settings
    $section = 'xcel-setting-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer Layout Options', 'xcel' ),
        'priority' => '85'
    );
    
    $choices = array(
        'xcel-setting-footer-layout-standard' => __( 'Standard Layout', 'xcel' ),
        'xcel-setting-footer-layout-none' => __( 'None', 'xcel' )
    );
    $options['xcel-setting-footer-layout'] = array(
        'id' => 'xcel-setting-footer-layout',
        'label'   => __( 'Footer Layout', 'xcel' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'xcel-setting-footer-layout-standard'
    );
    $options['xcel-setting-upsell-footer'] = array(
        'id' => 'xcel-setting-upsell-footer',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Select from 5 footer layouts<br />- Remove footer bottom bar', 'xcel' )
    );
    
    
    // Social Settings
    $section = 'xcel-setting-social';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'xcel' ),
        'priority' => '80'
    );
    
    $options['xcel-setting-upsell-social'] = array(
        'id' => 'xcel-setting-upsell-social',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Premium offers over 20 social links<br />- Setting to add your own custom social link', 'xcel' )
    );
    
    
    // Site Text Settings
    $section = 'xcel-setting-website';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'xcel' ),
        'priority' => '50'
    );
    
    $options['xcel-setting-website-error-head'] = array(
        'id' => 'xcel-setting-website-error-head',
        'label'   => __( '404 Error Page Heading', 'xcel' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'xcel'),
        'description' => __( 'Enter the heading for the 404 Error page', 'xcel' )
    );
    $options['xcel-setting-website-error-msg'] = array(
        'id' => 'xcel-setting-website-error-msg',
        'label'   => __( 'Error 404 Message', 'xcel' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'xcel'),
        'description' => __( 'Enter the default text on the 404 error page (Page not found)', 'xcel' )
    );
    $options['xcel-setting-website-nosearch-msg'] = array(
        'id' => 'xcel-setting-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'xcel' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'xcel'),
        'description' => __( 'Enter the default text for when no search results are found', 'xcel' )
    );
    $options['xcel-setting-upsell-website'] = array(
        'id' => 'xcel-setting-upsell-website',
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( '<b>Premium Extra Features:</b><br />- Change footer attribution text to your own copyright text', 'xcel' )
    );

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_xcel_options' );
