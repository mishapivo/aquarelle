<?php
/**
 * Sanitize choices
 * @since Travel Way 1.0.0
 * @param null
 * @return string $travel_way_sanitize_choice_options
 *
 */
if ( ! function_exists( 'travel_way_sanitize_choice_options' ) ) :
	function travel_way_sanitize_choice_options( $value, $choices, $default ) {
		$input = wp_kses_post( $value );
		$output = array_key_exists( $input, $choices ) ? $input : $default;
		return $output;
	}
endif;

/**
 * Common functions for widgets
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 *
 * @return array $background_options
 *
 */
if ( ! function_exists( 'travel_way_background_options' ) ) :
	function travel_way_background_options() {
		$background_options = array(
			'default'   => esc_html__( 'Default', 'travel-way' ),
			'gray'      => esc_html__( 'Gray', 'travel-way' )
		);

		return apply_filters( 'travel_way_background_options', $background_options );
	}
endif;

/**
 * Column Number
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 *
 * @return array $column_number
 *
 */
if ( ! function_exists( 'travel_way_widget_column_number' ) ) :
	function travel_way_widget_column_number() {
		$column_number = array(
			1 => esc_html__( '1', 'travel-way' ),
			2 => esc_html__( '2', 'travel-way' ),
			3 => esc_html__( '3', 'travel-way' ),
			4 => esc_html__( '4', 'travel-way' )
		);
		return apply_filters( 'travel_way_widget_column_number', $column_number );
	}
endif;

/**
 * Widget Image Popup Type
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_gallery_image_popup
 *
 */
if ( !function_exists('travel_way_gallery_image_popup') ) :
	function travel_way_gallery_image_popup() {
		$travel_way_gallery_image_popup =  array(
			'gallery'   => esc_html__( 'Gallery', 'travel-way' ),
			'single'    => esc_html__( 'Single', 'travel-way' ),
			'disable'   => esc_html__( 'Disable', 'travel-way' ),
		);
		return apply_filters( 'travel_way_gallery_image_popup', $travel_way_gallery_image_popup );
	}
endif;

/**
 * Content From
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 *
 * @return array $travel_way_content_from
 *
 */
if ( ! function_exists( 'travel_way_content_from' ) ) :
	function travel_way_content_from() {
		$content_from = array(
			'excerpt' => esc_html__( 'Excerpt', 'travel-way' ),
			'content' => esc_html__( 'Content', 'travel-way' )
		);
		return apply_filters( 'travel_way_content_from', $content_from );
	}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_way_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Right Sidebar', 'travel-way' ),
        'id'            => 'travel-way-sidebar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    if ( is_customize_preview() ) {
        $travel_way_home_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'travel-way' ), '<br />','<b><a class="at-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
    }
    else{
        $travel_way_home_description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'travel-way' );
    }
    register_sidebar(array(
        'name'          => esc_html__('Home Main Content Area', 'travel-way'),
        'id'            => 'travel-way-home',
        'description'	=> $travel_way_home_description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title init-animate zoomIn"><span>',
        'after_title'   => '</span></h2>',
    ));

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'travel-way' ),
		'id'            => 'travel-way-sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(array(
        'name'          => esc_html__('Footer Column One', 'travel-way'),
        'id'            => 'footer-col-one',
        'description'   => esc_html__('Displays items on top footer section.', 'travel-way'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Two', 'travel-way'),
        'id'            => 'footer-col-two',
        'description'   => esc_html__('Displays items on top footer section.', 'travel-way'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Three', 'travel-way'),
        'id'            => 'footer-col-three',
        'description'   => esc_html__('Displays items on top footer section.', 'travel-way'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Four', 'travel-way'),
        'id'            => 'footer-col-four',
        'description'   => esc_html__('Displays items on top footer section.', 'travel-way'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

	register_sidebar(array(
		'name'          => esc_html__('Popup Widget Area', 'travel-way'),
		'id'            => 'popup-widget-area',
		'description'   => esc_html__('Displays items on Pop up', 'travel-way'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));

    /*Widgets*/
	register_widget( 'Travel_Way_Posts_Col' );
	register_widget( 'Travel_Way_Contact' );
	register_widget( 'Travel_Way_Service' );
	register_widget( 'Travel_Way_Gallery' );
	register_widget( 'Travel_Way_Team' );
	register_widget( 'Travel_Way_Testimonial' );
	register_widget( 'Travel_Way_Feature' );

	if ( travel_way_is_woocommerce_active() ) :
		register_widget( 'Travel_Way_Wc_Products' );
		register_widget( 'Travel_Way_Wc_Feature_Cats' );
	endif;
}
add_action( 'widgets_init', 'travel_way_widgets_init' );

/* ajax callback for get_edit_post_link*/
add_action( 'wp_ajax_at_get_edit_post_link', 'travel_way_get_edit_post_link' );
function travel_way_get_edit_post_link(){
    if( isset( $_GET['id'] ) ){
	    $id = absint( $_GET['id'] );
	    if( get_edit_post_link( $id ) ){
		    ?>
            <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">
			    <?php esc_html_e('Full Edit','travel-way');?>
            </a>
		    <?php
	    }
	    else{
		    echo 0;
	    }
	    exit;
    }
}