<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function galway_lite_widgets_init() {
	register_sidebar(array(
			'name'          => esc_html__('Sidebar', 'galway-lite'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'galway-lite'),
			'before_widget' => '<section id="%1$s" class="widget mb-50 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title center-widget-title primary-font">',
			'after_title'   => '</h5>',
		));

	register_sidebar(array(
			'name'          => esc_html__('Offcanvas Panel', 'galway-lite'),
			'id'            => 'slide-menu',
			'description'   => esc_html__('Add widgets here.', 'galway-lite'),
			'before_widget' => '<section id="%1$s" class="widget pt-20 pb-20 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title bordered-widget-title primary-font secondary-textcolor">',
			'after_title'   => '</h5>',
		));

	$galway_lite_footer_widgets_number = galway_lite_get_option('number_of_footer_widget');

	if ($galway_lite_footer_widgets_number > 0) {
		register_sidebar(array(
				'name'          => esc_html__('Footer Column One', 'galway-lite'),
				'id'            => 'footer-col-one',
				'description'   => esc_html__('Displays items on footer section.', 'galway-lite'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h5 class="widget-title bordered-widget-title primary-font secondary-textcolor">',
				'after_title'   => '</h5>',
			));
		if ($galway_lite_footer_widgets_number > 1) {
			register_sidebar(array(
					'name'          => esc_html__('Footer Column Two', 'galway-lite'),
					'id'            => 'footer-col-two',
					'description'   => esc_html__('Displays items on footer section.', 'galway-lite'),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h5 class="widget-title bordered-widget-title primary-font secondary-textcolor">',
					'after_title'   => '</h5>',
				));
		}
		if ($galway_lite_footer_widgets_number > 2) {
			register_sidebar(array(
					'name'          => esc_html__('Footer Column Three', 'galway-lite'),
					'id'            => 'footer-col-three',
					'description'   => esc_html__('Displays items on footer section.', 'galway-lite'),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h5 class="widget-title bordered-widget-title primary-font secondary-textcolor">',
					'after_title'   => '</h5>',
				));
		}
	}
}

add_action('widgets_init', 'galway_lite_widgets_init');
