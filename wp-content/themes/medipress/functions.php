<?php

/**
 * medipress functions and definitions
  @package medipress
 *
*/

/* Set the content width in pixels, based on the theme's design and stylesheet.
*/
function medipress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'medipress_content_width', 980 );
}
add_action( 'after_setup_theme', 'medipress_content_width', 0 );


if( ! function_exists( 'medipress_theme_setup' ) ) {	
	
	function medipress_theme_setup() {
		load_theme_textdomain( 'medipress', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		// Add title tag 
		add_theme_support( 'title-tag' );
		
		// Add default logo support		
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
        add_image_size('medipress-page-thumbnail',738,423, true);
        add_image_size('medipress-about-thumbnail',800,550, true);
        add_image_size('medipress-blog-front-thumbnail',370,225, true);
        add_image_size('medipress-portfolio-thumbnail',900,810, true);
        add_image_size('medipress-slider-thumbnail',1350,600, true);
        
        
		
         // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

		$defaults = array(
			'width'                  => 1920,
			'height'                 => 600,
			'uploads'                => true,
		);
		add_theme_support( 'custom-header', $defaults );

		// Menus
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'medipress'),
		));
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );
		
        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
 
    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'medipress_theme_setup' );
}

add_action( "customize_register", "medipress_theme_customize_register" );
function medipress_theme_customize_register( $wp_customize ) {
 
 $wp_customize->remove_section("colors");
}


   // Register Nav Walker class_alias
    require get_template_directory(). '/class-wp-bootstrap-navwalker.php';
    require get_template_directory(). '/include/extras.php';
   /**

    * Enqueue CSS stylesheets
    */		
if( ! function_exists( 'medipress_enqueue_styles' ) ) {
	function medipress_enqueue_styles() {	
	
	    wp_enqueue_style('medipress-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800|Open+Sans:300,400','');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css','');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css','');
	// main style
		wp_enqueue_style( 'medipress-style', get_stylesheet_uri() );
		
	}
	add_action( 'wp_enqueue_scripts', 'medipress_enqueue_styles' );
}

/**
 * Enqueue JS scripts
 */

if( ! function_exists( 'medipress_enqueue_scripts' ) ) {
	function medipress_enqueue_scripts() {   
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/idangerous.swiper.js',array(),'', true);
		wp_enqueue_script('medipress-js', get_template_directory_uri() . '/assets/js/main.js ',array(),'', true);
	}
	add_action( 'wp_enqueue_scripts', 'medipress_enqueue_scripts' );
}


    function medipress_cat_count_span($links) {
        $links = str_replace('</a> (', '</a> <span>', $links);
        $links = str_replace(')', '</span>', $links);
        return $links;
    }
    add_filter('wp_list_categories', 'medipress_cat_count_span');


    function medipress_style_the_archive_count($links) {
        $links = str_replace('</a>&nbsp;(', '</a> <span class="archiveCount">', $links);
        $links = str_replace(')', '</span>', $links);
        return $links;
    }

    add_filter('get_archives_link', 'medipress_style_the_archive_count');


    //post excerpt
    function medipress_theme_excerpt_global_length( $length ) {
	   return 30;
    }

    function medipress_theme_excerpt(){
	    add_filter( 'excerpt_length', 'medipress_theme_excerpt_global_length', 999 );
	    echo get_the_excerpt();
    }

    function new_excerpt_more( $more ) {
        return '...';
    }

   add_filter('excerpt_more', 'new_excerpt_more');



     /**
     * Register sidebars for medipress
     */

function medipress_sidebars() {

	// Blog Sidebar

	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "medipress"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "medipress"),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="middle-title">',
		'after_title' => '</h3>',
	));
  	

	// Footer Sidebar

	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', "medipress"),
		'id' => 'medipress-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', "medipress"),
		'before_widget' => ' <div class="footer-widgets %2$s">',
		'after_widget' => '</div> ',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	

	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', "medipress"),
		'id' => 'medipress-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', "medipress"),
		'before_widget' => '<div class="footer-widgets %2$s"> ',
		'after_widget' => ' </div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', "medipress"),
		'id' => 'medipress-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', "medipress"),
		'before_widget' => '<div class="footer-widgets %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 4', "medipress"),
		'id' => 'medipress-footer-widget-area-4',
		'description' => esc_html__( 'The footer widget area 4', "medipress"),
		'before_widget' => '<div class="footer-widgets %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));		
}

add_action( 'widgets_init', 'medipress_sidebars' );
/**
 * Comment layout
 */
function medipress_comments( $comment, $args, $depth ) { ?>
	<div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
		<?php if ($comment->comment_approved == '0') : ?>
			<div class="alert alert-info">
			  <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'medipress' ) ?></p>
			</div>
		<?php endif; ?>
		
		<div class="commentt">
			    <?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array( 'media-object','' ) )); ?>
			
			    <h4 class="user-name">
				   <?php 
						/* translators: '%1$s %2$s: edit term */
				    printf(esc_html__( '%1$s %2$s', 'medipress' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'medipress' ),'  ','') )
				    ?>
			     </h4>
			    <div class="comment-info"><?php echo esc_html__( 'Posted at ', 'medipress' ); ?><?php echo get_the_date();?> 
			    	<?php comment_reply_link (array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			    </div> 
			    <?php comment_text() ;?>
		</div>
	</div>
<?php
} 
 
/**
 * Customizer additions.
 */
  require get_template_directory(). '/include/customizer.php';
?>