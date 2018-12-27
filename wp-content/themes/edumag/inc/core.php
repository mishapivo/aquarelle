<?php
/**
 * Core file.
 *
 * This is the template that includes all the other files for core featured of EduMag
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

/**
 * Include options function.
 */
require get_template_directory() . '/inc/options.php';


// Load customizer defaults values
require get_template_directory() . '/inc/customizer/defaults.php';

if ( ! function_exists( 'edumag_get_theme_options' ) ) :
    /**
    * Merge values from default options array and values from customizer
    *
    * @return array Values returned from customizer
    * @since EduMag 0.1
    */
    function edumag_get_theme_options() {
        $edumag_default_options = edumag_get_default_theme_options();

        return array_merge( $edumag_default_options , get_theme_mod( 'edumag_theme_options', $edumag_default_options ) ) ;
    }
endif;

if ( ! function_exists( 'edumag_slider_image_instruction' ) ) :
    /**
      * Write message for featured image upload
      *
      * @return array Values returned from customizer
      * @since EduMag 0.1
    */
    function edumag_slider_image_instruction( $content, $post_id ) {
        $allowed = array( 'page', 'post' );

        if ( in_array( get_post_type( $post_id ), $allowed ) ) {
            return $content .= '<p><b>' . esc_html__( 'Note', 'edumag' ) . ':</b>' . esc_html__( ' The recommended size is 1200x400 px while using it as Header image.', 'edumag' ) . '</p>';
        }
        return $content;
    }
endif;
add_filter( 'admin_post_thumbnail_html', 'edumag_slider_image_instruction', 10, 2);

/**
 * Add breadcrumb functions.
 */
require get_template_directory() . '/inc/breadcrumb-class.php';

/**
 * Add helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Add structural hooks.
 */
require get_template_directory() . '/inc/structure.php';

/**
 * Add demo import hooks.
 */
require get_template_directory() . '/inc/demo-import.php';

/**
 * Add metabox
 */
require get_template_directory() . '/inc/metabox/metabox.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Modules additions.
 */
require get_template_directory() . '/inc/modules/modules.php';

/**
 * Woocommerce additions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Custom widget additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

