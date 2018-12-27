<?php
/**
 * Expand some functions related to widgets
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 *
 */

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function enrollment_widgets_init() {
	
	/**
	 * Register Right Sidebar
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'enrollment' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'enrollment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	/**
	 * Register Left Sidebar
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'enrollment' ),
		'id'            => 'enrollment_sidebar_left',
		'description'   => esc_html__( 'Add widgets here.', 'enrollment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	/**
	 * Register Homepage Fullwidth area
	 *
	 * @since 1.0.0
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Section Area', 'enrollment' ),
		'id'            => 'enrollment_home_section_area',
		'description'   => esc_html__( 'Add widgets here.', 'enrollment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	/**
	 * Register 4 different Footer Area 
	 *
	 * @since 1.0.0
	 */
	register_sidebars( 4 , array(
		'name'          => esc_html__( 'Footer Area %d', 'enrollment' ),
		'id'            => 'enrollment_footer_sidebar',
		'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'enrollment' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'enrollment_widgets_init' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Register different widgets
 *
 * @since 1.0.1
 */
add_action( 'widgets_init', 'enrollment_register_widgets' );

function enrollment_register_widgets() {

	// Call to Action Widget
	register_widget( 'Enrollment_Call_To_Action' );

	// Latest Blog Posts Widget
	register_widget( 'Enrollment_Latest_Blog' );

	// Course Widget
	register_widget( 'Enrollment_Course' );

	// Service Widget
	register_widget( 'Enrollment_Service' );

	// Sponsors Widget
	register_widget( 'Enrollment_Sponsors' );

	// Team Widget
	register_widget( 'Enrollment_Team' );

	// Testimonials Widget
	register_widget( 'Enrollment_Testimonials' );
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Load important files for widget and it's related
 */

require get_template_directory() . '/inc/widgets/enrollment-widget-fields.php';

require get_template_directory() . '/inc/widgets/enrollment-service-widget.php';
require get_template_directory() . '/inc/widgets/enrollment-call-to-action.php';
require get_template_directory() . '/inc/widgets/enrollment-course-widget.php';
require get_template_directory() . '/inc/widgets/enrollment-team-widget.php';
require get_template_directory() . '/inc/widgets/enrollment-testimonials-widget.php';
require get_template_directory() . '/inc/widgets/enrollment-latest-blog-widget.php';
require get_template_directory() . '/inc/widgets/enrollment-sponsors-widget.php';