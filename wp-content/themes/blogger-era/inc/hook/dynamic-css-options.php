<?php /**
 *
 * This hook is for the typography option of the theme
 *
 *@package Blogger_Era
 *
 */

if ( ! function_exists( 'blogger_era_typography_options' ) ) :

    function blogger_era_typography_options() { 
        $slider_text_align                = blogger_era_get_option( 'slider_text_align' );
        $site_branding_height             = blogger_era_get_option( 'site_branding_height' );
        $container_width                  = blogger_era_get_option( 'container_width' );
        $content_area_width               = blogger_era_get_option( 'content_area_width' );
        $sidebar_width = ( 100 - $content_area_width - 3 );       
        $header_image_padding             = blogger_era_get_option( 'header_image_padding' );
        $header_image_opacity             = blogger_era_get_option( 'header_image_opacity' ); 

        $custom_css = '';
        
        $custom_css .= '.content-area{
            width: '.absint( $content_area_width ).'%;            
        }';
        $custom_css .= '.widget-area{
            width: '.absint($sidebar_width).'%;            
        }';
        $custom_css .= '.site-branding{
            padding: '.absint($site_branding_height).'px;            
        }';
        $custom_css .= '.freature-slider-section .caption{
            right: '.absint($slider_text_align).'px;            
        }';
        $custom_css .= '.page-title-wrap{
            padding: '.absint($header_image_padding).'px 0;            
        }';
        $custom_css .= '.page-title-wrap:before{
            opacity: 0.'.absint($header_image_opacity).';            
        }';
        wp_add_inline_style( 'blogger-era-style', $custom_css );       
    }    
endif;

add_action( 'wp_enqueue_scripts', 'blogger_era_typography_options' );