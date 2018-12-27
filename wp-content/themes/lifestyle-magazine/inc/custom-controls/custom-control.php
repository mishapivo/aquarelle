<?php
if( ! function_exists( 'lifestyle_magazine_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function lifestyle_magazine_register_custom_controls( $wp_customize ) {
    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/radiobtn/class-radio-buttonset-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/select/class-select-control.php';
    require_once get_template_directory() . '/inc/custom-controls/slider/class-slider-control.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/sortable/class-sortable-control.php';
    require_once get_template_directory() . '/inc/custom-controls/dropdown-taxonomies/class-dropdown-taxonomies-control.php';
    require_once get_template_directory() . '/inc/custom-controls/posttype-taxonomies/class-post-type-taxonomies-control.php';
    require_once get_template_directory() . '/inc/custom-controls/multicheck/class-multi-check-control.php';


    require_once get_template_directory() . '/inc/custom-controls/notes.php';
            
    // Register the control type.
    $wp_customize->register_control_type( 'Lifestyle_Magazine_Radio_Buttonset_Control' );
    $wp_customize->register_control_type( 'Lifestyle_Magazine_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Lifestyle_Magazine_Select_Control' );
    $wp_customize->register_control_type( 'Lifestyle_Magazine_Slider_Control' );
    $wp_customize->register_control_type( 'Lifestyle_Magazine_Toggle_Control' );    
    $wp_customize->register_control_type( 'Lifestyle_Magazine_Control_Sortable' );
    $wp_customize->register_control_type( 'Lifestyle_Magazine_Multi_Check_Control' );
}
endif;
add_action( 'customize_register', 'lifestyle_magazine_register_custom_controls' );