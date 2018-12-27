<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function feminine_munk_widgets_init(){
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'feminine-munk' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'feminine-munk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Footer One', 'feminine-munk' ),
        'id'            => 'footer-one',
        'description'   => esc_html__( 'Add widgets here.', 'feminine-munk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Two', 'feminine-munk' ),
        'id'            => 'footer-two',
        'description'   => esc_html__( 'Add widgets here.', 'feminine-munk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Three', 'feminine-munk' ),
        'id'            => 'footer-three',
        'description'   => esc_html__( 'Add widgets here.', 'feminine-munk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action( 'widgets_init', 'feminine_munk_widgets_init' );

/**
 * Customizer for about author widget, popular post widget, recent-posts-widget, social-links-widget.
 */
$feminine_munk_widget_sections = array( 'about-author-widget', 'popular-posts-widget', 'recent-posts-widget', 'social-links-widget' );

foreach( $feminine_munk_widget_sections as $widgets ){
    require get_template_directory() . '/inc/widgets/' . $widgets . '.php';
}