<?php
/**
 * salient themes init file
 *
 * @package salient themes
 * @subpackage st-blog
 * @since st-blog 1.0.0
 */

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ).'/inc/customizer/customizer.php';

/**
*sidebar widget.
*/
require trailingslashit( get_template_directory() ) . '/inc/sidebar-widget-init.php';

/**
Layout additions
 */
require trailingslashit( get_template_directory() ) . '/inc/post-meta/layout-meta.php';

require trailingslashit( get_template_directory() ).'/inc/hooks/excerpt.php';

require trailingslashit( get_template_directory() ).'/inc/function/words-count.php';

require trailingslashit( get_template_directory() ).'/inc/function/single-image-align.php';

require trailingslashit( get_template_directory() ) . '/inc/function/header-logo.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/header.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/footer.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/feature-slider.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/feature-content-post.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/full-width-widget.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/homepage-social-meadia.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/inline-style.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/image-gallery.php';

require trailingslashit( get_template_directory() ) . '/inc/hooks/ticker.php';










