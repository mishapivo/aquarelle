<?php
/**
 * Main include functions ( to support child theme ) that child theme can override file too
 *
 * @since Travel Way 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('travel_way_file_directory') ){

    function travel_way_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}

/**
 * Check empty or null
 *
 * @since Travel Way 1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('travel_way_is_null_or_empty') ){
    function travel_way_is_null_or_empty( $str ){
        return ( !isset($str) || trim($str)==='' );
    }
}

/*file for library*/
require travel_way_file_directory('acmethemes/library/tgm/class-tgm-plugin-activation.php');

/*
* file for customizer theme options
*/
require travel_way_file_directory('acmethemes/customizer/customizer.php');

/*
* file for additional functions files
*/
require travel_way_file_directory('acmethemes/functions.php');

require travel_way_file_directory('acmethemes/functions/sidebar-selection.php');

require travel_way_file_directory('acmethemes/functions/primary-menu.php');

/*woocommerce*/
require travel_way_file_directory('acmethemes/woocommerce/functions-woocommerce.php');

require travel_way_file_directory('acmethemes/woocommerce/class-woocommerce.php');

/*
* files for hooks
*/
require travel_way_file_directory('acmethemes/hooks/wp-forms.php');

require travel_way_file_directory('acmethemes/hooks/tgm.php');

require travel_way_file_directory('acmethemes/hooks/front-page.php');

require travel_way_file_directory('acmethemes/hooks/slider-selection.php');

require travel_way_file_directory('acmethemes/hooks/feature-info.php');

require travel_way_file_directory('acmethemes/hooks/header.php');

require travel_way_file_directory('acmethemes/hooks/header-helper.php');

require travel_way_file_directory('acmethemes/hooks/dynamic-css.php');

require travel_way_file_directory('acmethemes/hooks/footer.php');

require travel_way_file_directory('acmethemes/hooks/comment-forms.php');

require travel_way_file_directory('acmethemes/hooks/excerpts.php');

require travel_way_file_directory('acmethemes/hooks/siteorigin-panels.php');

require travel_way_file_directory('acmethemes/hooks/acme-demo-setup.php');

require travel_way_file_directory('acmethemes/hooks/template.php');

/*
* file for sidebar and widgets
*/
require travel_way_file_directory('acmethemes/sidebar-widget/acme-service.php');

require travel_way_file_directory('acmethemes/sidebar-widget/acme-contact.php');

require travel_way_file_directory('acmethemes/sidebar-widget/acme-gallery.php');

require travel_way_file_directory('acmethemes/sidebar-widget/acme-col-posts.php');

require travel_way_file_directory('acmethemes/sidebar-widget/acme-team.php');

require travel_way_file_directory('acmethemes/sidebar-widget/acme-testimonial.php');

require travel_way_file_directory('acmethemes/sidebar-widget/acme-parallax.php');

if ( travel_way_is_woocommerce_active() ) :
	require travel_way_file_directory('acmethemes/sidebar-widget/acme-wc-products.php');
	require travel_way_file_directory('acmethemes/sidebar-widget/acme-wc-cats.php');
endif;

require travel_way_file_directory('acmethemes/sidebar-widget/sidebar.php');

/*file for metaboxes*/
require travel_way_file_directory('acmethemes/metabox/meta-icons.php');

require travel_way_file_directory('acmethemes/metabox/metabox-defaults.php');

require travel_way_file_directory('acmethemes/metabox/meta-header.php');

/*
* file for core functions imported from functions.php while downloading Underscores
*/
require travel_way_file_directory('acmethemes/core.php');
require travel_way_file_directory('acmethemes/gutenberg/gutenberg-init.php');

/*themes info*/
require travel_way_file_directory('acmethemes/at-theme-info/class-at-theme-info.php');